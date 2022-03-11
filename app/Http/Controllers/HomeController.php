<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Product;
class HomeController extends Controller
{
    public function index(){
        $banner = Banner::orderBy('id','DESC')->get();
        $product = Product::orderBy('created_at','DESC')->get()->take(16)->where('status','1');
        $bestseller = Product::orderBy('sold','DESC')->get()->take(10)->where('status','1');
        return view('pages.home',[
            'banner'=>$banner,
            'product' => $product,
            'bestseller' => $bestseller
        ]);
    }
}
