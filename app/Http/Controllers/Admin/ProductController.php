<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MultipleImage;
use Idemonbd\Notify\Facades\Notify;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $brands = Brand::get();
        return view('admin.products.create', compact('categories', 'brands'));
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
            'category_id' => ['required', 'numeric'],
            'subcategory_id' => [],
            'brand_id' => ['required', 'numeric'],
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'sell_price' => '',
            'price' => ['required', 'string', 'numeric'],
            'stock' => ['required', 'numeric'],
            'short_description' => ['required', 'string' ],
            'long_description' => ['nullable', 'string'],
            'image' => 'required | mimes:jpg,jpeg,png,gif,svg,webp|max:2000',
        ]);
        $product = Product::create($request->all() + [
            'user_id' => Auth::id() ?? '',
        ]);
        if ($request->hasFile('image')) {
            $uploaded_photo = $request->file('image');
            $photo_name = time() . "." . $uploaded_photo->getClientOriginalExtension($uploaded_photo);
            $new_photo_location = 'nsseb_assets/media/images/product_img/' . $photo_name;

            Image::make($uploaded_photo)->resize(294, 300)->save($new_photo_location);
            Product::find($product->id)->update([
                'image' => $photo_name
            ]);

        }

        if ($request->hasFile('image_name')) {
            $flag = 1;

            foreach ($request->file('image_name') as $single_photo) {
                $uploaded_photo = $single_photo;
                $photo_name = $product->id . '-' . $flag++ . "." . $uploaded_photo->getClientOriginalExtension();

                $new_photo_location = 'nsseb_assets/media/images/multiple_photo/' . $photo_name;

                Image::make($uploaded_photo)->resize(294, 300)->save($new_photo_location);
                MultipleImage::create([
                    'product_id' => $product->id,
                    'image_name' => $photo_name,
                ]);

                if ($flag == 4) {
                    break;
                }
            }
        }

        Notify::success('Product has been added!', 'Success');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $multiple_image = MultipleImage::where('product_id', $product->id)->get();
        return view('admin.products.show', compact('product', 'multiple_image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::get();
        $brands = Brand::get();
        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => ['required', 'numeric'],
            'subcategory_id' => [],
            'brand_id' => ['required', 'numeric'],
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'sell_price' => '',
            'price' => ['required', 'string', 'numeric'],
            'stock' => ['required', 'numeric'],
            'short_description' => ['required', 'string' ],
            'long_description' => ['nullable', 'string'],
            'image' => 'nullable | mimes:jpg,jpeg,png,gif,svg,webp|max:2000',
        ]);

        $product->update($request->except('image', 'image_name'));

        if ($request->hasFile('image')) {
            if($product->image)
            {
                unlink('nsseb_assets/media/images/product_img/' . $product->image);
            }

            $uploaded_photo = $request->file('image');
            $photo_name = time() . "." . $uploaded_photo->getClientOriginalExtension($uploaded_photo);
            $new_photo_location = 'nsseb_assets/media/images/product_img/' . $photo_name;

            Image::make($uploaded_photo)->resize(294, 300)->save($new_photo_location);
            $product->update([
                'image' => $photo_name
            ]);
        }

        if ($request->hasFile('image_name')) {

            $multiple_images = MultipleImage::where('product_id', $product->id)->get();

            foreach ($multiple_images as $multiple_image) {
                if ($multiple_image) {
                    $multiple_image->delete();
                }
                if ($multiple_image->image_name) {
                    unlink('nsseb_assets/media/images/multiple_photo/' . $multiple_image->image_name);
                }
            }

            $flag = 1;
            foreach ($request->file('image_name') as $single_photo) {

                $uploaded_photo = $single_photo;
                $photo_name = $product->id . '-' . $flag++ . "." . $uploaded_photo->getClientOriginalExtension();

                $new_photo_location = 'nsseb_assets/media/images/multiple_photo/' . $photo_name;

                Image::make($uploaded_photo)->resize(294, 300)->save($new_photo_location);
                MultipleImage::create([
                    'product_id' => $product->id,
                    'image_name' => $photo_name,
                ]);

                if ($flag == 4) {
                    break;
                }
            }
        }

        Notify::success('Product has been updated!', 'Success');
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Notify::success('Product Deleted', 'Deleted');
        return back();
    }
}
