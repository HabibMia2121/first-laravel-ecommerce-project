<?php

namespace App\Http\Controllers;

use App\Models\Category_product;
use App\Models\Subcategory_product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubcategoryProductController extends Controller
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

        return view('dashboard_site.subcategory.index',[
            'subcategory_all_info'=>Subcategory_product::latest()->get(),
            'deleted_subcategory_data'=>Subcategory_product::onlyTrashed()->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_all_info=Category_product::all();
        return view('dashboard_site.subcategory.create',compact('category_all_info'));
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
            '*'=>'required|unique:subcategory_products,subcategory_name',
        ],[
            'subcategory_name.required'=>'Subcategory name field is required please try again!',
        ]);
        Subcategory_product::insert([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory_product  $subcategory_product
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory_product $subcategory_product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory_product  $subcategory_product
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        return view('dashboard_site.subcategory.editpage',[
            'subcategory_info'=>Subcategory_product::where('id',$id)->first(),
            'category_all_info'=>Category_product::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory_product  $subcategory_product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Subcategory_product::find($id)->update([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,
        ]);
        return back()->with('update_message','Update Complated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory_product  $subcategory_product
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Subcategory_product::find($id)->delete();
        return back()->with('delete_message','Delete Complated!');

    }

    //subcategory deleted data restore & forceDelete code start here
    public function restore_subcategory($id)
    {
        Subcategory_product::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function subcategory_forceDelete($id)
    {
        Subcategory_product::onlyTrashed()->where('id',$id)->forceDelete();
        return back();
    }
    //subcategory deleted data restore & forceDelete code end here
}
