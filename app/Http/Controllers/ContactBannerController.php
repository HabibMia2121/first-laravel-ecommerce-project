<?php

namespace App\Http\Controllers;

use App\Models\Contact_banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Carbon\Carbon;

class ContactBannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkroll');
    }
    /*===============================contact-banner code start here========================================= */
    public function contact_banner_page()
    {
        $contact_banner_data=Contact_banner::first();
        return view('dashboard_site.contact_banner.updatepage',compact('contact_banner_data'));
    }

    public function contact_banner_update(Request $request,Contact_banner $id)
    {
        $request->validate([
            'short_title'=>'required',
            'long_title'=>'required',
        ]);
        if($request->banner_photo == null){
            if($request->hasFile('banner_photo')){
                //contact_banner_photo delete from file
                if($id->banner_photo != 'banner_default_photo.jpg'){
                    unlink(public_path('uploads-photos/contact-banner-photo/').$request->old_banner_photo);
                }
                // photo upload code start here
                // step:1->new photo name create
                $new_name=Str::random(7).'.'.$request->file('banner_photo')->getClientOriginalExtension();
                // step:2->new photo upload
                $save_link=public_path('uploads-photos/contact-banner-photo/').$new_name;
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
                    //contact_banner_photo delete from file
                    if($id->banner_photo != 'banner_default_photo.jpg'){
                        unlink(public_path('uploads-photos/contact-banner-photo/').$request->old_banner_photo);
                    }
                    // photo upload code start here
                    // step:1->new photo name create
                    $new_name=Str::random(7).'.'.$request->file('banner_photo')->getClientOriginalExtension();
                    // step:2->new photo upload
                    $save_link=public_path('uploads-photos/contact-banner-photo/').$new_name;
                    Image::make($request->file('banner_photo'))->resize(1600,350)->save($save_link);
                    // photo upload code endt here
                    $id->banner_photo=$new_name;
                };
            }
            else{
                return back()->with('file_format_error_contact_banner','there are one or many unsupported file in your attachment');
            }
            $id->short_title=$request->short_title;
            $id->long_title=$request->long_title;
            $id->save();
            return back()->with('update_message','Update successfully!');
        }
    }
    /*===============================contact-banner code end here========================================= */
}
