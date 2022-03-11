<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;
class SizeController extends Controller
{
    public function index(){
        $size = Size::orderBy('id','DESC')->get();
        return view('admin.pages.size.sizeList',compact('size'));
    }
    public function add(Request $request){
        $size = new Size();
        
        $size->name = $request->txtName;
        $size->unit = $request->txtUnit;
        $size->save();
        return redirect('admin/form/size');

    }
    public function update(Request $request,$id){
        $size = Size::find($id);
        $size->name = $request->txtName;
        $size->unit = $request->txtUnit;
        $size->save();
        return redirect('admin/form/size');

    }
    public function delete(Request $request,$id){
        
        $size = Size::find($id);
        $size->delete();
        return redirect('admin/form/size');

    }
}
