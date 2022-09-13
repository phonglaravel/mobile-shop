<div class="container-fluid mb-3" style="z-index: 1">
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
            @foreach ($blog2 as $item)
            <div class="product-offer mb-30" style="height: 200px;">
                <img class="/page/img-fluid" src="{{asset('image/blog/'.$item->image)}}" alt="">
                <div class="offer-text text-center">
                    <h5 class="text-white text-uppercase">{{$item->title}}</h5>
                    <h6 class="text-white text-uppercase">{{$item->category_blog->title}}</h4>
                    <a href="{{route('page.singleblog',[$item->category_blog->slug_categoryblog,$item->slug_blog])}}" class="btn btn-primary">Xem</a>
                </div>
            </div>
            @endforeach
            
            
        </div>
    </div>
</div>