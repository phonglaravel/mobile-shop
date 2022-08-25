<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCateRequest;
use App\Http\Requests\UpdateCateRequest;
use App\Models\Cate;
use App\Models\Order;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $cates = Cate::all();
        return view('admin.cate.list', compact('cates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categories = Category::all();
        return view('admin.cate.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCateRequest $request)
    {
        $cate = new Cate();
        $cate->title = $request->title;
        $cate->slug_cate = Str::slug($request->title);
        $cate->category_id = $request->category_id;
        $cate->description = $request->description;
        $cate->status = $request->status;
        $cate->save();
        return redirect()->route('cate.index')->with('success','Thêm thành công');
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
    public function edit(Cate $cate)
    {
        $cate = Cate::find($cate->id);
        $categories = Category::all();
        return view('admin.cate.edit', compact('cate','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCateRequest $request, Cate $cate)
    {
        $cate = Cate::find($cate->id);
        $cate->title = $request->title;
        $cate->slug_cate = Str::slug($request->title);
        $cate->category_id = $request->category_id;
        $cate->description = $request->description;
        $cate->status = $request->status;
        $cate->save();
        return redirect()->route('cate.index')->with('success','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cate $cate)
    {
        $cate = Cate::find($cate->id);
        $cate->delete();
        return back()->with('success','Xóa thành công');
    }
}
