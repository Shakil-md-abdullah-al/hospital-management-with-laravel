<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Doctor;
use Illuminate\Http\Request;
use DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = DB::table('blogs')
            ->join('categories','blogs.category','categories.id')
            ->select('blogs.*','categories.category_name')
            ->get();

        return view('admin.blog.manage-blog',[
            'blogs' => $blog
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.add-blog',
        [
            'categories'=>Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category'=> 'required',
            'title'=>'required|string|min:5|max:50',
            'image'=>'required',
            'description'=>'required|string|min:10|max:500',
            'blog_type'=>'required',
            'date'=>'required|date'
        ]);
        Blog::saveBlog($request);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.blog.edit-blog',[
            'blogs' => Blog::find($id),
            'categories'=>Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Blog::updateCBlog($request,$id);
        return redirect('blog');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);
        if($blog->image){
            if(file_exists($blog->image)){
                unlink($blog->image);
            }
        }
        $blog->delete();
        return back();
    }
}
