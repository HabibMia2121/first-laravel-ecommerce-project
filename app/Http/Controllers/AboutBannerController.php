<?php

namespace App\Http\Controllers;

use App\Models\About_banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class AboutBannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkroll');
    }
    
    /*===============================about_banner code start here========================================= */
    public function about_banner_page()
    {
        $about_banner_info=About_banner::first();
        return view('dashboard_site.about_banner.updatepage',compact('about_banner_info'));
    }
    public function about_banner_update(Request $request, About_banner $id)
    {
        $request->validate([
            'short_title'=>'required',
            'long_title'=>'required',
        ]);
        if($request->banner_photo == null){
            if($request->hasFile('banner_photo')){
                //banner_photo delete from file
                if($id->banner_photo != 'banner_default_photo.jpg'){
                    unlink(public_path('uploads-photos/about-banner-photo/').$request->old_banner_photo);
                }
                // photo upload code start here
                // step:1->new photo name create
                $new_name=Str::random(7).'.'.$request->file('banner_photo')->getClientOriginalExtension();
                // step:2->new photo upload
                $save_link=public_path('uploads-photos/about-banner-photo/').$new_name;
                Image::make($request->file('banner_photo'))->resize(1600,350)->save($save_link);
                // photo upload code endt here
                $id->banner_photo=$new_name;
            };
            $id->short_title=$request->short_title;
            $id->long_title=$request->long_title;
            $id->save();
            return back()->with('update_message','Update successfully!');
        }
        else{
            $status=true;
            if(!in_array($request->banner_photo->getClientOriginalExtension(),['png','jpg','webp'])){
                $status=false;
            }
            if($status){
                if($request->hasFile('banner_photo')){
                    //banner_photo delete from file
                    if($id->banner_photo != 'banner_default_photo.jpg'){
                        unlink(public_path('uploads-photos/about-banner-photo/').$request->old_banner_photo);
                    }
                    // photo upload code start here
                    // step:1->new photo name create
                    $new_name=Str::random(7).'.'.$request->file('banner_photo')->getClientOriginalExtension();
                    // step:2->new photo upload
                    $save_link=public_path('uploads-photos/about-banner-photo/').$new_name;
                    Image::make($request->file('banner_photo'))->resize(1600,350)->save($save_link);
                    // photo upload code endt here
                    $id->banner_photo=$new_name;
                };
            }
            else{
                return back()->with('file_format_error_about_banner','there are one or many unsupported file in your attachment');
            }
            $id->short_title=$request->short_title;
            $id->long_title=$request->long_title;
            $id->save();
            return back()->with('update_message','Update successfully!');
        }
    }
    /*===============================about-banner code end here========================================= */
}
