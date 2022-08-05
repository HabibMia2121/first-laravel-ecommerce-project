<?php

namespace App\Http\Controllers;

use App\Models\Contact_customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use phpDocumentor\Reflection\Types\Null_;

class ContactCustomerController extends Controller
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
        $deleted_client_data=Contact_customer::onlyTrashed()->latest()->get();
        $contact_customer_info=Contact_customer::latest()->get();
        return view('dashboard_site.contact_client_item.index',compact('contact_customer_info','deleted_client_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard_site.contact_client_item.create');
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
            'customer_photo'=>'required|Image',
        ]);
        // photo upload code start here
            // step:1->new photo name create
            $new_name=Str::random(7).'.'.$request->file('customer_photo')->getClientOriginalExtension();
            // step:2->new photo upload
            $save_link=public_path('uploads-photos/contact-client-photo/').$new_name;
            Image::make($request->file('customer_photo'))->resize(200,120)->save($save_link);
        // photo upload code endt here
        Contact_customer::insert([
            'customer_photo'=>$new_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact_customer  $contact_customer
     * @return \Illuminate\Http\Response
     */
    public function show(Contact_customer $contact_customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact_customer  $contact_customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact_client_item_data=Contact_customer::where('id',$id)->first();
        return view('dashboard_site.contact_client_item.editpage',compact('contact_client_item_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact_customer  $contact_customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('customer_photo')){
            //client_photo delete from file
                unlink(public_path('uploads-photos/contact-client-photo/').$request->old_customer_photo);

            // photo upload code start here
                // step:1->new photo name create
                $new_name=Str::random(7).'.'.$request->file('customer_photo')->getClientOriginalExtension();
                // step:2->new photo upload
                $save_link=public_path('uploads-photos/contact-client-photo/').$new_name;
                Image::make($request->file('customer_photo'))->resize(200,120)->save($save_link);
            // photo upload code endt here
        };
        if($request->hasFile('customer_photo') != Null){
            Contact_customer::find($id)->update([
                'customer_photo'=>$new_name,
            ]);
        }
        return back()->with('update_message','Update Complated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact_customer  $contact_customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact_customer::find($id)->delete();
        return back()->with('deleted_message','Delete Complated!');
    }
     //contact client item deleted data restore & forceDelete code start here
     public function restore_contact_client($id)
     {
         Contact_customer::onlyTrashed()->where('id',$id)->restore();
         return back();
     }
     public function contact_client_forceDelete($id)
     {
         unlink(public_path('uploads-photos/contact-client-photo/').Contact_customer::onlyTrashed()->find($id)->customer_photo);
         Contact_customer::onlyTrashed()->where('id',$id)->forceDelete();
         return back();
     }
     //contact client item deleted data restore & forceDelete code end here
}
