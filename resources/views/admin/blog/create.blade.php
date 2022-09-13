@extends('admin.layouts.master')
@section('title')
<title>Thêm bài viết</title>
@endsection
@section('content')

<div class="mr-1" style="width: 800px; margin: 0 auto;">
    <h2 style="text-align: center; margin-bottom:20px">Tạo Bài viết</h2>
    <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Tên</label>
          <div class="col-sm-10">
            <input  name="title" type="text" class="form-control" placeholder="Tên">
            @error('title')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Nội dung</label>
          <div class="col-sm-10">
            <textarea id="editor1" name="content" type="text" class="form-control" placeholder="Tên"></textarea>
            @error('content')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Ảnh</label>
          <div class="col-sm-10">
          <input type="file" name="image" id="" class="form-control" accept="image/*" >
          @error('image')
          <span style="color: red">{{ $message }}</span>
          @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="disabledSelect">Danh mục con</label>
          <select name="cate_id" class="form-control">
            <option value="">-Chọn-</option>
            @foreach ($cates as $item)
            <option value="{{$item->id}}">{{$item->title}}</option>
            @endforeach
          </select>
          @error('cate_id')
          <span style="color: red">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="disabledSelect">Loại blog</label>
          <select name="loai" class="form-control">
            <option value="">-Chọn-</option>
            @foreach ($categories as $item)
            <option value="{{$item->id}}">{{$item->title}}</option>
            @endforeach           
          </select>
          @error('loai')
          <span style="color: red">{{ $message }}</span>
          @enderror
        </div>
        <button style="margin: 20px auto" type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{route('product.index')}}" class="btn btn-success">Quay lại</a>

    </form>
</div>
@endsection
@push('scripts')

<script>
 
  CKEDITOR.replace( 'editor1' );
  
</script>
@endpush