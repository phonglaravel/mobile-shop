@extends('page.layouts.master')
@section('content')
       <!-- Carousel Start -->
       <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($banner as $k => $item)
                        <div @if ($k==0)
                        class="carousel-item position-relative active"
                        @else 
                        class="carousel-item position-relative"
                        @endif style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="{{asset('image/products/banner/'.$item->banner)}}" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">{{$item->category->title}}</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">{{$item->title}}</p>
                                    @if ($item->product_dungluong->count()==0)
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="{{route('page.product1',[$item->category->slug_category,$item->slug_product])}}">Xem ngay</a>
                           
                                    @else 
                                    @foreach ($item->product_dungluong as $k=> $i)
                                    @if ($k==0)
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="{{route('page.product',[$item->category->slug_category,$item->slug_product,$i->slug_dungluong])}}">Xem ngay</a>
                                    @endif
                                    @endforeach
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="/page/img-fluid" src="/page/img/offer-1.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="/page/img-fluid" src="/page/img/offer-2.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->
    <div class="container-fluid">
        <div class="mhn-slide owl-carousel">
            @foreach ($sale as $key => $item)
            <div class="mhn-item">
                <div class="mhn-inner">
                    <img style="position: relative" src="{{asset('image/products/'.$item->image)}}">
                    <div id="clockdiv" style="position: absolute; top:10px;right:10px">
                        <div>
                            <span class="days" style="text-align: left;">{{$item->sale}} %</span>                          
                          </div>
                        <div>
                          <span class="days" id="day{{$key}}" ></span>                       
                        </div>
                        <div>
                          <span class="hours" id="hour{{$key}}"></span>                        
                        </div>
                        <div>
                          <span class="minutes" id="minute{{$key}}" ></span>                        
                        </div>
                        <div>
                          <span class="seconds" id="second{{$key}}"></span>                         
                        </div>
                      </div>
                    <div class="mhn-text">
                        <div class="text-truncate mt-2">
                        @if ($item->product_dungluong->count()==0)
                        <a class="h6 text-decoration-none text-truncate text-nowrap" href="{{route('page.product1',[$item->category->slug_category,$item->slug_product])}}">{{$item->title}}</a> 
                        @else 
                        @foreach ($item->product_dungluong as $k=> $it)
                        @if ($k==0)
                        <a class="h6 text-decoration-none text-truncate text-nowrap" href="{{route('page.product',[$item->category->slug_category,$item->slug_product,$it->slug_dungluong])}}">{{$item->title}}</a>
                        @endif
                        @endforeach
                        @endif
                        </div>
                        <input type="hidden" class="form-group" id="input-{{$key}}" value="{{$item->day_end}}">
                        <span>{{number_format($item->price*(100-$item->sale)/100,0,',','.')}} đ</span>
                        <span style="text-decoration-line:line-through" class=" ml-2" >{{number_format($item->price,0,',','.')}} đ</span>
                        <p style="padding: 10px;background-color: chartreuse; border-radius: 5px">Còn lại: {{$item->amount_sale}}</p>
                    </div>
                </div>
            </div>
            
           
            @endforeach
           
        </div>
    </div>
    @for ($i = 0; $i < $sale->count(); $i++)
    <script >
       
        // var endDate0 = "dec 30, 2022 00:00:00";
        setInterval(function () {
       const day_end = document.getElementById("input-"+{{$i}}).value; 
      
       
        document.getElementById("day"+{{$i}}).innerHTML = Math.floor((new Date(day_end+" 23:59:00").getTime() - new Date().getTime()) / (1000 * 60 * 60 * 24)) + ' ngày';
        document.getElementById("hour"+{{$i}}).innerHTML =Math.floor(((new Date(day_end+" 23:59:00").getTime() - new Date().getTime()) % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))+ ' giờ';
        document.getElementById("minute"+{{$i}}).innerHTML = Math.floor(((new Date(day_end+" 23:59:00").getTime() - new Date().getTime()) % (1000 * 60 * 60)) / (1000 * 60))+ ' phút';
        document.getElementById("second"+{{$i}}).innerHTML = Math.floor(((new Date(day_end+" 23:59:00").getTime() - new Date().getTime())% (1000 * 60)) / 1000)+ ' giây';
        

       
        }, 1000);    
    </script>
    @endfor
  
         
    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <div style="display: flex">
            <h2 class=" position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">{{$category_skip_0->title}} đáng mua nhất</span></h2>
            <div style="display: flex; justify-content: flex-end;flex-grow: 1;" class="hover">
            @foreach ($category_skip_0->cate as $item)           
                <a class="text-decoration-none ml-3  hover" href="{{route('page.cate',[$category_skip_0->slug_category,$item->slug_cate])}}">{{$item->title}}</a>
            @endforeach
            <a class="text-decoration-none ml-3  hover" href="{{route('page.category',$category_skip_0->slug_category)}}">Xem tất cả ({{$category_skip_0->products()->count()}})</a>
            </div>
        </div>
        
        <div class="row px-xl-5">
            @foreach ($product_skip_0 as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="/page/img-fluid w-100" src="{{asset('image/products/'.$item->image)}}" alt="">
                        
                    </div>
                    <div class="text-center py-4 text-truncate">
                        @if ($item->product_dungluong->count()==0)
                        <a class="h6 text-decoration-none text-truncate" href="{{route('page.product1',[$item->category->slug_category,$item->slug_product])}}">{{$item->title}}</a> 
                        @else 
                        @foreach ($item->product_dungluong as $key=> $i)
                        @if ($key==0)
                        <a class="h6 text-decoration-none text-truncate" href="{{route('page.product',[$item->category->slug_category,$item->slug_product,$i->slug_dungluong])}}">{{$item->title}}</a>
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
                            <small>Lượt mua: </small>
                            <small>{{$item->order_count}}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
            
        </div>
    </div>
    <!-- Products End -->
    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <div style="display: flex">
            <h2 class=" position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">{{$category_skip_1->title}} đáng mua nhất</span></h2>
            <div style="display: flex; justify-content: flex-end;flex-grow: 1;" class="hover">
                @foreach ($category_skip_1->cate as $item)           
                <a class="text-decoration-none ml-3  hover" href="{{route('page.cate',[$category_skip_1->slug_category,$item->slug_cate])}}">{{$item->title}}</a>
            @endforeach
            <a class="text-decoration-none ml-3  hover" href="{{route('page.category',$category_skip_1->slug_category)}}">Xem tất cả ({{$category_skip_1->products()->count()}})</a>
            </div>
        </div>
        
        <div class="row px-xl-5">
            @foreach ($product_skip_1 as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="/page/img-fluid w-100" src="{{asset('image/products/'.$item->image)}}" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4 text-truncate">
                        @if ($item->product_dungluong->count()==0)
                        <a class="h6 text-decoration-none text-truncate" href="{{route('page.product1',[$item->category->slug_category,$item->slug_product])}}">{{$item->title}}</a> 
                        @else 
                        @foreach ($item->product_dungluong as $key=> $i)
                        @if ($key==0)
                        <a class="h6 text-decoration-none text-truncate" href="{{route('page.product',[$item->category->slug_category,$item->slug_product,$i->slug_dungluong])}}">{{$item->title}}</a>
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
                           
                            <small>Lượt mua: </small>
                            <small>{{$item->order_count}}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
            
        </div>
    </div>
    <!-- Products End -->
    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <div style="display: flex">
            <h2 class=" position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">{{$category_skip_2->title}} đáng mua nhất</span></h2>
            <div style="display: flex; justify-content: flex-end;flex-grow: 1;" class="hover">
                @foreach ($category_skip_2->cate as $item)           
                <a class="text-decoration-none ml-3  hover" href="{{route('page.cate',[$category_skip_2->slug_category,$item->slug_cate])}}">{{$item->title}}</a>
            @endforeach
            <a class="text-decoration-none ml-3  hover" href="{{route('page.category',$category_skip_2->slug_category)}}">Xem tất cả ({{$category_skip_2->products()->count()}})</a>
            </div>
        </div>
        
        <div class="row px-xl-5">
            @foreach ($product_skip_2 as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="/page/img-fluid w-100" src="{{asset('image/products/'.$item->image)}}" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4 text-truncate">
                        @if ($item->product_dungluong->count()==0)
                        <a class="h6 text-decoration-none text-truncate" href="{{route('page.product1',[$item->category->slug_category,$item->slug_product])}}">{{$item->title}}</a> 
                        @else 
                        @foreach ($item->product_dungluong as $key=> $i)
                        @if ($key==0)
                        <a class="h6 text-decoration-none text-truncate" href="{{route('page.product',[$item->category->slug_category,$item->slug_product,$i->slug_dungluong])}}">{{$item->title}}</a>
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
                           
                            <small>Lượt mua: </small>
                            <small>{{$item->order_count}}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
            
        </div>
    </div>
    <!-- Products End -->



    <!-- Offer Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="/page/img-fluid" src="/page/img/offer-1.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="/page/img-fluid" src="/page/img/offer-2.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <div style="display: flex">
            <h2 class=" position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">{{$category_skip_3->title}} đáng mua nhất</span></h2>
            <div style="display: flex; justify-content: flex-end;flex-grow: 1;" class="hover">
                @foreach ($category_skip_3->cate as $item)           
                <a class="text-decoration-none ml-3  hover" href="{{route('page.cate',[$category_skip_3->slug_category,$item->slug_cate])}}">{{$item->title}}</a>
            @endforeach
            <a class="text-decoration-none ml-3  hover" href="{{route('page.category',$category_skip_3->slug_category)}}">Xem tất cả ({{$category_skip_3->products()->count()}})</a>
            </div>
        </div>
        
        <div class="row px-xl-5">
            @foreach ($product_skip_3 as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="/page/img-fluid w-100" src="{{asset('image/products/'.$item->image)}}" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4 text-truncate">
                        @if ($item->product_dungluong->count()==0)
                        <a class="h6 text-decoration-none text-truncate" href="{{route('page.product1',[$item->category->slug_category,$item->slug_product])}}">{{$item->title}}</a> 
                        @else 
                        @foreach ($item->product_dungluong as $key=> $i)
                        @if ($key==0)
                        <a class="h6 text-decoration-none text-truncate" href="{{route('page.product',[$item->category->slug_category,$item->slug_product,$i->slug_dungluong])}}">{{$item->title}}</a>
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
                           
                            <small>Lượt mua: </small>
                            <small>{{$item->order_count}}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
            
        </div>
    </div>
    <!-- Products End -->
    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <div style="display: flex">
            <h2 class=" position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">{{$category_skip_4->title}} đáng mua nhất</span></h2>
            <div style="display: flex; justify-content: flex-end;flex-grow: 1;" class="hover">
                @foreach ($category_skip_4->cate as $item)           
                <a class="text-decoration-none ml-3  hover" href="{{route('page.cate',[$category_skip_4->slug_category,$item->slug_cate])}}">{{$item->title}}</a>
            @endforeach
            <a class="text-decoration-none ml-3  hover" href="{{route('page.category',$category_skip_4->slug_category)}}">Xem tất cả ({{$category_skip_4->products()->count()}})</a>
            </div>
        </div>
        
        <div class="row px-xl-5">
            @foreach ($product_skip_4 as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="/page/img-fluid w-100" src="{{asset('image/products/'.$item->image)}}" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4 text-truncate">
                        @if ($item->product_dungluong->count()==0)
                        <a class="h6 text-decoration-none text-truncate" href="{{route('page.product1',[$item->category->slug_category,$item->slug_product])}}">{{$item->title}}</a> 
                        @else 
                        @foreach ($item->product_dungluong as $key=> $i)
                        @if ($key==0)
                        <a class="h6 text-decoration-none text-truncate" href="{{route('page.product',[$item->category->slug_category,$item->slug_product,$i->slug_dungluong])}}">{{$item->title}}</a>
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
                           
                            <small>Lượt mua: </small>
                            <small>{{$item->order_count}}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
            
        </div>
    </div>
    <!-- Products End -->
    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <div style="display: flex">
            <h2 class=" position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">{{$category_skip_5->title}} đáng mua nhất</span></h2>
            <div style="display: flex; justify-content: flex-end;flex-grow: 1;" class="hover">
                @foreach ($category_skip_5->cate as $item)           
                <a class="text-decoration-none ml-3  hover" href="{{route('page.cate',[$category_skip_5->slug_category,$item->slug_cate])}}">{{$item->title}}</a>
            @endforeach
            <a class="text-decoration-none ml-3  hover" href="{{route('page.category',$category_skip_5->slug_category)}}">Xem tất cả ({{$category_skip_5->products()->count()}})</a>
            </div>
        </div>
        
        <div class="row px-xl-5">
            @foreach ($product_skip_5 as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="/page/img-fluid w-100" src="{{asset('image/products/'.$item->image)}}" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4 text-truncate">
                        @if ($item->product_dungluong->count()==0)
                        <a class="h6 text-decoration-none text-truncate" href="{{route('page.product1',[$item->category->slug_category,$item->slug_product])}}">{{$item->title}}</a> 
                        @else 
                        @foreach ($item->product_dungluong as $key=> $i)
                        @if ($key==0)
                        <a class="h6 text-decoration-none text-truncate" href="{{route('page.product',[$item->category->slug_category,$item->slug_product,$i->slug_dungluong])}}">{{$item->title}}</a>
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
                          
                            <small>Lượt mua: </small>
                            <small>{{$item->order_count}}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
            
        </div>
    </div>
    <!-- Products End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4">
                        <img src="/page/img/vendor-1.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="/page/img/vendor-2.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="/page/img/vendor-3.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="/page/img/vendor-4.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="/page/img/vendor-5.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="/page/img/vendor-6.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="/page/img/vendor-7.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="/page/img/vendor-8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->

 
@endsection
