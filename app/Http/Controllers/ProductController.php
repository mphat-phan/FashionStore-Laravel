<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Images;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    public function index(){
        $product = Product::orderBy('id','DESC')->get();
        $category = Category::all();
        $brand = Brand::all();
        return view('admin.pages.product.productList',
        [
            'product'=>$product,
            'category'=>$category,
            'brand' => $brand,

        ]);
    }
    public function add(Request $request){
        $product = new Product();
        $product->name = $request->txtName;
        $product->detail = $request->txtDetail;
        $product->price = $request->txtPrice;
        $product->summary = $request->txtSummary;
        $product->categoryID = $request->CategoryOption;
        $product->brandID = $request->BrandOption;
        $product->slug = Str::slug($product->name,'-').'-'.random_int(100000, 999999);
        $product->status = ($request->chkStatus=='1') ? $request->chkStatus : '0';
        //Add hình chính
        if ($request->hasFile('txtImage')) {
            //Đổi tên image
            $imageName = current(explode('.',$request->txtImage->getClientOriginalName()));
            $product->image = $imageName.'-'.random_int(100000, 999999).'.'.$request->txtImage->getClientOriginalExtension();
            //Lưu image
            $image = $request->file('txtImage');
            $image->move('images', $product->image);
        }
        $product->save();

        //Add hình phụ
        if ($request->hasFile('txtSubImage')) {
            
            $link = $request->file('txtSubImage');
            
            for($i=0;$i<count($link);$i++){
                $image = new Images();
                $image->productID = $product->id;
                //Đổi tên image
                $imageName = current(explode('.',$link[$i]->getClientOriginalName()));
                $image->link = $imageName.'-'.random_int(100000, 999999).'.'.$link[$i]->getClientOriginalExtension();
                $image->save();
                //Lưu image
                $link[$i]->move('images', $image->link);
            }

        }
        
        return redirect('admin/form/product');

    }
    public function getUpdate($id)
    {
        $product = Product::where('id',$id)->get();
        $subImage = Images::where('productID', $id)->where('productDetailID',null)->get();
        $category = Category::all();
        $brand = Brand::all();
        return view('admin.pages.product.productUpdate',
        [
            'product'=>$product,
            'category'=>$category,
            'brand' => $brand,
            'subImage' => $subImage

        ]);

    }
    public function postUpdate(Request $request,$id){
        
        $product = Product::find($id);
        
        $product->name = $request->txtName;
        $product->detail = $request->txtDetail;
        $product->price = $request->txtPrice;
        $product->summary = $request->txtSummary;
        $product->categoryID = $request->CategoryOption;
        $product->brandID = $request->BrandOption;
        $product->slug = Str::slug($product->name,'-');
        $product->status = ($request->chkStatus=='1') ? $request->chkStatus : '0';
        if ($request->hasFile('txtImage')) {
            //Đổi tên image
            if(File::exists('images/'.$product->image)){
                File::delete('images/'.$product->image);
            }
            $imageName = current(explode('.',$request->txtImage->getClientOriginalName()));
            $product->image = $imageName.'-'.random_int(100000, 999999).'.'.$request->txtImage->getClientOriginalExtension();
            //Lưu image
            $image = $request->file('txtImage');
            $image->move('images', $product->image);
        }

        $product->save();

        if ($request->hasFile('txtSubImage')) {
            //Xóa hình cũ
            $subImage = Images::where('productID', $id)->where('productDetailID',null)->get();
            foreach($subImage as $image){
                $images = Images::find($image->id);
                $images->delete();
                if(File::exists('images/'.$image->link)){
                    File::delete('images/'.$image->link);
                }
            }
        }
        if ($request->hasFile('txtSubImage')) {
            //Thêm hình mới
            $link = $request->file('txtSubImage'); 
            for($i=0;$i<count($link);$i++){
                $image = new Images();
                $image->productID = $product->id;
                //Đổi tên image
                $imageName = current(explode('.',$link[$i]->getClientOriginalName()));
                $image->link = $imageName.'-'.random_int(100000, 999999).'.'.$link[$i]->getClientOriginalExtension();
                $image->save();
                //Lưu image
                $link[$i]->move('images', $image->link);
            }

        }
        return redirect('admin/form/product');

    }
    public function updateViews(Request $request,$id){
        
        $product = Product::find($id);
        $product->views+=1;
        $product->save();
        return redirect('admin/form/product');

    }
    public function updateSold(Request $request,$id){
        
        $product = Product::find($id);
        $product->sold+=1;
        $product->save();
        return redirect('admin/form/product');

    }
    public function deleteSubImage(Request $request,$id){
        
    }
    public function delete(Request $request,$id){
        
        $product = Product::find($id);

        //Xóa hình chính
        if(File::exists('images/'.$product->image)){
            File::delete('images/'.$product->image);
        }

        //Xóa hình phụ
        $subImage = Images::where('productID', $product->id)->get();
        foreach($subImage as $image){
            $images = Images::find($image->id);
            $images->delete();
            if(File::exists('images/'.$image->link)){
                File::delete('images/'.$image->link);
            }
        }

        $product->delete();
        return redirect('admin/form/product');

    }
}
