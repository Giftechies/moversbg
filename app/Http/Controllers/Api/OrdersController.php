<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Logistics;
use App\Models\DropPoint;


class OrdersController extends Controller
{
    

    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    
        $validated = $request->validate(
            [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'phone' => 'nullable|string|max:20',
            'user_id'=>'required',
            'email' => 'required|email|unique:users,email',
            'password'=>'required',

            // 'order_id'=>'required',
            // 'category_id'=>'required',
            'pickup_address'=>'required',
            'Deliver_time'=>'required',
            'Pickup_mobileno'=>'required',
            'pick_name'=>'required',
            // 'vechile_id'=>'required',
            // 'rider_id'=>'required',
            'category_name'=>'required',

            'variation_name'=>'required',
            'variation_meter'=>'required',

            'drop_mobileno'=>'required',
            'drop_name'=>'required',
            'drop_address'=>'required',
            'logistic_date'=>'required',
            'category_name'=>'required'

        ]);
      


         $arrUser=[
                'name'=>$validated['name'],
                'email'=>$validated['e-mail'],
                'mobile'=>$validated['phone'],
                'password'=>$validated['password']
            ];
        $user = User::create($arrUser);
           



        $arrOrder=[
               'uid'=> $user->id,
                // 'cat_id' => $validated['category_id'], 
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
            'success' => true,
            'message' => 'Order created successfully',
            'data' => $order
        ], 201);

    }
}
