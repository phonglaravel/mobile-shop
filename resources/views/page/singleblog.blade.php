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
                <a class="breadcrumb-item text-dark" href="{{route('page.categoryblog',$main_cate_blog->slug_categoryblog)}}">{{$main_cate_blog->title}}</a>
                <span class="breadcrumb-item active">{{$blog->title}}</span>
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
                <!-- News Detail Start -->
                <div class="position-relative mb-3">
                    <img class="img-fluid w-100" src="{{asset('image/blog/'.$blog->image)}}" style="object-fit: cover;">
                    <div class="bg-white border border-top-0 p-4">
                        <div class="mb-3">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href="">{{$main_cate_blog->title}}</a>
                            <a class="text-body" href="">{{$blog->date}}</a>
                        </div>
                        <h3 class="mb-3 text-secondary text-uppercase font-weight-bold">{{$blog->title}}</h3>
                        {!!$blog->content!!}
                    </div>
                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                        
                        <div class="d-flex align-items-center">
                            <span class="ml-3"><i class="far fa-eye mr-2"></i>{{$blog->count}}</span>
                            <span class="ml-3"><i class="far fa-comment mr-2"></i>{{$blog->comment->count()}}</span>
                        </div>
                    </div>
                </div>
                <!-- News Detail End -->

                <!-- Comment List Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">{{count($blog->comment)}} Bình luận</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4">
                        @foreach ($blog->comment->sortByDesc('id') as $item)
                        <div class="media mb-4">                          
                            <div class="media-body">
                                <h6><a class="text-secondary font-weight-bold" href="">{{$item->name}}</a> <small><i>{{$item->date}}</i></small></h6>
                                <p>{{$item->comment}}</p>
                                <button class="btn btn-sm btn-outline-secondary">Reply</button>
                            </div>                           
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Comment List End -->

                <!-- Comment Form Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Viết bình luận</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4">
                        <form action="{{route('commentblog',$blog->id)}}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Tên *</label>
                                        <input name="name" type="text" class="form-control" id="name">
                                        @error('name')
                                        <span style="color: red">{{ $message }}</span>
                                         @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input name="email" type="text" class="form-control" id="email">
                                        @error('email')
                                        <span style="color: red">{{ $message }}</span>
                                         @enderror
                                    </div>
                                </div>
                            </div>
                           

                            <div class="form-group">
                                <label for="message">Nội dung *</label>
                                <textarea name="comment" id="message" cols="30" rows="5" class="form-control"></textarea>
                                @error('comment')
                                <span style="color: red">{{ $message }}</span>
                                 @enderror
                            </div>
                            <div class="form-group mb-0">
                                <input type="submit" value="Gửi bình luận"
                                    class="btn btn-primary font-weight-semi-bold py-2 px-3">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Comment Form End -->
            </div>
            <div class="col-lg-4">
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
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">{{$item->category_blog->title}}</a>
                                    <span class="text-body" href=""><small>{{$item->date}}</small></span>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">{{$item->title}}</a>
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