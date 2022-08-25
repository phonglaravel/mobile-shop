@extends('admin.layouts.master')
@section('title')
<title>Mã giảm giá</title>
@endsection
@section('content')

<div class="mr-1" style="width: 500px; margin: 0 auto;">
    <h2 style="text-align: center; margin-bottom:20px">Sửa mã giảm giá</h2>
    <form action="{{route('coupon.update',$coupon->id)}}" method="POST">
      @csrf
      @method('put')
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Mã</label>
          <div class="col-sm-10">
            <input value="{{$coupon->title}}" name="title" type="text" class="form-control" placeholder="Mã">
            @error('title')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Số lượng</label>
          <div class="col-sm-10">
            <input value="{{$coupon->amount}}" name="amount" type="text" class="form-control" placeholder="Mã">
            @error('amount')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Số tiền giảm (đ)</label>
          <div class="col-sm-10">
            <input value="{{$coupon->price}}" name="price" type="text" class="form-control" placeholder="Mã">
            @error('price')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Điều kiện giảm</label>
          <div class="col-sm-10">
            <input value="{{$coupon->condition}}" name="condition" type="text" class="form-control" placeholder="Mã" value="0">
            @error('condition')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Ngày bắt đầu (dd/mm/yyyy)</label>
          <div class="col-sm-10">
            <input value="{{$coupon->day_start}}" name="day_start" type="text" class="form-control" placeholder="Mã" >
            @error('day_start')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Ngày kết thúc (dd/mm/yyyy)</label>
          <div class="col-sm-10">
            <input value="{{$coupon->day_end}}" name="day_end" type="text" class="form-control" placeholder="Mã" >
            @error('day_end')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Trạng thái</label>
          <div class="col-sm-10">
            <select name="status" class="form-control">
              @if ($coupon->status==1)
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
        <a href="{{route('coupon.index')}}" class="btn btn-success">Quay lại</a>
    </form>
</div>
@endsection