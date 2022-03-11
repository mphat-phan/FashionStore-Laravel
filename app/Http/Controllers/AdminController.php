<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Admin;

class AdminController extends Controller
{
    public function login(){
        return view('admin.pages.login');
    }
    public function register(){
        return view('admin.pages.register');
    }
    public function dashboard(){
        return view('admin.pages.dashboard');
    }
    public function checkLogin(Request $req){
        //$users = DB::select('select * from admin where password="'.$req->password.'"');
        $result = DB::table('admin')->where('email',$req->email)->where('password',$req->password)->first();
        if($result){ 
            $req->session()->put('name', $result->name);  
            $req->session()->put('id', $result->id);  
            return redirect()->route('dashboardAdmin');

        }
        else{
            return redirect('admin/login')->with('msg', 'Đăng nhập không thành công');
        }
        
    }
    public function logout(Request $req){
        $req->session()->flush();
        return redirect('admin/login');
    }
    public function checkRegister(Request $req){
        
        return $req;
        $rules = [
			'fullname' => 'required|string|min:3|max:255',
			'email' => 'required|email|min:3|max:255',
			'password' => 'required|string|min:3|max:255',
         'repassword' => 'required|string|min:3|max:255'
		];
        $validator = Validator::make($req->all(),$rules);
        if($validator->fails()){
            return redirect('admin/register')->with('msg', 'Đăng ky that bai');
            
        }
        else{
            
            return redirect('admin/login')->with('msg', 'Đăng ky thanh cong');
        }
        
    }
    
}
