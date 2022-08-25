@extends('page.layouts.master')
@section('content')

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Trang chủ</a>
                    
                    <span class="breadcrumb-item active">Giỏ hàng</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach (Cart::content() as $item)
                        <tr>
                            <td class="align-middle"><img src="{{asset('image/products/'.$item->options->image)}}" alt="" style="width: 50px;"> {{$item->name}}</td>
                            <td class="align-middle">{{number_format($item->price,0,',','.')}}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <a @if ($item->qty==1)
                                            style="pointer-events: none;"
                                        @endif  class="btn btn-sm btn-primary btn-minus" href="{{route('qty_down',[$item->rowId,$item->qty])}}">
                                        <i class="fa fa-minus"></i>
                                        </a>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="{{$item->qty}}">
                                    <div class="input-group-btn">
                                        <a class="btn btn-sm btn-primary btn-plus" href="{{route('qty_up',[$item->rowId,$item->qty])}}">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">{{number_format($item->price * $item->qty,0,',','.')}}</td>
                            <td class="align-middle"><a href="{{route('delete_cart',$item->rowId)}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
                        </tr>
                        @endforeach
                        
                       
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="{{route('check_coupon')}}" method="POST">
                    @csrf
                    <div class="input-group">
                        @if(Session::has('coupon'))
                        <input disabled value="{{Session::get('coupon')->title}}"  type="text" class="form-control border-0 p-4" placeholder="Mã giảm giá">
                        @else 
                        <input name="title" type="text" class="form-control border-0 p-4" placeholder="Mã giảm giá">
                        @endif
                        
                        <div class="input-group-append">
                            @if(Session::has('coupon'))
                            <a href="{{route('delete_coupon')}}" class="btn btn-primary">Xóa mã</a>
                            @else 
                            <button type="submit" class="btn btn-primary">Xác nhận mã</button>
                            @endif
                            
                        </div>
                    </div>
                </form>
                @if (session('error_coupon'))
                            <div class="alert alert-success" role="alert">
                                {{ session('error_coupon') }}
                            </div>
                @endif
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Tổng tiền thanh toán</span></h5>
                <div class="bg-light p-30 mb-5">
                    
                    <div class="pt-2">
                        @if (Session::has('coupon'))
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Tổng</h5>
                            <h5>{{Cart::subTotal(0,',','.')}} đ</h5>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Mã giảm</h5>
                            <h5>- {{number_format(Session::get('coupon')->price,0,',','.')}} đ</h5>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Thành tiền</h5>
                            <h5>{{number_format(Cart::subTotal(0,',','') - Session::get('coupon')->price,0,',','.')}} đ</h5>
                        </div>
                        @else 
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Tổng</h5>
                            <h5>{{Cart::subTotal(0,',','.')}} đ</h5>
                        </div>
                        @endif
                        
                        <a href="{{route('page.checkout')}}" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection