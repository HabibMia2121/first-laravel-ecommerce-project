<?php

namespace App\Http\Controllers;

use App\Models\About_team;
use App\Models\About_team_social_icon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;

class AboutTeamController extends Controller
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
    public function index()
    {
        return view('dashboard_site.about_team.index',[
            'about_team_info'=>About_team::latest()->get(),
            'deleted_team_data'=>About_team::onlyTrashed()->latest()->get(),
            'about_team_social_icon_data'=>About_team_social_icon::latest()->get(),
            'deleted_social_icon_data'=>About_team_social_icon::onlyTrashed()->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard_site.about_team.create');
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
            'thumbnail_photo'=>'required|Image',
        ]);
         // photo upload code start here
            // step:1->new photo name create
            $new_name=Str::random(7).'.'.$request->file('thumbnail_photo')->getClientOriginalExtension();
            // step:2->new photo upload
            $save_link=public_path('uploads-photos/about-team-photo/').$new_name;
            Image::make($request->file('thumbnail_photo'))->resize(370,260)->save($save_link);
        // photo upload code endt here
        About_team::insert([
            'name'=>$request->name,
            'designation'=>$request->designation,
            'short_description'=>$request->short_description,
            'thumbnail_photo'=>$new_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About_team  $about_team
     * @return \Illuminate\Http\Response
     */
    public function show(About_team $about_team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About_team  $about_team
     * @return \Illuminate\Http\Response
     */
    public function edit(About_team $about_team)
    {
        return view('dashboard_site.about_team.editpage',compact('about_team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About_team  $about_team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About_team $about_team)
    {
        $request->validate([
            'name'=>'required',
            'designation'=>'required',
            'short_description'=>'required',
        ]);

        if($request->hasFile('thumbnail_photo')){
            //team_photo delete from file
                unlink(public_path('uploads-photos/about-team-photo/').$request->old_thumbnail_photo);

                // photo upload code start here
                // step:1->new photo name create
                $new_name=Str::random(7).'.'.$request->file('thumbnail_photo')->getClientOriginalExtension();
                // step:2->new photo upload
                $save_link=public_path('uploads-photos/about-team-photo/').$new_name;
                Image::make($request->file('thumbnail_photo'))->resize(370,260)->save($save_link);
            // photo upload code endt here
            $about_team->thumbnail_photo=$new_name;
        };
        $about_team->name=$request->name;
        $about_team->designation=$request->designation;
        $about_team->short_description=$request->short_description;
        $about_team->save();
        return back()->with('edit_message','Edit successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About_team  $about_team
     * @return \Illuminate\Http\Response
     */
    public function destroy(About_team $about_team)
    {
        $about_team->delete();
        return back()->with('erorr_message','Delete Complated!');
    }

    //about_team deleted data restore & forceDelete code start here
    public function restore_about_team($id)
    {
        About_team::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function about_team_forceDelete($id)
    {
        unlink(public_path('uploads-photos/about-team-photo/').About_team::onlyTrashed()->find($id)->thumbnail_photo);
        About_team::onlyTrashed()->where('id',$id)->forceDelete();
        return back();
    }
    //about_team deleted data restore & forceDelete code end here

    //team social icon code start here
    public function team_social_icon(Request $request)
    {
        $request->validate([
            'social_icon'=>'required',
            'social_icon_link'=>'required',
        ]);

        About_team_social_icon::insert([
            'social_icon'=>$request->social_icon,
            'social_icon_link'=>$request->social_icon_link,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('s_message','Icon added successfully!');
    }
    public function team_icon_editpage(About_team_social_icon $social_icon_id)
    {
        return view('dashboard_site.about_team.iconEditPage',compact('social_icon_id'));
    }
    public function team_social_icon_update(Request $request ,About_team_social_icon $social_icon_id)
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
    public function team_icon_delete(About_team_social_icon $id)
    {
        $id->delete();
        return back()->with('icon_delete_message','Delete Complated!');
    }
      //team social icon deleted data restore & forceDelete code start here
      public function restore_team_social_icon($id)
      {
        About_team_social_icon::onlyTrashed()->where('id',$id)->restore();
          return back();
      }
      public function team_social_icon_forceDelete($id)
      {
        About_team_social_icon::onlyTrashed()->where('id',$id)->forceDelete();
          return back();
      }
      //team social icon deleted data restore & forceDelete code end here
    //team social icon code end here
}
