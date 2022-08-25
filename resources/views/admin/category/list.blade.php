@extends('admin.layouts.master')
@section('title')
<title>Category</title>
@endsection
@section('content')

<div class="mr-1">
    <div style="position: relative">
        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
        @endif
        <a href="{{route('category.create')}}" class="btn btn-primary">Thêm danh mục</a>
        <h2 style="text-align: center">Danh sách danh mục</h2>
    </div>
    
    <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tên</th>
            <th scope="col">Slug</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Hành động</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $key=> $item)
          <tr>
            <th scope="col">{{$key+1}}</th>
            <th scope="col">{{$item->title}}</th>
            <th scope="col">{{$item->slug_category}}</th>
            <th scope="col">
              @if ($item->status==1)
                  Hiện
              @else
                Ẩn
              @endif
            </th>
            <th scope="col">
              <a href="{{route('category.edit',$item->id)}}" class="btn btn-success">Sửa</a>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$item->id}}">
                Xóa
              </button>
              
            </th>
          </tr> 
          <!-- Modal -->
          <form action="{{route('category.destroy',$item->id)}}" method="POST" style="display: inline">
            @csrf
            @method('delete')
            <div class="modal fade" id="{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cảnh báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Bạn có muốn xóa không?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                    <button type="submit" class="btn btn-primary">Xóa</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
          @endforeach
        </tbody>
      </table>
</div>
@endsection