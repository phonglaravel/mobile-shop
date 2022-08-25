@extends('page.layouts.master')
@section('content')
   <!-- Breadcrumb Start -->
   <div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Checkout</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Checkout Start -->
@if (session('success'))
    <div class="alert alert-success text-center" role="alert">
        {{ session('success') }}
    </div>
@endif
<form action="{{route('send_checkout')}}" method="POST">
    @csrf
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Họ tên</label>
                            <input name="name" class="form-control" type="text" >
                            @error('name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Biệt danh</label>
                            <input name="nickname" class="form-control" type="text" >
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input name="email" class="form-control" type="text" >
                            @error('email')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số điện thoại</label>
                            <input name="phone" class="form-control" type="text" >
                            @error('phone')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ 1</label>
                            <input name="address1" class="form-control" type="text" >
                            @error('address1')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ 2</label>
                            <input name="address2" class="form-control" type="text" >
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Tỉnh/Thành phố</label>
                            <select class="custom-select" name="calc_shipping_provinces" required="">
                                <option value="">Tỉnh/Thành Phố</option>
                                
                            </select>
                            @error('tinh')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Quận/Huyện</label>
                            <select class="custom-select" name="calc_shipping_district" required="">
                                <option value="">Quận/Huyện</option>
                            </select>
                            @error('huyen')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <input class="billing_address_1" name="tinh" type="hidden" value="">
                            <input class="billing_address_2" name="huyen" type="hidden" value="">
                            
                        </div>
                        
                        
                    </div>
                </div>
               
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Sản phẩm</h6>
                        @foreach (Cart::content() as $item)
                        <div class="d-flex justify-content-between">
                            <p>{{$item->name}}</p>
                            <p>{{number_format($item->price*$item->qty,0,',','.')}}</p>
                        </div>
                        @endforeach
                        
                        
                    </div>
                    @if (Session::has('coupon'))
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Tổng</h6>
                            <h6>{{Cart::subTotal(0,',','.')}} đ</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Giảm giá</h6>
                            <h6 class="font-weight-medium">- {{number_format(Session::get('coupon')->price,0,',','.')}} đ</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Thành tiền</h5>
                            <h5>{{number_format(Cart::subTotal(0,',','') - Session::get('coupon')->price,0,',','.')}} đ</h5>
                        </div>
                    </div>
                    @else 
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Thành tiền</h5>
                            <h5>{{Cart::subTotal(0,',','.')}} đ</h5>
                        </div>
                    </div>
                    @endif
                    
                    
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input value="Tiền mặt" type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Tiền mặt</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input value="Chuyển khoản" type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Chuyển khoản</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input value="Thẻ ghi nợ" type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Thẻ ghi nợ</label>
                            </div>
                        </div>
                        @error('payment')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Checkout End -->  
@endsection
@push('scripts')
<script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>
     <script>
    if (address_2 = localStorage.getItem('address_2_saved')) {
      $('select[name="calc_shipping_district"] option').each(function() {
        if ($(this).text() == address_2) {
          $(this).attr('selected', '')
        }
      })
      $('input.billing_address_2').attr('value', address_2)
    }
    if (district = localStorage.getItem('district')) {
      $('select[name="calc_shipping_district"]').html(district)
      $('select[name="calc_shipping_district"]').on('change', function() {
        var target = $(this).children('option:selected')
        target.attr('selected', '')
        $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
        address_2 = target.text()
        $('input.billing_address_2').attr('value', address_2)
        district = $('select[name="calc_shipping_district"]').html()
        localStorage.setItem('district', district)
        localStorage.setItem('address_2_saved', address_2)
      })
    }
    $('select[name="calc_shipping_provinces"]').each(function() {
      var $this = $(this),
        stc = ''
      c.forEach(function(i, e) {
        e += +1
        stc += '<option value=' + e + '>' + i + '</option>'
        $this.html('<option value="">Tỉnh / Thành phố</option>' + stc)
        if (address_1 = localStorage.getItem('address_1_saved')) {
          $('select[name="calc_shipping_provinces"] option').each(function() {
            if ($(this).text() == address_1) {
              $(this).attr('selected', '')
            }
          })
          $('input.billing_address_1').attr('value', address_1)
        }
        $this.on('change', function(i) {
          i = $this.children('option:selected').index() - 1
          var str = '',
            r = $this.val()
          if (r != '') {
            arr[i].forEach(function(el) {
              str += '<option value="' + el + '">' + el + '</option>'
              $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>' + str)
            })
            var address_1 = $this.children('option:selected').text()
            var district = $('select[name="calc_shipping_district"]').html()
            localStorage.setItem('address_1_saved', address_1)
            localStorage.setItem('district', district)
            $('select[name="calc_shipping_district"]').on('change', function() {
              var target = $(this).children('option:selected')
              target.attr('selected', '')
              $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
              var address_2 = target.text()
              $('input.billing_address_2').attr('value', address_2)
              district = $('select[name="calc_shipping_district"]').html()
              localStorage.setItem('district', district)
              localStorage.setItem('address_2_saved', address_2)
            })
          } else {
            $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>')
            district = $('select[name="calc_shipping_district"]').html()
            localStorage.setItem('district', district)
            localStorage.removeItem('address_1_saved', address_1)
          }
        })
      })
    })
     </script>
    
@endpush