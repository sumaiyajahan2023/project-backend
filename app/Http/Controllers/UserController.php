<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function register()
    {
        return view('user.register');
    }
 
    public function registerPost(Request $request)
    {
        $user = new User();
 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phn_number =$request->phn_number;
        $user->user_type =$request->user_type;
 
        $user->save();
 
        return back()->with('success', 'Register successfully');
    }
 
    public function login()
    {
        return view('user.login');
    }
 
    public function loginPost(Request $request)
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
            'user_type' => $request->user_type, 
        ];
 
        if (Auth::attempt($credetials)) {
            if($request->user_type == 'Admin')
            {return redirect('/home')->with('success', 'Login Success');}

           else{
            return redirect('/customer/home')->with('success', 'Login Success');
           } 
        }
 
        return redirect()->back()->with('error', 'Error Email or Password');
    }
 
    public function logout()
    {
        Auth::logout();
 
        return redirect(route('user.login'));
    } 
}
