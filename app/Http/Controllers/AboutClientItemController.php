<?php

namespace App\Http\Controllers;

use App\Models\About_client_item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class AboutClientItemController extends Controller
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
        $about_client_item_info=About_client_item::latest()->get();
        $deleted_client_data=About_client_item::onlyTrashed()->latest()->get();
        return view('dashboard_site.about_client_item.index',compact('about_client_item_info','deleted_client_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard_site.about_client_item.create');
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
            'client_photo'=>'required|Image',
        ]);
        // photo upload code start here
            // step:1->new photo name create
            $new_name=Str::random(7).'.'.$request->file('client_photo')->getClientOriginalExtension();
            // step:2->new photo upload
            $save_link=public_path('uploads-photos/about-client-photo/').$new_name;
            Image::make($request->file('client_photo'))->resize(200,120)->save($save_link);
        // photo upload code endt here
        About_client_item::insert([
            'client_photo'=>$new_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About_client_item  $about_client_item
     * @return \Illuminate\Http\Response
     */
    public function show(About_client_item $about_client_item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About_client_item  $about_client_item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about_client_item_data=About_client_item::where('id',$id)->first();
        return view('dashboard_site.about_client_item.editpage',compact('about_client_item_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About_client_item  $about_client_item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('client_photo')){
            //client_photo delete from file
                unlink(public_path('uploads-photos/about-client-photo/').$request->old_client_photo);

            // photo upload code start here
                // step:1->new photo name create
                $new_name=Str::random(7).'.'.$request->file('client_photo')->getClientOriginalExtension();
                // step:2->new photo upload
                $save_link=public_path('uploads-photos/about-client-photo/').$new_name;
                Image::make($request->file('client_photo'))->resize(200,120)->save($save_link);
            // photo upload code endt here
        };
        if($request->hasFile('client_photo') != Null){
            About_client_item::find($id)->update([
                'client_photo'=>$new_name,
            ]);
        }
        return back()->with('update_message','Update Complated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About_client_item  $about_client_item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        About_client_item::find($id)->delete();
        return back()->with('deleted_message','Delete Complated!');

    }

    //about client item deleted data restore & forceDelete code start here
    public function restore_about_client($id)
    {
        About_client_item::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function about_client_forceDelete($id)
    {
        unlink(public_path('uploads-photos/about-client-photo/').About_client_item::onlyTrashed()->find($id)->client_photo);
        About_client_item::onlyTrashed()->where('id',$id)->forceDelete();
        return back();
    }
    //about client item deleted data restore & forceDelete code end here
}
