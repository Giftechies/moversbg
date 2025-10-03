<?php
namespace App\Http\Controllers;

use App\Models\PaymentList;
use Illuminate\Http\Request;

class PaymentListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentLists = PaymentList::all();
        return view('paymentlists.index', compact('paymentLists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Not needed in this case
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Not needed in this case
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Not needed in this case
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paymentList = PaymentList::find($id);
        return view('paymentlists.edit', compact('paymentList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ptitle' => 'required',
            'p_attr' => 'required',
            'status' => 'required',
            'p_show' => 'required',
        ]);

        $paymentList = PaymentList::find($id);
        if ($request->hasFile('cat_img')) {
            $request->validate([
                'cat_img' => 'image|mimes:jpg,png,jpeg',
            ]);
            $paymentList->img = $request->file('cat_img')->store('images/payment');
        }
        $paymentList->subtitle = $request->input('ptitle');
        $paymentList->attributes = $request->input('p_attr');
        $paymentList->status = $request->input('status');
        $paymentList->p_show = $request->input('p_show');
        $paymentList->save();

        return redirect()->route('paymentlists.index')->with('success', 'Payment gateway updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Not needed in this case
    }
}
