<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Contact_describe;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /*===============================contact-customer data store code start here============================= */
    public function customer_data_store(Request $request)
    {
        $request->validate([
            'phone_number'=> 'required|digits:11',
        ]);
        Contact::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'message'=>$request->message,
            'created_at'=>Carbon::now(),
        ]);
        return back();
    }
    public function contact_from_data_show()
    {
        $contact_from_data=Contact::latest()->get();
        return view('dashboard_site.contact_from.index',compact('contact_from_data'));
    }
    public function contact_from_delete(Contact $contact_id)
    {
        $contact_id->delete();
        return back()->with('delete_message','Delete Complated!');
    }
    /*===============================contact-customer data store code end here============================= */

    /*===============================Contact_describe code start here============================= */
    public function contact_describe_page()
    {
        $deleted_contact_data=Contact_describe::onlyTrashed()->latest()->get();
        $contact_describe_info=Contact_describe::latest()->get();
        return view('dashboard_site.contact.index',compact('contact_describe_info','deleted_contact_data'));
    }
    public function contact_describe_post(Request $request)
    {
        $request->validate([
            '*'=>'required',
        ]);

        Contact_describe::insert([
            'title'=>$request->title,
            'short_description'=>$request->short_description,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Added successfully!');

    }
    public function contact_describe_editpage(Contact_describe $describe_info_id)
    {
        return view('dashboard_site.contact.editpage',compact('describe_info_id'));
    }
    public function contact_describe_update(Request $request,Contact_describe $describe_info_id)
    {
        $request->validate([
            '*'=>'required',
        ]);

        $describe_info_id->title=$request->title;
        $describe_info_id->short_description=$request->short_description;
        $describe_info_id->save();
        return back()->with('update_message','Update Complated!');
    }
    public function contact_describe_delete(Contact_describe $id)
    {
        $id->delete();
        return back()->with('delete_message','Delete Complated!');
    }
    //contact_describe deleted data restore & forceDelete code start here
    public function restore_contact_describe($id)
    {
        Contact_describe::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function contact_describe_forceDelete($id)
    {
        Contact_describe::onlyTrashed()->where('id',$id)->forceDelete();
        return back();
    }
    //contact_describe deleted data restore & forceDelete code end here

    /*===============================Contact_describe code end here============================= */
}
