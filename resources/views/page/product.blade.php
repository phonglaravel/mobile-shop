@extends('page.layouts.master')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="/">Trang chủ</a>
                    <a class="breadcrumb-item text-dark" href="{{route('page.category',$category->slug_category)}}">{{$category->title}}</a>
                    <span class="breadcrumb-item active">{{$product->title}}</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        @foreach ($product->product_image as $key=> $item)
                        <div @if ($key==0)
                        class="carousel-item active"
                        @else
                        class="carousel-item"
                        @endif >
                            <img class="w-100 h-100" src="{{asset('image/products/'.$item->image)}}" alt="Image">
                        </div>
                        @endforeach
                        
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3>{{$product->title}}</h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">(99 Reviews)</small>
                    </div>
                    
                    <form action="{{route('save_cart',$product->id)}}" method="POST">
                        @csrf
                    <div class="tab-content" id="myTabContent">
                        @foreach ($product_color_price as $key => $item)
                        <div @if ($key==0)
                        class="tab-pane fade show active"
                        @else 
                        class="tab-pane fade"
                        @endif id="la{{$item->id}}" role="tabpanel" aria-labelledby="la{{$item->id}}-tab">
                        @if ($product->sale==0||$product->sale==null||$product->day_start>$to_day||$product->day_end<$to_day||$product->amount_sale==0)
                        <h3>{{number_format($item->price,0,',','.')}}đ</h3>
                        <input type="hidden" id="price-{{$key}}" value="{{$item->price}}">
                        @else 
                        <h5>{{number_format($item->price*(100-$product->sale)/100,0,',','.')}} đ</h5><h6 class="text-muted ml-2"><del>{{number_format($item->price,0,',','.')}} đ</del></h6>
                        <input type="hidden" id="price-{{$key}}" value="{{$item->price*(100-$product->sale)/100}}">
                        @endif
                       
                        </div>
                        
                        @endforeach
                        
                        
                    </div>
                    @if (isset($product->product_dungluong))
                    <nav class="nav">
                        @foreach ($product->product_dungluong  as $key=> $item)
                            <a @if ($key==0)
                            class="nav-link active"
                            @else 
                            class="nav-link" 
                            @endif  href="{{route('page.product',[$category->slug_category,$product->slug_product,$item->slug_dungluong])}}">{{$item->dungluong}}</a>
                        @endforeach    
                    </nav>
                    @endif
                  
                    
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach ($product_color_price as $key => $item)
                        <li class="nav-item" role="presentation" >
                            <button id="id{{$key}}" @if ($key==0)
                            class="nav-link active"
                            @else 
                            class="nav-link"
                            @endif  data-toggle="tab" data-id="{{$item->id}}" data-price="{{$item->price}}" data-target="#la{{$item->id}}" type="button" role="tab" aria-controls="la{{$item->id}}" @if ($key==0)
                            aria-selected="true"
                            @else 
                            aria-selected="false"
                            @endif
                            @if ($item->qty==0)
                            disabled="disable"
                            @endif
                            >
                            
                            <p>{{$item->color}}</p>
                            <p>{{number_format($item->price,0,',','.')}} đ</p></button>
                            
                        </li>
                        @endforeach   
                    </ul>
                    
                    
                        <div id="price_qty">

                        </div>
                    
                        <div class="d-flex align-items-center mb-4 pt-2">
                            <div class="input-group quantity mr-3" style="width: 130px;">
                               
                                <input name="qty" type="number" min="1" class="form-control bg-secondary border-0 text-center" value="1">
                                
                            </div>
                            <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Thêm giỏ hàng</button>
                            
                        </div>
                        @if (session('error_qty'))
                            <div class="alert alert-success" role="alert">
                                {{ session('error_qty') }}
                            </div>
                            @endif
                    </form>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Bài viết đánh giá</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Cấu hình chi tiết</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            {!!$product->description!!}
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            {!!$product->kithuat!!}
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4">1 review for "Product Name"</h4>
                                    <div class="media mb-4">
                                        <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body">
                                            <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                            <div class="text-primary mb-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-4">Leave a review</h4>
                                    <small>Your email address will not be published. Required fields are marked *</small>
                                    <div class="d-flex my-3">
                                        <p class="mb-0 mr-2">Your Rating * :</p>
                                        <div class="text-primary">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="form-group">
                                            <label for="message">Your Review *</label>
                                            <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Your Name *</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Your Email *</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Sản phẩm liên quan</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach ($lienquan as $item)
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('image/products/'.$item->image)}}" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
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
                                <h5>{{number_format($item->price,0,',','.')}} đ</h5>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
    <input type="hidden" name="sl" value="{{$product_color_price->count()}}">
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            let price = $('#price-0').val();
            let id = $('#id0').data('id');
            
            $('#price_qty').html(`<input type="hidden" name="price" value="`+price+`">
                        <input type="hidden" name="pro_color" value="`+id+`">`)
        })
        let sl = $("input[name='sl']").val();
        for(let i=0;i<sl;i++){
            $('#id'+i+'').click(function(){
                let price = $('#price-'+i).data('price');
                let id = $('#id'+i+'').data('id');
            
                $('#price_qty').html(`<input type="hidden" name="price" value="`+price+`">
                        <input type="hidden" name="pro_color" value="`+id+`">`)
            })
        }
    </script>
@endpush