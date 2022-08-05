<?php

namespace App\Http\Controllers;

use App\Models\Home_feature;
use App\Models\Home_feature_head;
use App\Models\Home_feature_list;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;


class HomeFeatureController extends Controller
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
    /*===============================home_feature code start here========================================= */
    public function index()
    {
        $deleted_feature_data=Home_feature::onlyTrashed()->latest()->get();
        $home_feature_info=Home_feature::latest()->get()->take(1);
        $home_feature_list_info=Home_feature_list::latest()->get();
        $deleted_home_feature_list_info=Home_feature_list::onlyTrashed()->latest()->get();
        return view('dashboard_site.home_feature.index',compact('home_feature_info','deleted_feature_data','home_feature_list_info','deleted_home_feature_list_info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $home_feature_head_data=Home_feature_head::first();
        return view('dashboard_site.home_feature.create',compact('home_feature_head_data'));
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
            'feature_photo'=>'required|Image',
        ]);
         // photo upload code start here
            // step:1->new photo name create
            $new_name=Str::random(7).'.'.$request->file('feature_photo')->getClientOriginalExtension();
            // step:2->new photo upload
            $save_link=public_path('uploads-photos/home-feature-photo/').$new_name;
            Image::make($request->file('feature_photo'))->resize(570,350)->save($save_link);
        // photo upload code endt here
        Home_feature::insert([
            'title'=>$request->title,
            'small_description'=>$request->small_description,
            'feature_photo'=>$new_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home_feature  $home_feature
     * @return \Illuminate\Http\Response
     */
    public function show(Home_feature $home_feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home_feature  $home_feature
     * @return \Illuminate\Http\Response
     */
    public function edit(Home_feature $home_feature)
    {
        return view('dashboard_site.home_feature.editpage',compact('home_feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Home_feature  $home_feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home_feature $home_feature)
    {
        $request->validate([
            'title'=>'required',
            'small_description'=>'required',
        ]);

        if($request->hasFile('feature_photo')){
            //feature_photo delete from file
                unlink(public_path('uploads-photos/home-feature-photo/').$request->old_feature_photo);

                // photo upload code start here
                // step:1->new photo name create
                $new_name=Str::random(7).'.'.$request->file('feature_photo')->getClientOriginalExtension();
                // step:2->new photo upload
                $save_link=public_path('uploads-photos/home-feature-photo/').$new_name;
                Image::make($request->file('feature_photo'))->resize(570,350)->save($save_link);
            // photo upload code endt here
            $home_feature->feature_photo=$new_name;
        };
        $home_feature->title=$request->title;
        $home_feature->small_description=$request->small_description;
        $home_feature->save();
        return back()->with('edit_message','Edit successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home_feature  $home_feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home_feature $home_feature)
    {
        $home_feature->delete();
        return back()->with('erorr_message','Delete Complated!');
    }

    //feature deleted data restore & forceDelete code start here
    public function restore_feature($id)
    {
        Home_feature::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function feature_forceDelete($id)
    {
        unlink(public_path('uploads-photos/home-feature-photo/').Home_feature::onlyTrashed()->find($id)->feature_photo);
        Home_feature::onlyTrashed()->where('id',$id)->forceDelete();
        return back();
    }
    //feature deleted data restore & forceDelete code end here
    /*===============================home_feature code end here========================================= */
    // feature title code start here
    public function feature_title(Request $request ,Home_feature_head $feature_head_id)
    {
        $feature_head_id->feature_title=$request->feature_title;
        $feature_head_id->save();
        return back()->with('update_message','Update Complated!');
    }
    // feature title code end here

    // feature short text code start here
    public function feature_short_text(Request $request)
    {
        $request->validate([
            '*'=>'required',
        ]);
        Home_feature_list::insert([
            'short_feature_list'=>$request->short_feature_list,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('s_message','Added successfully!');
    }
    public function feature_short_list_delete(Home_feature_list $feature_short_list_id)
    {
        $feature_short_list_id->delete();
        return back()->with('d_message','Delete Complated!');
    }

        //feature_short_content deleted data restore & forceDelete code start here
    public function restore_feature_short_content($id)
    {
        Home_feature_list::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function feature_short_content_forceDelete($id)
    {
        Home_feature_list::onlyTrashed()->where('id',$id)->forceDelete();
        return back();
    }
        //feature_short_content deleted data restore & forceDelete code end here
    // feature short text code end here

}
