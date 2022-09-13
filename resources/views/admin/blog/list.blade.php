@extends('admin.layouts.master')
@section('title')
<title>Bài viết</title>
@endsection
@section('content')

<div class="mr-1">
    <div style="position: relative">
        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
        @endif
        <a href="{{route('blog.create')}}" class="btn btn-primary">Thêm bài viết</a>
        <h2 style="text-align: center">Danh sách Bài viết</h2>
    </div>
    
    <table class="table" >
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tên</th>
            <th scope="col">Ngày đăng</th>
            <th scope="col">Danh mục con</th>
            <th scope="col">Loại</th>
            <th scope="col">Hành động</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($blogs as $key=> $item)
          <tr>
            <th scope="col">{{$key+1}}</th>
            <th scope="col">{{$item->title}}</th>
            <th scope="col">{{$item->date}}</th>
            <th scope="col">
              @if ($item->cate_id!=null)
              {{$item->cate->title}}
              
              @endif
            </th>
            <th scope="col">{{$item->category_blog->title}}</th>
            <th scope="col">
              <a href="{{route('blog.edit',$item->id)}}" class="btn btn-success">Sửa</a>
              <form action="{{route('blog.destroy',$item->id)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-success">Xóa</button>
              </form>
                  
            </th>
          </tr>         
          @endforeach
        </tbody>
      </table>
      <!-- Modal -->
      <form method="POST" style="display: inline" id="deleteForm">
        @csrf
        @method('delete')
        <div class="modal fade" id="aaa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div>
@push('scripts')
    <script>
      $(document).ready(function(){
        let count = $('#count_product').val()
        for( let i=0;i<count;i++){
          $('#'+i).click(function(){
       
        $('#deleteForm').attr('action','product/'+$('#'+i).data('id'));
      })
        }
      })
      
    </script>
@endpush
@endsection