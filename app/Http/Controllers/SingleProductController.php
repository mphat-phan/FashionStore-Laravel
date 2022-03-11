<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
class SingleProductController extends Controller
{
    public function index(Request $request,Product $product){
        $colors = DB::table('colors')
                    ->join('product_details', 'colors.id', '=', 'product_details.colorID')
                    ->join('product', 'product.id', '=', 'product_details.productID')
                    ->where('product.id',$product->id)
                    ->select('colors.*')
                    ->distinct()
                    ->get();
        $sizes = DB::table('sizes')
                    ->join('product_details', 'sizes.id', '=', 'product_details.sizeID')
                    ->join('product', 'product.id', '=', 'product_details.productID')
                    ->where('product.id',$product->id)
                    ->select('sizes.*')
                    ->distinct()
                    ->get();
        $bestseller = Product::orderBy('sold','DESC')->get()->take(10)->where('status','1');
        return view('pages.singleproduct',[
            'product' => $product,
            'bestseller' => $bestseller,
            'colors' => $colors,
            'sizes' => $sizes,
        ]);
    }
}
