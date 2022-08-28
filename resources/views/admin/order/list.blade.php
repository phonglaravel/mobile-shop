@extends('admin.layouts.master')
@section('title')
<title>Đơn hàng</title>
@endsection
@section('content')

<div class="mr-1">
    <div style="position: relative">
        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
        @endif
        
        <h2 style="text-align: center">Danh sách đơn hàng</h2>
    </div>
    
    <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tên</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Huyện</th>
            <th scope="col">Tỉnh</th>           
            <th scope="col">Tình trạng</th>
            <th scope="col">Giá</th>
            <th scope="col">Thanh toán</th>
            <th scope="col">Sửa</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($orders as $key=> $item)
          <tr>
            <th scope="col">{{$key+1}}</th>
            <th scope="col">{{$item->name}}</th>
            <th scope="col">{{$item->phone}}</th>
            <th scope="col">{{$item->address1}}</th>
            <th scope="col">{{$item->huyen}}</th>
            <th scope="col">{{$item->tinh}}</th>           
            <th scope="col">{{$item->status}}</th>
            <th scope="col">{{number_format($item->total,0,',','.')}}</th>
            <th scope="col">{{$item->payment}}</th>
            <th scope="col">
              <a href="{{route('order.edit',$item->id)}}" class="btn btn-success">Sửa</a>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$item->id}}">
                Xóa
              </button>
            </th>
          </tr> 
          <form action="{{route('order.destroy',$item->id)}}" method="POST" style="display: inline">
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