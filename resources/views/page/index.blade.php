@extends('page.layouts.master')
@section('content')
    <!-- Carousel Start -->
    @include('page.layouts.carousel')
    <!-- Carousel End -->

     @include('page.layouts.sale')   

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



@endsection
