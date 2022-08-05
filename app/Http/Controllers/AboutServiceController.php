<?php

namespace App\Http\Controllers;

use App\Models\About_service;
use App\Models\About_service_background_photo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class AboutServiceController extends Controller
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
    /*===============================about_service code start here========================================= */
    public function index()
    {
        return view('dashboard_site.about_service.index',[
            'about_service_info'=>About_service::latest()->get(),
            'deleted_service_data'=>About_service::onlyTrashed()->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard_site.about_service.create');
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
        ]);
        About_service::insert([
            'icon'=>$request->icon,
            'title'=>$request->title,
            'short_description'=>$request->short_description,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About_service  $about_service
     * @return \Illuminate\Http\Response
     */
    public function show(About_service $about_service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About_service  $about_service
     * @return \Illuminate\Http\Response
     */
    public function edit(About_service $about_service)
    {
        return view('dashboard_site.about_service.editpage',compact('about_service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About_service  $about_service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About_service $about_service)
    {
        $request->validate([
            '*'=>'required',
        ]);

        $about_service->icon=$request->icon;
        $about_service->title=$request->title;
        $about_service->short_description=$request->short_description;
        $about_service->save();
        return back()->with('update_message','Update Complated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About_service  $about_service
     * @return \Illuminate\Http\Response
     */
    public function destroy(About_service $about_service)
    {
        $about_service->delete();
        return back()->with('erorr_message','Delete Complated!');
    }
    //about_service deleted data restore & forceDelete code start here
    public function restore_about_service($id)
    {
        About_service::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function about_service_forceDelete($id)
    {
        About_service::onlyTrashed()->where('id',$id)->forceDelete();
        return back();
    }
    //about_service deleted data restore & forceDelete code end here


    //About service background photo code start here
    public function service_bg_photo()
    {
        $background_photo_info=About_service_background_photo::first();
        return view('dashboard_site.about_service.bg_photo',compact('background_photo_info'));
    }
    public function service_bg_photo_update(Request $request,About_service_background_photo $id)
    {
        if($request->hasFile('background_photo')){
            //service_bg_photo delete from file
            if($id->background_photo != 'service_bg_default_photo.jpg'){
                unlink(public_path('uploads-photos/about-service-bg-photo/').$request->old_background_photo);
            }
            // photo upload code start here
            // step:1->new photo name create
            $new_name=Str::random(7).'.'.$request->file('background_photo')->getClientOriginalExtension();
            // step:2->new photo upload
            $save_link=public_path('uploads-photos/about-service-bg-photo/').$new_name;
            Image::make($request->file('background_photo'))->resize(1600,914)->save($save_link);
            // photo upload code endt here
            $id->background_photo=$new_name;
        };
        $id->save();
        return back()->with('update_message','Update Complated!');
    }
    //About service background photo code end here
    /*===============================about_service code end here========================================= */

    /*===============================about_service client_photo code start here============================= */

    /*===============================about_service client_photo code end here============================= */


}
