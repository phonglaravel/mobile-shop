<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use App\Models\Cate;
use App\Models\CategoryBlog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('id','DESC')->get();
        return view('admin.blog.list', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = Cate::all();
        $categories  = CategoryBlog::all();
        return view('admin.blog.create', compact('cates','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogStoreRequest $request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug_blog = Str::slug($request->title);
        $blog->content = $request->content;
        $blog->cate_id = $request->cate_id;
        $blog->date = Carbon::now('Asia/Ho_Chi_minh');
        $blog->loai = $request->loai;
        $blog->count = 0;
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
       
        $image =Str::slug($request->title).'_'.Str::random(5).'.'.$extension;
        while (file_exists("image/blog/". $image)){
            $image = Str::slug($request->title).'_'.Str::random(5).'.'.$extension;
        }
        
        $file->move('image/blog/', $image);                 
        
        $blog->image = $image;
        $blog->save();
        return redirect()->route('blog.index')->with('success','Thêm thành công');
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
    public function edit(Blog $blog)
    {
        $categories  = CategoryBlog::all();
        $cates = Cate::all();
        return view('admin.blog.edit', compact('blog','cates','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        $blog->title = $request->title;
        $blog->slug_blog = Str::slug($request->title);
        $blog->content = $request->content;
        $blog->cate_id = $request->cate_id;
        $blog->loai = $request->loai;
        $blog->save();
        return redirect()->route('blog.index')->with('success','Sửa thành công!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $image_path = 'image/blog/'.$blog->image;
        if (File::exists($image_path)) {
        File::delete($image_path);    
        }   
        $blog->delete();
        return back()->with('success', 'Xóa thành công');
    }
}
