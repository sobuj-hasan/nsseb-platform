<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Idemonbd\Notify\Facades\Notify;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::get();
        return view('admin.blogs.create', compact('categories'));
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
            'category_id' => 'required',
            'title' => 'required|min:8|max:255',
            'description' => 'required|min:100',
            'image' => 'required|image',
        ]);

        $blog = Blog::create($request->all() + [
            'user_id' => Auth::id()
        ]);

        $blog->slug = Str::slug($request->title) . '-' . Str::random(5);

        if ($request->hasFile('image')) {
            $photo_name = time() . '.' . $request->image->extension();
            $request->image->move('nsseb_assets/media/images/blog_img/', $photo_name);
            $blog->image = $photo_name;
        }    
        $blog->save();
        Notify::success('Blog Post successfull', 'success');
        return redirect('blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $categories = BlogCategory::all();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|min:8|max:255',
            'description' => 'required|min:100',
        ]);

        $blog->update($request->except('_token', 'image'));

        if ($request->hasFile('image')) {
            if ($blog->image) {
                unlink('nsseb_assets/media/images/blog_img/' . $blog->image);
            }
            $uploaded_photo = $request->file('image');
            $photo_name = time() . "." . $uploaded_photo->getClientOriginalExtension($uploaded_photo);
            $new_photo_location = 'nsseb_assets/media/images/blog_img/' . $photo_name;

            Image::make($uploaded_photo)->save($new_photo_location);
            $blog->update([
                'image' => $photo_name,
            ]);
        }
        Notify::success('Blog successfully updated', 'Success');
        return redirect('blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        Notify::warning('This Blog Deleted', 'Deleted');
        return back();
    }
}
