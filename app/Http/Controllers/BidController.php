<?php

namespace App\Http\Controllers; 
use App\Models\Bid;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\EncryptHelper;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;
class BidController extends Controller
{

    
    // Show the bidding form for a given order
    public function index() 
    {
        $pendingBids = Bid::with(['order', 'vendor'])
            ->where('status', 'pending')
            ->whereHas('order', function ($q) {
                $q->where('from_date', '>', Carbon::today());
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('bids.index', compact('pendingBids'));
    }

    public function approved_bids() 
    { 
        $approvedBids = Bid::with(['order', 'vendor'])
            ->where('status', 'accepted')
            ->whereHas('order', function ($q) {
                $q->where('from_date', '>=', Carbon::today());
            });

        $removalist = Auth::user()->hasRole('removalist');

        if (!empty($removalist)) {
            $vendorId = Auth::id();
            $approvedBids = $approvedBids->where('vendor_id', $vendorId);
        }

        $approvedBids = $approvedBids->orderBy('updated_at', 'desc')->get();

        return view('bids.approved_bids', compact('approvedBids'));
    }

     public function history_bids() 
    { 
        $approvedBids = Bid::with(['order', 'vendor'])
            ->where('status', 'accepted')
            ->whereHas('order', function ($q) {
                $q->where('from_date', '<', Carbon::today());
            });

        $removalist = Auth::user()->hasRole('removalist');

        if (!empty($removalist)) {
            $vendorId = Auth::id();
            $approvedBids = $approvedBids->where('vendor_id', $vendorId);
        }

        $approvedBids = $approvedBids->orderBy('updated_at', 'desc')->get();

        return view('bids.approved_bids', compact('approvedBids'));
    }
    // Store a new bid
    public function store(Request $request, Order $order)
    {
        $request->validate([
            'amount'   => 'required|numeric|min:0.01',
            'comments' => 'nullable|string|max:500',
        ]);

        // Create the bid
        $bid = new Bid([
            'order_id'  => $order->id,
            'vendor_id' => Auth::id(),
            'amount'    => $request->amount,
            'comments'  => $request->comments,
            'status'    => 'pending',
        ]);
        $bid->save();
        $order = EncryptHelper::enc($order->id);
        // You can flash a message or redirect wherever you like
        return redirect()->route('orders.show', $order)->with('success', 'Your bid has been submitted.');
    }

     public function update(Request $request, Order $order)
    {
        $request->validate([
            'amount'   => 'required|numeric|min:0.01',
            'comments' => 'nullable|string|max:500',
        ]);


        // Find the existing bid or fail if it doesn’t exist
        $bid = Bid::where('vendor_id', Auth::id())
              ->where('order_id', $order->id)
              ->firstOrFail();          // throws 404 if no such bid exists

        // Update the fields you want to change
        $bid->update([
            'amount'   => $request->amount,
            'comments'=> $request->comments,
            // 'status' => 'pending',   // uncomment if you really want to reset status
        ]); 
        
        $order = EncryptHelper::enc($order->id);
        // You can flash a message or redirect wherever you like
        return redirect()->route('orders.show', $order)->with('success', 'Your bid has been submitted.');
    }

     public function approve(Bid $bid): RedirectResponse
    {
        // ⿡ Update the bid status
        $bid->update(['status' => 'accepted']);

        // ⿢ Assign the vendor to the order
        $order = Order::find($bid->order_id);
        if ($order) {
            $order->update(['vendor_id' => $bid->vendor_id]);
        }

        // ⿣ Flash a message (optional) and redirect back
        return redirect()
            ->route('pending-bids.index')
            ->with('success', "Bid #{$bid->id} approved and vendor assigned.");
    }

    

     // Reject bid
    public function reject($id)
    {
        $bid = Bid::findOrFail($id);
        $bid->update(['status' => 'rejected']);

        return back()->with('success', 'Bid rejected');
    }

    // Cancel accepted bid
    public function cancel(Request $request, $id)
    {
        $bid = Bid::findOrFail($id);

        BidHistory::create([
            'bid_id' => $bid->id,
            'order_id' => $bid->order_id,
            'vendor_id' => $bid->vendor_id,
            'amount' => $bid->amount,
            'action' => 'cancelled',
            'reason' => $request->reason,
        ]);

        $bid->update(['status' => 'pending']);

        return back()->with('success', 'Bid cancelled');
    }

    // Reschedule accepted bid
    public function reschedule(Request $request, $id)
    {
        $bid = Bid::findOrFail($id);

        BidHistory::create([
            'bid_id' => $bid->id,
            'order_id' => $bid->order_id,
            'vendor_id' => $bid->vendor_id,
            'amount' => $bid->amount,
            'action' => 'rescheduled',
            'reason' => $request->reason,
        ]);

        return back()->with('success', 'Bid rescheduled');
    }
}