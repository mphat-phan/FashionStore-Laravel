<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use App\Models\ProductDetail;
use App\Models\Images;
class ProductDetailController extends Controller
{
    public function index(Request $request, $id){
        $productDetail = ProductDetail::where('productID',$id)->get();
        $subImage = Images::where('productID', $id)->where('productDetailID',null)->get();
        $product = Product::where('id',$id)->get();
        $color = DB::table('colors')->get();
        $size = DB::table('sizes')->get();
        return view('admin.pages.product.productDetail',[
            'products' => $product,
            'productDetail' => $productDetail,
            'size' => $size,
            'color' => $color,
            'subImage' => $subImage,
        ]);
    }
    public function add(Request $request, $id){
        $productdetail = new ProductDetail();
        $productdetail->productID = $id;
        $productdetail->colorID = $request->ColorOption;
        $productdetail->sizeID = $request->SizeOption;
        $productdetail->save();

        if ($request->hasFile('txtImage')) {
            
            $link = $request->file('txtImage');

            for($i=0;$i<count($link);$i++){
                $image = new Images();
                $image->productID = $id;
                $image->productDetailID = $productdetail->id;
                //Đổi tên image
                $imageName = current(explode('.',$link[$i]->getClientOriginalName()));
                $image->link = $imageName.'-'.random_int(100000, 999999).'.'.$link[$i]->getClientOriginalExtension();
                $image->save();
                //Lưu image
                $link[$i]->move('images', $image->link);
            }

        }
        
        return redirect('admin/form/product/detail/'.$id);
    }
    public function update(Request $request,$id){
        $productdetail = ProductDetail::find($id);
        $productdetail->colorID = $request->ColorOption;
        $productdetail->sizeID = $request->SizeOption;
        $productdetail->save();
        return redirect('admin/form/product/detail/'.$productdetail->productID);
    }
    public function delete(Request $request,$id){
        
        $productdetail = ProductDetail::find($id);
        $productdetail->delete();
        return redirect('admin/form/product/detail/'.$productdetail->productID);

    }
}
