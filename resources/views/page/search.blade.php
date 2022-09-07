@extends('page.layouts.master')
@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="/">Trang chủ</a>
                
                <span class="breadcrumb-item active">{{$keyword}}</span>
            </nav>
        </div>
    </div>
</div>


<!-- Shop Start -->
<div class="container-fluid">
    <div class="px-xl-5">
      


        <!-- Shop Product Start -->
        <div class="">
            <div class="row pb-3">
                
                @foreach ($products as $item)
                <div  class="col-lg-3 col-md-6 col-sm-6 pb-1">
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
                            @if ($item->product_dungluong->count()==0)
                            <a class="h6 text-decoration-none " href="{{route('page.product1',[$item->category->slug_category,$item->slug_product])}}">{{$item->title}}</a> 
                            @else 
                            @foreach ($item->product_dungluong as $key=> $i)
                            @if ($key==0)
                            <a class="h6 text-decoration-none " href="{{route('page.product',[$item->category->slug_category,$item->slug_product,$i->slug_dungluong])}}">{{$item->title}}</a>
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