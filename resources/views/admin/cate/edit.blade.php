@extends('admin.layouts.master')
@section('title')
<title>Cate - Edit</title>
@endsection
@section('content')

<div class="mr-1" style="width: 500px; margin: 0 auto;">
    <h2 style="text-align: center; margin-bottom:20px">Tạo Danh Mục Con</h2>
    <form action="{{route('cate.update',$cate->id)}}" method="POST">
      @csrf
      @method('put')
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Tên</label>
          <div class="col-sm-10">
            <input value="{{$cate->title}}" name="title" type="text" class="form-control" placeholder="Tên">
            @error('title')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Danh mục cha</label>
          <div class="col-sm-10">
            <select name="category_id" class="form-control">
              
              @foreach ($categories as $item)
              <option @if ($item->id==$cate->id)
                  selected
              @endif value="{{$item->id}}">{{$item->title}}</option>
              @endforeach
              
            </select>
            @error('category_id')
            <span style="color: red">{{ $message }}</span>
          @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Mô tả</label>
          <div class="col-sm-10">
            <textarea name="description" type="text" class="form-control" placeholder="Tên"></textarea>
            @error('description')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Trạng thái</label>
          <div class="col-sm-10">
            <select name="status" class="form-control">
              <option selected value="1">Hiện</option>
              <option value="0">Ẩn</option>
            </select>
          </div>
        </div>
        <button style="margin: 20px auto" type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{route('cate.index')}}" class="btn btn-success">Quay lại</a>
    </form>
</div>
@endsection