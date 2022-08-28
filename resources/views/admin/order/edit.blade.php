@extends('admin.layouts.master')
@section('title')
<title>Chi tiết đơn hàng</title>
@endsection
@section('content')

<form class="form-inline" action="{{route('order.update',$order->id)}}" method="POST">
  @csrf
  @method('put')
  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Tình trạng</label>
  <select name="status" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
    @if ($order->status=='Đang chờ xử lý')
    <option selected value="Đang chờ xử lý">Đang chờ xử lý</option>
    <option value="Đã xử lý">Đã xử lý</option>
    <option value="Đang giao hàng">Đang giao hàng</option>
    <option value="Hoàn thành">Hoàn thành</option>
    
    @elseif ($order->status=='Đã xử lý')
    <option value="Đang chờ xử lý">Đang chờ xử lý</option>
    <option selected value="Đã xử lý">Đã xử lý</option>
    <option value="Đang giao hàng">Đang giao hàng</option>
    <option value="Hoàn thành">Hoàn thành</option>

    @elseif ($order->status=='Đang giao hàng')
    <option value="Đang chờ xử lý">Đang chờ xử lý</option>
    <option value="Đã xử lý">Đã xử lý</option>
    <option selected value="Đang giao hàng">Đang giao hàng</option>
    <option value="Hoàn thành">Hoàn thành</option>

    @elseif ($order->status=='Hoàn thành')
    <option value="Đang chờ xử lý">Đang chờ xử lý</option>
    <option value="Đã xử lý">Đã xử lý</option>
    <option value="Đang giao hàng">Đang giao hàng</option>
    <option selected value="Hoàn thành">Hoàn thành</option>
    @endif
    
  </select>

  

  <button type="submit" class="btn btn-primary my-1">Lưu</button>
</form>
<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      
      <th scope="col">Tên</th>
      <th scope="col">Nick</th>
      <th scope="col">Email</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Địa chỉ 1</th>
      <th scope="col">Địa chỉ 2</th>
      <th scope="col">Huyện</th>
      <th scope="col">Tỉnh</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="col">{{$order->name}}</th>
      <th scope="col">{{$order->nickname}}</th>
      <th scope="col">{{$order->email}}</th>
      <th scope="col">{{$order->phone}}</th>
      <th scope="col">{{$order->address1}}</th>
      <th scope="col">{{$order->address2}}</th>
      <th scope="col">{{$order->huyen}}</th>
      <th scope="col">{{$order->tinh}}</th>
    </tr>
  </tbody>
</table>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Dung lượng</th>
      <th scope="col">Màu</th>
      <th scope="col">Giá</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Tổng</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($order->order_details as $key => $item)
    <tr>
      <th scope="col">{{$key+1}}</th>
      <th scope="col">{{$item->product_name}}</th>
      <th scope="col">{{$item->dungluong}}</th>
      <th scope="col">{{$item->color}}</th>
      <th scope="col">{{number_format($item->price,0,',','.')}} đ</th>
      <th scope="col">{{$item->qty}}</th>
      <th scope="col">{{number_format($item->price*$item->qty,0,',','.')}} đ</th>
    </tr>
    @endforeach
    
   
  </tbody>
</table>
<h4>Tổng: {{number_format($order->total,0,',','.')}} đ</h4>
@endsection