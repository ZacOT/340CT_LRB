<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function printCart(){
        $users = DB::table('carts')->get();
        return view('welcome',compact('carts'));
    }
  
    public function insertCart(Request $request){

        $username = $request->input('username');
        $ISBN_13 = $request->input('ISBN_13');
        $book_quantity = $request->input('book_quantity');
        
        $result = DB::select('select * from carts where username = ? AND ISBN_13 = ?', [$username, $ISBN_13]);

        if ($result == NULL) {
            // Create new if ISBN_13 not exist

            $data=array(
                "username"=>$username,
                "ISBN_13"=>$ISBN_13,
                "book_quantity"=>$book_quantity);
    
            DB::table('carts')->insert($data);
            return redirect('cart')->with('alert', "Added To Cart");

        } else if($result) {
            //$result_1 = DB::select('select book_quantity from carts where username = ? AND ISBN_13 = ?', [$username, $ISBN_13])->value('book_quantity');

            $bookQty = DB::table('carts')->where('username',$username)->where('ISBN_13',$ISBN_13)->pluck('book_quantity')->first();

            $newQuantity = ($bookQty) + 1;

            $data=array(
                "book_quantity"=>$newQuantity);

            DB::table('carts')->where('username',$username)->where('ISBN_13',$ISBN_13)->update($data);
            return redirect('cart')->with('alert', "Cart Updated");
        }

    }

    public function updateCart(Request $request){
        $username = $request->input('username');
        $ISBN_13 = $request->input('ISBN_13');
        $book_quantity = $request->input('book_quantity');
        $quantity = $request->input('quantity');

        $result = DB::select('select * from carts where username = ? AND ISBN_13 = ?', [$username, $ISBN_13]);

        $newQuantity = ($book_quantity) + $quantity;

        $data=array(
            "book_quantity"=>$newQuantity);

        DB::table('carts')->where('username',$username)->where('ISBN_13',$ISBN_13)->update($data);

        return redirect('cart');
    }

    public function deleteCart(){
        $ISBN_13 = $_GET['delete_isbn13'];
        $username = $_GET['username'];

        DB::table('carts')->where('username',$username)->where('ISBN_13',$ISBN_13)->delete(); 
        return redirect('cart');
    }

    // remove function
    // remove all from user function
}
