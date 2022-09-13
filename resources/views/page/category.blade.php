@extends('page.layouts.master')
@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="/">Trang chủ</a>
                
                <span class="breadcrumb-item active">{{$category->title}}</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                @foreach ($category->cate as $item)
                <a style="margin-right: 30px" class=" text-dark" href="{{route('page.cate',[$category->slug_category,$item->slug_cate])}}">{{$item->title}}</a>
                @endforeach
                
                
                
            </nav>
        </div>
    </div>
</div>

<!-- Shop Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-4">
            <!-- Price Start -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Lọc sản phẩm</span></h5>
            <div class="bg-light p-4 mb-30">
                @if (Request::is('danh-muc/dien-thoai'))
                    @include('page.filter.dienthoai')
                @elseif (Request::is('danh-muc/laptop'))
                    @include('page.filter.maytinh')
                @elseif (Request::is('danh-muc/may-tinh-bang'))
                    @include('page.filter.maytinhbang')
                @elseif (Request::is('danh-muc/am-thanh'))
                    @include('page.filter.amthanh')
                @elseif (Request::is('danh-muc/phu kien'))
                    @include('page.filter.phukien')
                @elseif (Request::is('danh-muc/smart-watch'))
                    @include('page.filter.smartwatch')
                @endif
            </div>
            <!-- Price End -->
        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
              
                @foreach ($products as $item)
                <input type="hidden" id="title{{$item->id}}" value="{{ $item->title }}">
                <input type="hidden" id="image{{$item->id}}" value="{{$item->image}}">
                <input type="hidden" id="category{{$item->id}}" value="{{$item->category->title}}">
                <div  class="col-lg-4 col-md-6 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('/image/products/'.$item->image)}}" alt="">
                            @if ($category->id==1||$category->id==3||$category->id==4)
                            <div class="product-action">  
                                <a class="btn btn-outline-dark btn-square" onclick="add({{$item->id}})"><i class="fa fa-sync-alt"></i></a>
                            </div> 
                            @endif
                            
                            
                            
                        </div>
                        <!-- Button trigger modal -->
                       
                        
                        
                  
                        <div class="text-center py-4">
                            @if ($item->product_dungluong->count()==0)
                            <a class="h6 text-decoration-none " href="{{route('page.product1',[$category->slug_category,$item->slug_product])}}">{{$item->title}}</a> 
                            @else 
                            @foreach ($item->product_dungluong as $key=> $i)
                            @if ($key==0)
                            <a class="h6 text-decoration-none " href="{{route('page.product',[$category->slug_category,$item->slug_product,$i->slug_dungluong])}}">{{$item->title}}</a>
                            @endif
                            @endforeach
                            @endif
                                                    
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                @if ($item->sale==0||$item->sale==null||$item->day_start>$to_day||$item->day_end<$to_day||$item->amount_sale==0)
                            <h5>{{number_format($item->price,0,',','.')}} đ</h5>
                            @else 
                            <h5>{{number_format($item->price*(100-$item->sale)/100,0,',','.')}} đ</h5><h6 class="text-muted ml-2"><del>{{number_format($item->price,0,',','.')}} đ</del></h6>
                            @endif
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                
                                <small>Đã mua: {{$item->order_count}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
                
               
            </div>
        </div>
        <!-- Shop Product End -->
        
    </div>
</div>
<!-- Shop End -->
@if ($category->id==1 || $category->id==3 || $category->id==4)
@include('page.layouts.mini_compare')    
@endif

@endsection
