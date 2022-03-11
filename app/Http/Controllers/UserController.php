<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function checkRegister(Request $request){
        
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);
        

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        return redirect('login')->with('msg', 'Đăng ký thành công');

    }
    public function checkLogin(Request $request){
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        
        $user = User::where('email', $fields['email'])->first();
        
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return redirect('login')->with('msg', 'Đăng nhập không thành công');
        }
        $request->session()->put('name', $user->name);
        return redirect('home');

    }
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('login');
    }
    public function login(){
        return view('pages.login');
    }
    public function register(){
        return view('pages.register');
    }


}
