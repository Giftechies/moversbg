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
class UserController extends Controller
{
    
    public function store(Request $request)
    {

           $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:tbl_user',
                'password' => 'required|string|min:8',
                'address' => 'required|string|max:500',
                'phone' => 'nullable|string|max:20', 
                'pickup_address' => 'required',
                'pick_name' => 'required', 
                'drop_mobileno' => 'required',
                'drop_name' => 'required',
                'drop_address' => 'required',
                'drop_place_type' => 'required', 
                'pick_address' => 'required|string|max:255',
                'odate' => 'required|date', 
                'total_amount' => 'required', 
                'pick_name' => 'required|string|max:100',
                'pick_mobile' => 'required|string|max:20',
                'property_type' => 'required|string|max:100', 
                'place_type' => 'nullable|string|max:100', 
                'storage_unit' => 'nullable|string|max:100',
                'facilities_required' => 'nullable|integer|max:255',
                'additional_notes' => 'nullable|string|max:500',
                'products' => 'required|array|min:1',
                'products.*.product_name' => 'required|string|max:255',
                'products.*.quantity' => 'required|integer|min:1',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            $validated = $request->all();
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->phone,
                'password' => Hash::make($request->password),
            ]);
            // Assign the "driver" role
            $role = Role::where('name', 'customer')->first();
            $user->roles()->attach($role);
            
            $token = $user->createToken('auth_token')->plainTextToken; 
            $variation = @implode(',', $request->variation);
            $arrOrder = [
                'uid'=> $user->id, 
                'address' => $request->address,
                'phone' => $request->phone,
                'pickup_address' => $request->pickup_address,
                'pick_name' => $request->pick_name,
                'variation' => $variation,
                'variation_meter' => $request->variation_meter ?? null,
                'drop_mobileno' => $request->drop_mobileno ?? null,
                'drop_name' => $request->drop_name ?? null,
                'drop_address' => $request->drop_address, 
                'date_type' => $request->date_type ?? null,
                'pick_address' => $request->pick_address,
                'odate' => $request->odate,
                'subtotal' => $request->total_amount,
                'o_total' => $request->total_amount,
                'pick_mobile' => $request->pick_mobile,
                'property_type' => $request->property_type ?? null,
                'bed_rooms' => $request->bed_rooms ?? null,
                'place_type' => $request->place_type ?? null,
                'street_types' => $request->street_types ?? null,
                'storage_unit' => $request->storage_unit ?? null,
                'facilities_required' => $request->facilities_required ?? null,
                'additional_notes' => $request->additional_notes ?? null,
                'meters' => $request->meters ?? null,
                'flights' => $request->flights ?? null,
            ];       
            $order = Order::create($arrOrder);   
            $arrDp = [
                'uid'           => $user->id,
                'order_id'      => $order->id,
                'drop_address'  => $request->drop_address,
                //'drop_lat'      => $request->drop_lat  ?? null,
                //'drop_lng'      => $request->drop_lng  ?? null,
                'drop_name'     => $request->drop_name,
                'drop_mobile'   => $request->drop_mobileno ,  
                'place_type'    => $request->drop_place_type ?? null,
                'street_type'   => $request->drop_street_type ?? null,
                'flights'       => $request->drop_flights ?? 0,
                'meters'        => $request->drop_meters ?? 0,
            ]; 
            $drop_point = DropPoint::create($arrDp);

            // ✅ Create multiple products for one order (bulk insert)
            $products = [];
            foreach ($validated['products'] as $product) {
                $products[] = [
                    'oid' => $order->id,
                    'product_name' => $product['product_name'],
                    'quantity' => $product['quantity'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            LogisticsProduct::insert($products); 

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
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
                'status' => false,
                'message' => 'Invalid email or password',
            ], 401);
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
