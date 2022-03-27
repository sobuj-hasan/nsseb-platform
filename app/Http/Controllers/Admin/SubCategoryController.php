<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Idemonbd\Notify\Facades\Notify;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subcategories'] = SubCategory::latest()->get();
        return view('admin.products.subcategory.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        return view('admin.products.subcategory.create', $data);
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
            'category_id' => ['required'],
            'name' => ['required', 'string', 'min:3', 'max:30', 'unique:sub_categories'],
            'ar_name' => ['required', 'string', 'min:3', 'max:255', 'unique:sub_categories'],
        ]);

        SubCategory::create($request->except('_token'));
        Notify::success('' . $request->name . ' Sub-Category created', 'success');
        return redirect(route('subcategories.index'));
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
        $data['categories'] = Category::all();
        $data['subcategory'] = SubCategory::find($id);
        return view('admin.products.subcategory.edit', $data);
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
            'category_id' => 'required',
            'name' => 'required|unique:sub_categories,name,' . $id,
            'ar_name' => 'required|unique:sub_categories,ar_name,' . $id,
        ]);
        $category = SubCategory::find($id);
        $category->category_id = $request->category_id;
        $category->name = $request->name;
        $category->ar_name = $request->ar_name;
        $category->save();
        Notify::success('' . $category->name . ' Sub-Category Updated', 'Updated');
        return redirect()->route('subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();
        Notify::success('Sub-Category successfully Deleted', 'Deleted');
        return back();
    }


    public function getsubcategory(Request $request)
    {
        $category_id = $request->category_id;
        $categoryHtmlOption = "<option value=''> Select Sub Category</option>";
        $categories = SubCategory::where([['category_id', $category_id]])->get();
        foreach ($categories as $subcategory) {
            $categoryHtmlOption .= "<option value='$subcategory->id'>$subcategory->name</option>";
        }
        // echo $cityHtmlOption;
        return ($categoryHtmlOption);
    }
}
