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
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by price</span></h5>
            <div class="bg-light p-4 mb-30">
                @if (Request::is('danh-muc/dien-thoai/filter'))
                    @include('page.filter.dienthoai')
                @elseif (Request::is('danh-muc/laptop/filter'))
                    @include('page.filter.maytinh')
                @elseif (Request::is('danh-muc/may-tinh-bang/filter'))
                    @include('page.filter.maytinhbang')
                @elseif (Request::is('danh-muc/am-thanh/filter'))
                    @include('page.filter.amthanh')
                @elseif (Request::is('danh-muc/phu kien/filter'))
                    @include('page.filter.phukien')
                @elseif (Request::is('danh-muc/smart-watch/filter'))
                    @include('page.filter.smartwatch')
                @endif
            </div>
            <!-- Price End -->
        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                            <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                        </div>
                        <div class="ml-2">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div>
                            <div class="btn-group ml-2">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Showing</button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">10</a>
                                    <a class="dropdown-item" href="#">20</a>
                                    <a class="dropdown-item" href="#">30</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($products as $item)
                <div  class="col-lg-4 col-md-6 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('/image/products/'.$item->image)}}" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                           @foreach ($item->product_dungluong as $key=> $i)
                               @if ($key==0)
                               <a class="h6 text-decoration-none " href="{{route('page.product',[$category->slug_category,$item->slug_product,$i->slug_dungluong])}}">{{$item->title}}</a>
                               @endif
                           @endforeach
                            
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>{{number_format($item->price,0,',','.')}}</h5><h6 class="text-muted ml-2"><del>{{number_format($item->price,0,',','.')}}</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                
                                <small>Đã mua: {{$item->order_product()}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
                
                <div class="col-12">
                    <nav>
                      <ul class="pagination justify-content-center">
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</span></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                      </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->
@endsection