<?php

namespace App\Http\Controllers;

use App\Models\Home_banner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class HomeBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkroll');
    }
    /*===============================home_banner code start here========================================= */
    public function index()
    {
        $deleted_banner_data=Home_banner::onlyTrashed()->latest()->get();
        $home_banner_info=Home_banner::latest()->get();
        return view('dashboard_site.home_banner.index',compact('home_banner_info','deleted_banner_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard_site.home_banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            '*'=>'required',
            'banner_photo'=>'required|Image',
        ]);
         // photo upload code start here
            // step:1->new photo name create
            $new_name=Str::random(7).'.'.$request->file('banner_photo')->getClientOriginalExtension();
            // step:2->new photo upload
            $save_link=public_path('uploads-photos/home-banner-photo/').$new_name;
            Image::make($request->file('banner_photo'))->resize(1600,800)->save($save_link);
        // photo upload code endt here
        Home_banner::insert([
            'short_title'=>$request->short_title,
            'long_title'=>$request->long_title,
            'banner_photo'=>$new_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home_banner  $home_banner
     * @return \Illuminate\Http\Response
     */
    public function show(Home_banner $home_banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home_banner  $home_banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Home_banner $home_banner)
    {
        return view('dashboard_site.home_banner.editpage',compact('home_banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Home_banner  $home_banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home_banner $home_banner)
    {
        $request->validate([
            'short_title'=>'required',
            'long_title'=>'required',
        ]);
        if($request->hasFile('banner_photo')){
            //banner_photo delete from file
                unlink(public_path('uploads-photos/home-banner-photo/').$request->old_banner_photo);

                // photo upload code start here
                // step:1->new photo name create
                $new_name=Str::random(7).'.'.$request->file('banner_photo')->getClientOriginalExtension();
                // step:2->new photo upload
                $save_link=public_path('uploads-photos/home-banner-photo/').$new_name;
                Image::make($request->file('banner_photo'))->resize(1600,800)->save($save_link);
            // photo upload code endt here
            $home_banner->banner_photo=$new_name;
        };
        $home_banner->short_title=$request->short_title;
        $home_banner->long_title=$request->long_title;
        $home_banner->save();
        return back()->with('edit_message','Edit successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home_banner  $home_banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home_banner $home_banner)
    {
        $home_banner->delete();
        return back()->with('erorr_message','Delete Complated!');
    }

    //banner deleted data restore & forceDelete code start here
    public function restore_banner($id)
    {
        Home_banner::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function banner_forceDelete($id)
    {
        unlink(public_path('uploads-photos/home-banner-photo/').Home_banner::onlyTrashed()->find($id)->banner_photo);
        Home_banner::onlyTrashed()->where('id',$id)->forceDelete();
        return back();
    }
    //banner deleted data restore & forceDelete code end here

    /*===============================home_banner code end here========================================== */



}
