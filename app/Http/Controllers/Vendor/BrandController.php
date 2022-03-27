<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Brand;
use Illuminate\Http\Request;
use Idemonbd\Notify\Facades\Notify;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('vendor.products.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.products.brands.create');
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
            'name' => ['required', 'string', 'min:3', 'max:30', 'unique:brands'],
            'ar_name' => ['nullable', 'string', 'min:3', 'max:255', 'unique:brands'],
        ]);
        Brand::create($request->except('_token'));
        Notify::success('' . $request->name . ' Brand created', 'success');
        return redirect(route('vendorbrands.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('vendor.products.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
            'ar_name' => 'nullable|unique:categories,ar_name,' . $id,
        ]);
        $brands = Brand::find($id);
        $brands->name = $request->name;
        $brands->ar_name = $request->ar_name;
        $brands->save();
        Notify::success('Brand has been updated', 'Updated');
        return redirect()->route('vendorbrands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::find($id)->delete();
        Notify::success('This Brand successfully Deleted', 'Deleted');
        return back();
    }
}
