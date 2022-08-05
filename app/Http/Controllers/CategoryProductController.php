<?php

namespace App\Http\Controllers;

use App\Models\Category_product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
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
    /*===============================category data code start here======================================== */
    public function index()
    {
        $category_product_info=Category_product::latest()->get();
        $deleted_category_data=Category_product::onlyTrashed()->latest()->get();
        return view('dashboard_site.category.index',compact('category_product_info','deleted_category_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard_site.category.create');
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
        Category_product::insert([
            'category_name'=>$request->category_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category_product  $category_product
     * @return \Illuminate\Http\Response
     */
    public function show(Category_product $category_product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category_product  $category_product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_product_info=Category_product::where('id',$id)->first();
        return view('dashboard_site.category.editpage',compact('category_product_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category_product  $category_product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            '*'=>'required',
        ]);

        Category_product::find($id)->update([
            'category_name'=>$request->category_name,
        ]);
        return back()->with('update_message','Update Complated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category_product  $category_product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category_product::find($id)->delete();
        return back()->with('delete_message','Delete Complated!');
    }

    //category deleted data restore & forceDelete code start here
    public function restore_category($id)
    {
      Category_product::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function category_forceDelete($id)
    {
      Category_product::onlyTrashed()->where('id',$id)->forceDelete();
        return back();
    }
    //category deleted data restore & forceDelete code end here

    /*===============================category data code end here======================================== */
}
