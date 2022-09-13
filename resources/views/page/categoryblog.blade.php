@extends('page.layouts.master')
@push('styles')
<style>
    @media (min-width: 768px) {
  .news-lg {
    height: 350px;
  }
  .news-lg .border {
    border-left: none !important;
  }
}

@media (max-width: 767.98px) {
  .news-lg .border {
    border-top: none !important;
  }
}
</style>
@endpush

@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="/">Trang chủ</a>
                <a class="breadcrumb-item text-dark" href="{{route('page.blogs')}}">Bài viết</a>
                <span class="breadcrumb-item active">{{$main_cate_blog->title}}</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">        
                @foreach ($categoryblog as $item)
                <a style="margin-right: 30px" class=" text-dark" href="{{route('page.categoryblog',$item->slug_categoryblog)}}">{{$item->title}}</a>
                @endforeach                     
            </nav>
        </div>
    </div>
</div>

 <!-- News With Sidebar Start -->
 <div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    @foreach ($blogs as $key=> $item)
                        @if($key==0)
                        <div class="col-lg-12">
                            <div class="row news-lg mx-0 mb-3">
                                <div class="col-md-6 h-100 px-0">
                                    <img class="img-fluid h-100" src="{{asset('image/blog/'.$item->image)}}" style="object-fit: cover;">
                                </div>
                                <div class="col-md-6 d-flex flex-column border bg-white h-100 px-0">
                                    <div class="mt-auto p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                href="{{route('page.categoryblog',$item->category_blog->slug_categoryblog)}}">{{$item->category_blog->title}}</a>
                                            <span class="text-body" ><small>{{$item->date}}</small></span>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{route('page.singleblog',[$item->category_blog->slug_categoryblog,$item->slug_blog])}}">{{$item->title}}</a>
                                        
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border-top mt-auto p-4">
                                       
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i class="far fa-eye mr-2"></i>{{$item->count}}</small>
                                            <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       @else
                       <div class="col-lg-12">
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                            <img style="width: 110px;" class="img-fluid h-100" src="{{asset('image/blog/'.$item->image)}}" alt="">
                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="{{route('page.categoryblog',$item->category_blog->slug_categoryblog)}}">{{$item->category_blog->title}}</a>
                                    <span class="text-body" href=""><small>{{$item->date}}</small></span>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{route('page.singleblog',[$item->category_blog->slug_categoryblog,$item->slug_blog])}}">{{$item->title}}</a>
                            </div>
                        </div>
                    </div>
                        @endif
                    @endforeach
                    <nav> {!! $blogs->links() !!} </nav>
                    
                   
                </div>
            </div>
            
            <div class="col-lg-4">
               
              

                {{-- <!-- Ads Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
                    </div>
                    <div class="bg-white text-center border border-top-0 p-3">
                        <a href=""><img class="img-fluid" src="img/news-800x500-2.jpg" alt=""></a>
                    </div>
                </div>
                <!-- Ads End --> --}}

                <!-- Popular News Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Tin xem nhiều</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        @foreach ($mostview as $item)
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="{{route('page.categoryblog',$item->category_blog->slug_categoryblog)}}">{{$item->category_blog->title}}</a>
                                    <span class="text-body" href=""><small>{{$item->date}}</small></span>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{route('page.singleblog',[$item->category_blog->slug_categoryblog,$item->slug_blog])}}">{{$item->category_blog->title}}">{{$item->title}}</a>
                            </div>
                        </div>
                        @endforeach
                        
                       
                    </div>
                </div>
                <!-- Popular News End -->

                
            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->
@endsection