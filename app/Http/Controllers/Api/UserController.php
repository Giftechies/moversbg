<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\Complications;
use App\Models\DropPoint;
use App\Models\LogisticsProduct;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;
class UserController extends Controller
{
    
    public function store(Request $request)
    {

           try {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required',
                        'email' => 'required|email|unique:tbl_user',
                        'phone' => 'nullable|string|max:20',
                        'drop_address' => 'required',
                        'drop_place_type' => 'required',
                        'pickup_address' => 'required|string|max:255',
                        'calendar' => 'required',
                        'property_type' => 'required|max:100',
                        'place_type' => 'nullable|max:100',
                        'storage_unit' => 'nullable|string|max:100',
                        'fitting' => 'nullable|string|max:255',
                        'additional_notes' => 'nullable|string|max:500',
                        'inventory' => 'required|array|min:1',
                        'inventory.items.*.name' => 'required|string',
                        'inventory.items.*.category' => 'required|string',
                        'inventory.items.*.quantity' => 'required|integer|min:1'
                    ]);

                    if ($validator->fails()) {
                        return response()->json(['errors' => $validator->errors()], 422);
                    }
                    DB::beginTransaction();
                    $validated = $request->all();
                    $pwd = rand(0, 999999);
                    $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'mobile' => $request->phone,
                        'password' => Hash::make($pwd),
                    ]);

                    // Assign the "driver" role
                    $role = Role::where('name', 'customer')->first();
                    $user->roles()->attach($role);

                    $token = $user->createToken('auth_token')->plainTextToken;
                    $variation = '';
                    $place_type = '';
                    $date_range = "";
                    $date_type = "";
                    $from_date = null;
                    $to_date = null;
                    $o_total = 0;
                    if(!empty($request->pick_variation)) $variation = @implode(',', $request->pick_variation);
                    if(!empty($request->place_type)) $place_type = @implode(',', $request->place_type);
                    if (!empty($request->input('inventory.total_price'))) $o_total = $request->input('inventory.total_price');

                    if (!empty($request->input('calendar.date_type'))) $date_type = $request->input('calendar.date_type');
                    if (!empty($request->input('calendar.dates'))) {
                        $dates = $request->input('calendar.dates'); 
                        $dates = @explode("/", $dates[0]); 
                        if (!empty($dates[0])) $from_date =   Carbon::createFromFormat('d-m-Y', $dates[0])->format('Y-m-d');
                        if (!empty($dates[1])) $to_date =   Carbon::createFromFormat('d-m-Y', $dates[1])->format('Y-m-d');
                    }
                   
                    $arrOrder = [
                        'uid' => $user->id,
                        'address' => $request->address,
                        'phone' => $request->phone,
                        'pick_address' => $request->pickup_address,
                        'pick_name' => $request->name,
                        'pickup_address_discreetly' => $request->pickup_address_discreetly ?? null,
                        'variation_meter' => $request->pick_variation_meter ?? null,
                        'drop_address' => $request->drop_address,
                        'subtotal' => $o_total,
                        'o_total' => $o_total,
                        'pick_mobile' => $request->phone,
                        'property_type' => $place_type ?? null,
                        'bed_rooms' => $request->bed_rooms ?? null,
                        'place_type' => $place_type ?? null,
                        'street_types' => $variation ?? null,
                        'storage_unit' => $request->storage_unit ?? null,
                        'facilities_required' => $request->fitting ?? null,
                        'additional_notes' => $request->additional_notes ?? null,
                        'meters' => $request->pick_variation_meter ?? null,
                        'flights' => $request->pick_flights ?? null,
                        'date_type' => $date_type ?? null,
                        'date_range' => $date_range,
                        'from_date' => $from_date,
                        'to_date' => $to_date
                    ];
                    $order = Order::create($arrOrder);
                    $drop_variation = @implode(',', $request->drop_variation);
                    $drop_place_type = @implode(',', $request->drop_place_type);
                    $arrDp = [
                        'uid' => $user->id,
                        'order_id' => $order->id,
                        'drop_address' => $request->drop_address,
                        //'drop_lat' => $request->drop_lat ?? null,
                        //'drop_lng' => $request->drop_lng ?? null,
                        'place_type' => $drop_place_type ?? null,
                        'street_type' => $drop_variation ?? null,
                        'flights' => $request->drop_flights ?? 0,
                        'meters' => $request->drop_meters ?? 0,
                    ];
                    $drop_point = DropPoint::create($arrDp);

                    // ✅ Create multiple products for one order (bulk insert)
                    $products = [];
                    $inventory = $request->input('inventory.items');

                    foreach ($inventory as $product) {
                        $products[] = [
                            'oid' => $order->id,
                            'product_name' => $product['name'],
                            'quantity' => $product['quantity'],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    LogisticsProduct::insert($products);
                    DB::commit();
                    return response()->json([
                        'access_token' => $token,
                        'token_type' => 'Bearer',
                    ]);
                } catch (\Exception $e) {
                    return response()->json([
                        'message' => 'Something went wrong',
                        'error' => $e->getMessage(),
                  ],500);
        }

    } 

       public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

      /*  if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid email or password',
            ], 401);
        }*/

        
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'status'  => false,
                'message' => 'Invalid email or password',
            ], 401);
        }

        // At this point the user is logged in – now verify the role
        if (!Auth::user()->hasRole('customer')) {
            Auth::logout();                     // optional: end the session if the role is wrong
            return response()->json([
                'status'  => false,
                'message' => 'Access denied – customer role required',
            ], 403);
        } 

        $user = Auth::user();
        $token = $user->createToken('LoginToken')->plainTextToken;

        return response()->json([
            'success' => true,
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ]);
    }

    public function profile()
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'User not logged in'], 401);
        }

        $user = Auth::user();

        return response()->json([
            'status' => true,
            'message' => 'Profile fetched successfully',
            'data' => $user
        ]);
    }

    public function updateProfile(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'User not logged in'], 401);
        }

        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:tbl_user,email,' . $user->id,
            'mobile' => 'nullable|string|max:20', 
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Update user fields
        $user->name = $request->name ?? $user->name;
        $user->email = $request->email ?? $user->email;
        $user->mobile = $request->mobile ?? $user->mobile;       
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Profile updated successfully',
            'data' => $user
        ]);
    }

    public function changePassword(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'User not logged in'], 401);
        }

        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed', 
            // requires a field named new_password_confirmation
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Check if old password matches
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['message' => 'Current password is incorrect'], 400);
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Password changed successfully'
        ]);
    }


    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['status' => true, 'message' => 'Logged out successfully']);
    }
}
