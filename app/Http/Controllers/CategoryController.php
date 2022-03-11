<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
class CategoryController extends Controller
{
    //

    public function index(){
        $category = Category::all();
        return view('admin.pages.category.categoryList',['category'=>$category]);
    }

    public function add(Request $request){
        $category = new Category();
        $category->name = $request->txtName;
        $category->detail = $request->txtDetail;
        $category->save();
        return redirect('admin/form/category');

    }
    public function update(Request $request,$id){
        
        $category = Category::find($id);
        $category->name = $request->txtName;
        $category->detail = $request->txtDetail;
        $category->save();
        return redirect('admin/form/category');

    }
    public function delete(Request $request,$id){

        $category = Category::find($id);
        $category->delete();
        return redirect('admin/form/category');

    }
}
