@extends('admin.layouts.master')
@section('title')
<title>Sản phẩm</title>
@endsection
@section('content')

<div class="mr-1">
    <div style="position: relative">
        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
        @endif
        <a href="{{route('product.create')}}" class="btn btn-primary">Thêm sản phẩm</a>
        <h2 style="text-align: center">Danh sách sản phẩm</h2>
    </div>
    
    <table class="table" id="myTable1">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tên</th>
            <th scope="col">Danh mục</th>
            <th scope="col">Danh mục con</th>
            <th scope="col">Dung lượng</th>
            <th scope="col">Giá</th>
            <th scope="col">Hành động</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $key=> $item)
          <tr>
            <th scope="col">{{$key+1}}</th>
            <th scope="col">{{$item->title}}</th>
            <th scope="col">{{$item->category->title}}</th>
            <th scope="col">
             @foreach ($item->cate as $i)
                 
             <span style="background-color: blue; color:aliceblue; padding:0 5px; border-radius: 5px">{{$i->title}}</span>
             @endforeach
            </th>
            <th scope="col">
              @foreach ($item->product_dungluong as $i)
                 
             <span style="background-color: blue; color:aliceblue; padding:0 5px; border-radius: 5px">{{$i->dungluong}}</span>
             @endforeach
            </th>
            <th scope="col">
              @foreach ($item->product_color_price as $i)
                 
             <span style="background-color: blue; color:aliceblue; padding:0 5px; border-radius: 5px">{{$i->color}}-{{$i->price}}</span>
             @endforeach
            </th>
            <th scope="col">
              <input type="hidden" id="count_product" value="{{$products->count()}}">
              <a href="{{route('product.edit',$item->id)}}" class="btn btn-success">Sửa</a>
              <p   class="btn btn-primary" data-toggle="modal" data-target="#aaa" id="{{$key}}" data-id="{{$item->id}}">
                Xóa
              </p>
             
              
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