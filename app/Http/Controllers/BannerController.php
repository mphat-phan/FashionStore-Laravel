<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
class BannerController extends Controller
{
    public function index(){
        $banner = Banner::orderBy('id','DESC')->get();
        return view('admin.pages.banner.bannerList',compact('banner'));
    }
    public function add(Request $request){
        $banner = new Banner();
        if ($request->hasFile('txtImage')) {
            $banner->title = $request->txtTitle;
            $banner->description = $request->txtDescription;
            //Đổi tên image
            $imageName = current(explode('.',$request->txtImage->getClientOriginalName()));
            $banner->image = $imageName.'-'.random_int(100000, 999999).'.'.$request->txtImage->getClientOriginalExtension();
            //Lưu image
            $image = $request->file('txtImage');
            $image->move('images', $banner->image);
            
            $banner->link = $request->txtLink;
            $banner->save();
        } 
        return redirect('admin/custom/banner');

    }
    public function update(Request $request,$id){
        $banner = Banner::find($id);
        $banner->title = $request->txtTitle;
        $banner->description = $request->txtDescription;
        $banner->link = $request->txtLink;
        if ($request->hasFile('txtImage')) {
            //Đổi tên image
            $imageName = current(explode('.',$request->txtImage->getClientOriginalName()));
            $banner->image = $imageName.'-'.random_int(100000, 999999).'.'.$request->txtImage->getClientOriginalExtension();
            //Lưu image
            $image = $request->file('txtImage');
            $image->move('images', $banner->image);
        }
        $banner->save();
        return redirect('admin/custom/banner');

    }
    public function delete(Request $request,$id){
        
        $banner = Banner::find($id);
        $banner->delete();
        return redirect('admin/custom/banner');

    }
}
