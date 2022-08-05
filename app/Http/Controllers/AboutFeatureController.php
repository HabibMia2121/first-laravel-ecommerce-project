<?php

namespace App\Http\Controllers;

use App\Models\About_feature;
use App\Models\About_feature_social_icon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Carbon\Carbon;

class AboutFeatureController extends Controller
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
    /*===============================about_feature code start here========================================= */
    public function index()
    {
        return view('dashboard_site.about_feature.index',[
            'about_feature_info'=>About_feature::latest()->get()->take(1),
            'deleted_feature_data'=>About_feature::onlyTrashed()->latest()->get(),
            'about_feature_social_icon_data'=>About_feature_social_icon::latest()->get(),
            'deleted_social_icon_data'=>About_feature_social_icon::onlyTrashed()->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard_site.about_feature.create');
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
            'photo'=>'required|Image',
        ]);
         // photo upload code start here
            // step:1->new photo name create
            $new_name=Str::random(7).'.'.$request->file('photo')->getClientOriginalExtension();
            // step:2->new photo upload
            $save_link=public_path('uploads-photos/about-feature-photo/').$new_name;
            Image::make($request->file('photo'))->resize(570,350)->save($save_link);
        // photo upload code endt here
        About_feature::insert([
            'small_title'=>$request->small_title,
            'long_description'=>$request->long_description,
            'photo'=>$new_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About_feature  $about_feature
     * @return \Illuminate\Http\Response
     */
    public function show(About_feature $about_feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About_feature  $about_feature
     * @return \Illuminate\Http\Response
     */
    public function edit(About_feature $about_feature)
    {
        return view('dashboard_site.about_feature.editpage',compact('about_feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About_feature  $about_feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About_feature $about_feature)
    {
        $request->validate([
            'small_title'=>'required',
            'long_description'=>'required',
        ]);

        if($request->hasFile('photo')){
            //feature_photo delete from file
                unlink(public_path('uploads-photos/about-feature-photo/').$request->old_photo);

                // photo upload code start here
                // step:1->new photo name create
                $new_name=Str::random(7).'.'.$request->file('photo')->getClientOriginalExtension();
                // step:2->new photo upload
                $save_link=public_path('uploads-photos/about-feature-photo/').$new_name;
                Image::make($request->file('photo'))->resize(570,350)->save($save_link);
            // photo upload code endt here
            $about_feature->photo=$new_name;
        };
        $about_feature->small_title=$request->small_title;
        $about_feature->long_description=$request->long_description;
        $about_feature->save();
        return back()->with('edit_message','Edit successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About_feature  $about_feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(About_feature $about_feature)
    {
        $about_feature->delete();
        return back()->with('erorr_message','Delete Complated!');
    }

    //about_feature deleted data restore & forceDelete code start here
    public function restore_about_feature($id)
    {
        About_feature::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function about_feature_forceDelete($id)
    {
        unlink(public_path('uploads-photos/about-feature-photo/').About_feature::onlyTrashed()->find($id)->photo);
        About_feature::onlyTrashed()->where('id',$id)->forceDelete();
        return back();
    }
    //about_feature deleted data restore & forceDelete code end here

    // feature social icon code start here
    public function feature_social_icon(Request $request)
    {
        $request->validate([
            'social_icon'=>'required',
            'social_icon_link'=>'required',
        ]);

        About_feature_social_icon::insert([
            'social_icon'=>$request->social_icon,
            'social_icon_link'=>$request->social_icon_link,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('s_message','Icon added successfully!');
    }
    public function feature_icon_editpage(About_feature_social_icon $social_icon_id)
    {
        return view('dashboard_site.about_feature.iconEditPage',compact('social_icon_id'));
    }
    public function feature_social_icon_update(Request $request,About_feature_social_icon $social_icon_id)
    {
        $request->validate([
            'social_icon'=>'required',
            'social_icon_link'=>'required',
        ]);

        $social_icon_id->social_icon=$request->social_icon;
        $social_icon_id->social_icon_link=$request->social_icon_link;
        $social_icon_id->save();
        return back()->with('edit_message','Update Complated!');
    }
    public function feature_icon_delete(About_feature_social_icon $id)
    {
        $id->delete();
        return back()->with('icon_delete_message','Delete Complated!');
    }
      //feature social icon deleted data restore & forceDelete code start here
      public function restore_feature_social_icon($id)
      {
          About_feature_social_icon::onlyTrashed()->where('id',$id)->restore();
          return back();
      }
      public function feature_social_icon_forceDelete($id)
      {
          About_feature_social_icon::onlyTrashed()->where('id',$id)->forceDelete();
          return back();
      }
      //feature social icon deleted data restore & forceDelete code end here
    // feature social icon code end here
    /*===============================about_feature code end here========================================= */

}
