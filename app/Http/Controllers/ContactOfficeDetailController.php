<?php

namespace App\Http\Controllers;

use App\Models\Contact_map_link;
use App\Models\Contact_office_detail;
use App\Models\Contact_social_icon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactOfficeDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkroll');
    }
    /*===============================contact-office_detail code start here========================================= */
    public function office_detail_update_page()
    {
        $deleted_social_icon_data=Contact_social_icon::onlyTrashed()->latest()->get();
        $contact_social_icon_info=Contact_social_icon::latest()->get();
        $office_info=Contact_office_detail::first();
        return view('dashboard_site.contact_office_detail.index',compact('office_info','contact_social_icon_info','deleted_social_icon_data'));
    }
    public function office_detail_update(Request $request,Contact_office_detail $id)
    {
        $request->validate([
            '*'=>'required',
        ]);

        $id->title=$request->title;
        $id->short_description=$request->short_description;
        $id->save();
        return back()->with('update_message','Update successfully!');
    }

     //contact office social icon code start here
     public function office_social_icon(Request $request)
     {
        $request->validate([
            'social_icon'=>'required',
            'social_icon_link'=>'required',
        ]);

        Contact_social_icon::insert([
            'social_icon'=>$request->social_icon,
            'social_icon_link'=>$request->social_icon_link,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('s_message','Icon added successfully!');
     }
     public function contact_office_icon_editpage(Contact_social_icon $social_icon_id)
     {
        return view('dashboard_site.contact_office_detail.iconEditPage',compact('social_icon_id'));
     }
     public function contact_office_social_icon_update(Request $request ,Contact_social_icon $social_icon_id)
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
     public function contact_office_icon_delete(Contact_social_icon $id)
     {

        $id->delete();
        return back()->with('icon_delete_message','Delete Complated!');
     }
       //contact office social icon deleted data restore & forceDelete code start here
       public function restore_contact_office_social_icon($id)
       {
        Contact_social_icon::onlyTrashed()->where('id',$id)->restore();
           return back();
       }
       public function contact_office_social_icon_forceDelete($id)
       {
        Contact_social_icon::onlyTrashed()->where('id',$id)->forceDelete();
           return back();
       }
       //contact office social icon deleted data restore & forceDelete code end here
     //contact office social icon code end here

    /*===============================contact-office_detail code end here======================================*/

    /*===============================embed_location_link code start here======================================*/
       public function embed_location_link()
       {
            $map_data=Contact_map_link::first();
            return view('dashboard_site.contact_embed_map.index',compact('map_data'));
       }
       public function post_embed_map_link(Request $request,Contact_map_link $map_id)
       {
            $request->validate([
                '*'=>'required',
            ]);
            $map_id->embed_map_link=$request->embed_map_link;
            $map_id->save();
            return back()->with('update_message','Update successfully!');
       }
    /*===============================embed_location_link code end here========================================*/
}
