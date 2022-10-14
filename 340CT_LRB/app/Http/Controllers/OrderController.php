<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function printOrder(){
        $users = DB::table('orders')->get();
        return view('welcome',compact('orders'));
    }
  
    public function viewOrder(Request $request){
        $orders = DB::table('orders')->where('order_id', $request->input('orderid'))->get();
        $orderitems = DB::table('orderitem')->get();
        $books = DB::table('books')->get();
        return view('viewOrder', compact('orders', 'orderitems', 'books'));
    }

    public function insertOrder(Request $request){
        
        $username = $request->input('username');
        $name = $request->input('name');
        $grandTotal = $request->input('grandtotal');
        $address = $request->input('address');
        //$address = "Filler Address";
        
        //Create Order First

        $orderdata=array(
            "username" => $username,
            "name" => $name,
            "address" => $address,
            "subtotal" => $grandTotal,
            "status" => 0,
        );
        DB::table('orders')->insert($orderdata);

        $carts = DB::table('carts')->where('username', $username)->get();
        $orderid =  DB::table('orders')->where('name', $name)->latest('order_id')->first();

        foreach ($carts as $cart){

            $data=array(
                "order_id"=>intval($orderid->order_id),
                "ISBN_13"=>$cart->ISBN_13,
                "orderitem_quantity"=>$cart->book_quantity,
            );

            DB::table('orderitem')->insert($data);

            $oldQuantity = DB::table('books')->where('ISBN_13',[$cart->ISBN_13])->pluck('book_stock')->first();
            $newQuantity = $oldQuantity - ($cart->book_quantity);

            DB::table('books')->where('ISBN_13',$cart->ISBN_13)->update(['book_stock'=>$newQuantity]);
            DB::table('carts')->where('username',[$username])->delete(); 

            Session::put('totalPrice', 0);
            Session::put('totalQuantity', 0);

            $books = DB::table('books')->where('ISBN_13', $cart->ISBN_13)->get()->first();

        }    
        return redirect('/')->with('alert', "Order placed successfully");


    }

    public function updateStatus(Request $request){
        
        $orderid = $request->input('orderid');
        $status = $request->input('status');

        if ($status == 0){
            $status = 1;
        }
        else if ($status == 1){
            $status = 0;
        }

        DB::table('orders')->where('order_id', $orderid)->update(['status' => $status]);

        return redirect('orderlist');
    }

    // remove function
    // remove all from user function
}
