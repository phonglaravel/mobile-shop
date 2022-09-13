@extends('admin.layouts.master')
@section('title')
<title>Sửa bài viết</title>
@endsection
@section('content')

<div class="mr-1" style="width: 800px; margin: 0 auto;">
    <h2 style="text-align: center; margin-bottom:20px">Tạo Bài viết</h2>
    <form action="{{route('blog.update',$blog->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('put')
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Tên</label>
          <div class="col-sm-10">
            <input value="{{$blog->title}}" name="title" type="text" class="form-control" placeholder="Tên">
            @error('title')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Nội dung</label>
          <div class="col-sm-10">
            <textarea id="editor1" name="content" type="text" class="form-control" placeholder="Tên">{{$blog->content}}</textarea>
            @error('content')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Ảnh</label>
          <div class="col-sm-10">
          <input type="file" name="image" id="" class="form-control" accept="image/*" >
          <img src="{{asset('image/blog/'.$blog->image)}}" alt="">
          </div>
        </div>
        <div class="form-group">
          <label for="disabledSelect">Danh mục con</label>
          <select name="cate_id" class="form-control">
            
            <option  @if ($blog->cate_id==null)
                selected
            @endif value="">-Chọn-</option>
            @foreach ($cates as $item)
            <option @if ($blog->cate_id==$item->id)
                selected
            @endif value="{{$item->id}}">{{$item->title}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="disabledSelect">Loại blog</label>
          <select name="loai" class="form-control">
            @foreach ($categories as $item)
            <option @if ($blog->loai == $item->id)
              selected
              @endif value="{{$item->id}}">{{$item->title}}</option>
            @endforeach
            

           
          </select>
         
        </div>
        <button style="margin: 20px auto" type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{route('blog.index')}}" class="btn btn-success">Quay lại</a>

    </form>
</div>
@endsection
@push('scripts')

<script>
 
  CKEDITOR.replace( 'editor1' );
  
</script>
@endpush