<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Complications;
use App\Models\DropPoint;
use App\Models\Logistic;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
    public function store(Request $request)
    {

            $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'email' => 'required|email|unique:tbl_user',
                    'password' => 'required',
                    'address' => 'required|string|max:500',
                    'phone' => 'nullable|string|max:20',
                    'pickup_address'=>'required',
                    'Deliver_time'=>'required',
                    'Pickup_mobileno'=>'required',
                    'pick_name'=>'required',
                    'category_id'=>'required',
                    'variation_id'=>'required',
                    'variation_meter'=>'required',
                    'drop_mobileno'=>'required',
                    'drop_name'=>'required',
                    'drop_address'=>'required',
                    'logistic_date'=>'required',
                    'category_name'=>'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            $validated = $request->all();
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $token = $user->createToken('auth_token')->plainTextToken;

            $arrOrder=[
               'uid'=> $user->id,
                'cat_id' => $validated['category_id'], 
               'pick_address' => $validated['pickup_address'],
              'pick_mobile' => $validated['Pickup_mobileno'],
              'delivertime'=>$validated['Deliver_time'],
              // 'rid'=>$validated['rider_id'],
              'pick_name'=>$validated['pick_name']];
            $order = Order::create($arrOrder);




            $arrCategory=[
                'cat_name'=>$validated['category_name']
            ];
            $category = Category::create($arrCategory); 




            $arrComp=[
                'name'=>$validated['variation_name'],
                'meter'=>$validated['variation_meter']
             ];
            $complications = Complications::create($arrComp);




         $arrDp=[  
              'uid'=> $user->id,
              'order_id'=> $order->id,
              'drop_address'=>$validated['drop_address'],
              'drop_name'=>$validated['drop_name'],
               'drop_mobile'=>$validated['drop_mobileno'],
                //   'order_id'=>$validated['order_id']
                ];
        $drop_point = DropPoint::create($arrDp);


           
        
         $arrLogistic=[
             'uid'=> $user->id,
             'drop_address'=>$validated['drop_address'],
              'pick_address' => $validated['pickup_address'],
              'delivertime'=>$validated['Deliver_time'],
               //    'vechileid'=>$validated['vechile_id'],
              'logistic_date'=>$validated['logistic_date']
            ];      
        $logistic = Logistic::create($arrLogistic); 
         

            

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
    } 
}
