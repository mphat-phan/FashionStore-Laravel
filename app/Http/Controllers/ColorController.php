<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
class ColorController extends Controller
{
    public function index(){
        $color = Color::orderBy('id','DESC')->get();
        return view('admin.pages.color.colorList',compact('color'));
    }
    public function add(Request $request){
        $color = new Color();
        
        $color->name = $request->txtName;
        $color->colorCode = $request->txtColorCode;
        $color->save();
        return redirect('admin/form/color');

    }
    public function update(Request $request,$id){
        $color = Color::find($id);
        $color->name = $request->txtName;
        $color->colorCode = $request->txtColorCode;
        $color->save();
        return redirect('admin/form/color');

    }
    public function delete(Request $request,$id){
        
        $color = Color::find($id);
        $color->delete();
        return redirect('admin/form/color');

    }
}
