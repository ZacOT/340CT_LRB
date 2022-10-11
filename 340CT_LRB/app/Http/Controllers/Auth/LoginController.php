<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function validateLogin(Request $request){
        
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
            ]);

            $user = User::where('username', $request->username)
            ->where('password', $request->password)
            ->first();
        
            
        if($user) {
            Auth::login($user);
            $role = Auth::user()->role;

            if($role == 1){
                return redirect('/');
            }
            if($role == 0){
                return redirect('admin');
            }
        }


        return back()->with('status', 'User does not exist');
            
    }
}
