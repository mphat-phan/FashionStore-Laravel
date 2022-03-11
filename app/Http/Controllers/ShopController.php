<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
class ShopController extends Controller
{
    public function index(){
        $colors = DB::table('colors')
                    ->join('product_details', 'colors.id', '=', 'product_details.colorID')
                    ->join('product', 'product.id', '=', 'product_details.productID')
                    ->select('colors.*')
                    ->distinct()
                    ->get();
        $sizes = DB::table('sizes')
                    ->join('product_details', 'sizes.id', '=', 'product_details.sizeID')
                    ->join('product', 'product.id', '=', 'product_details.productID')
                    ->select('sizes.*')
                    ->distinct()
                    ->get();
        $products = Product::orderBy('created_at','DESC')->get()->take(16)->where('status','1');
        $categories = Category::all();
        $brands = Brand::all();

        return view('pages.shop',[
            'colors' => $colors,
            'sizes' => $sizes,
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
            
        ]);
    }
}
