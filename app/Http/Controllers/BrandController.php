<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index(){
        $brand = Brand::all();
        return view('admin.pages.brand.brandList',['brand'=>$brand]);
    }

    public function add(Request $request){
        $brand = new Brand();
        $brand->name = $request->txtName;
        $brand->detail = $request->txtDetail;
        $brand->save();
        return redirect('admin/form/brand');

    }
    public function update(Request $request,$id){
        
        $brand = Brand::find($id);
        $brand->name = $request->txtName;
        $brand->detail = $request->txtDetail;
        $brand->save();
        return redirect('admin/form/brand');

    }
    public function delete(Request $request,$id){

        $brand = Brand::find($id);
        $brand->delete();
        return redirect('admin/form/brand');

    }
}
