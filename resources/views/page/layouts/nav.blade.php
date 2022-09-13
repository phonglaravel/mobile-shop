<!-- Topbar Start -->
<div class="container-fluid">  
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4">
            <a href="/" class="text-decoration-none">
                <span class="h1 text-uppercase text-primary bg-dark px-2">Mobile</span>
                <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
            </a>
        </div>
        <div class="col-lg-4 col-6 text-left ">
            <form action="{{route('page.search')}}" method="POST">
                @csrf
                <div class="input-group">
                    
                        <input id="keyword" name="keyword" type="text" class="form-control" placeholder="Nhập từ khóa tìm kiếm">
                        <div  class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <button type="submit" style="border: none;background-color: none; padding: 0"><i class="fa fa-search"></i></button>
                            </span>
                        </div>            
                </div>
                <style>
                    #search a:hover{
                        background-color: blueviolet;
                        color: aliceblue
                    }
                </style>
                <div id="search" class="input-group position-absolute" style="z-index: 2">
                    
                </div>
                
            </form>
        </div>
        <div class="col-lg-4 col-6 text-right">
            <p class="m-0">Hot Line</p>
            <h5 class="m-0">0977 350 884</h5>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid bg-dark mb-30">
    <div class="row px-xl-5">
        {{-- <div class="col-lg-3 d-none d-lg-block">
            <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                <div class="navbar-nav w-100">
                    <div class="nav-item dropdown dropright">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dresses <i class="fa fa-angle-right float-right mt-1"></i></a>
                        <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                            <a href="" class="dropdown-item">Men's Dresses</a>
                            <a href="" class="dropdown-item">Women's Dresses</a>
                            <a href="" class="dropdown-item">Baby's Dresses</a>
                        </div>
                    </div>
                    <a href="" class="nav-item nav-link">Shirts</a>
                    <a href="" class="nav-item nav-link">Jeans</a>
                    <a href="" class="nav-item nav-link">Swimwear</a>
                    <a href="" class="nav-item nav-link">Sleepwear</a>
                    <a href="" class="nav-item nav-link">Sportswear</a>
                    <a href="" class="nav-item nav-link">Jumpsuits</a>
                    <a href="" class="nav-item nav-link">Blazers</a>
                    <a href="" class="nav-item nav-link">Jackets</a>
                    <a href="" class="nav-item nav-link">Shoes</a>
                </div>
            </nav>
        </div> --}}
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                    <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        @foreach ($categories as $item)
                        <a href="{{route('page.category',$item->slug_category)}}" class="nav-item nav-link active">{{$item->title}}</a>
                        @endforeach    
                        <a href="{{route('page.blogs')}}" class="nav-item nav-link active">Bài viết</a>                  
                    </div>
                    <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                        <a href="" class="btn px-0">
                            <i class="fas fa-heart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                        </a>
                        <a href="{{route('page.cart')}}" class="btn px-0 ml-3">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">{{Cart::content()->count()}}</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->
@push('scripts')
    <script>
        $('#keyword').keyup(function(){
            let keyword = $(this).val();
            if(keyword !=''){
                $.ajax({
          			url : "{{url('/search')}}",
          			method: "GET",
          			data : {keyword:keyword},
          			success:function(data)
          			{
              			$('#search').fadeIn();                       
              			$('#search').html(data);
          			}
          		})
            }else{
                $('#search').fadeOut();  
            }
        })
    </script>
@endpush