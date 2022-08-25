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
            </th>
          </tr> 
          @endforeach
        </tbody>
      </table>
</div>
@endsection