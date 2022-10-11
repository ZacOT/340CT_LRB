<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function printUser(){
        $users = DB::table('users')->get();
        return view('welcome',compact('users'));
    }
  
    public function insert(Request $request){
        
        // Validation for Form Database
        $this->validate($request, [
            'username' => 'required|max:255|unique:users,username',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|max:255',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');
        $role = $request->input('role');
        $name = $request->input('name');
        $email = $request->input('email');
        $address = $request->input('address');

        $data=array(
            "username"=>$username,
            "password"=>$password,
            "role"=>$role,
            "name"=>$name,
            "email"=>$email,
            "address"=>$address);

        DB::table('users')->insert($data);
            
        return redirect()-> route('login');

        }

        public function changeAddress(){

            $change_address = 1;

            return view('profile')->with('address_change', $change_address);
        }

        public function updateAddress(Request $request){

            $this->validate($request, ['address' => 'required|max:255']);
            $address = $request->input('address');
            DB::table('users')->where('username', Auth::user()->username)->update(['address' => $address]);

            return redirect()->route('profile');
        }
}
