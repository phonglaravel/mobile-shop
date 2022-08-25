@extends('admin.layouts.master')
@section('title')
<title>Mã giảm giá</title>
@endsection
@section('content')

<div class="mr-1">
    <div style="position: relative">
        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
        @endif
        <a href="{{route('coupon.create')}}" class="btn btn-primary">Thêm mã</a>
        <h2 style="text-align: center">Danh sách mã giảm giá</h2>
    </div>
    
    <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Mã</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Số tiền giảm</th>
            <th scope="col">Điều kiện giảm</th>
            <th scope="col">Ngày bắt đầu</th>
            <th scope="col">Ngày kết thúc</th>
            <th scope="col">Hiện/Ẩn</th>
            <th scope="col">Hành động</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($coupons as $key=> $item)
          <tr>
            <th scope="col">{{$key+1}}</th>
            <th scope="col">{{$item->title}}</th>
            <th scope="col">{{$item->amount}}</th>
            <th scope="col">{{number_format($item->price,0,',','.')}}</th>
            <th scope="col">{{number_format($item->condition,0,',','.')}}</th>
            <th scope="col">{{$item->day_start}}</th>
            <th scope="col">{{$item->day_end}}</th>
            <th scope="col">
              @if ($item->status==1)
                  Hiện
              @else
                Ẩn
              @endif
            </th>
            <th scope="col">
              <a href="{{route('coupon.edit',$item->id)}}" class="btn btn-success">Sửa</a>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$item->id}}">
                Xóa
              </button>
              
              
            </th>
          </tr> 
          <!-- Modal -->
          <form action="{{route('coupon.destroy',$item->id)}}" method="POST" style="display: inline">
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