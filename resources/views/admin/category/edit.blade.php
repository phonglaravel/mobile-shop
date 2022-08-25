@extends('admin.layouts.master')
@section('title')
<title>Category - Edit</title>
@endsection
@section('content')

<div class="mr-1" style="width: 500px; margin: 0 auto;">
    <h2 style="text-align: center; margin-bottom:20px">Sửa Danh Mục</h2>
    <form action="{{route('category.update',$category->id)}}" method="POST">
      @csrf
      @method('put')
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Tên</label>
          <div class="col-sm-10">
            <input value="{{$category->title}}" name="title" type="text" class="form-control" placeholder="Tên">
            @error('title')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Mô tả</label>
          <div class="col-sm-10">
            <textarea name="description" type="text" class="form-control" placeholder="Tên">{{$category->description}}</textarea>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Trạng thái</label>
          <div class="col-sm-10">
            <select name="status" class="form-control">
                @if ($category->status==1)
                <option selected value="1">Hiện</option>
                <option value="0">Ẩn</option>
                @else
                <option  value="1">Hiện</option>
                <option selected value="0">Ẩn</option>
                @endif
              
            </select>
          </div>
        </div>
        <button style="margin: 20px auto" type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{route('category.index')}}" class="btn btn-success">Quay lại</a>
    </form>
</div>
@endsection