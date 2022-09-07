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
                            <div class="product-action">  
                                <a class="btn btn-outline-dark btn-square" onclick="add({{$item->id}})"><i class="fa fa-sync-alt"></i></a>
                            </div>
                            
                            
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
<a id="mini_sosanh" class="btn">So sánh</a>
<div class="d-none" id="sosanh">
    
    <div " style="text-align: right">
        <a id="thugon" class="btn tab" >Thu gọn</a>
    </div>
    
        
        <div  class="row tab">
        
            <div id="product1" class="col-3 mt-2">
                <a class="btn"  onclick="showmodal()"><i class="fas fa-image" style="font-size: 70px"></i></a>
                <p>Thêm sản phẩm</p>
            </div>
            <div id="product2" class="col-3 mt-2">
                <a class="btn" onclick="showmodal()"><i class="fas fa-image" style="font-size: 70px"></i></a>
                <p>Thêm sản phẩm</p>
            </div>
            <div id="product3" class="col-3 mt-2">
                <a class="btn" onclick="showmodal()"><i class="fas fa-image" style="font-size: 70px"></i></a>
                <p>Thêm sản phẩm</p>
            </div>
            <div class="col-3 mt-2">
                <button id="btn_compare" class="btn btn-primary mb-2">So sánh</button><br/>
                <a id="delete_sosanh" class="btn btn-primary">Xóa tất cả</a>
            </div>
        </div>
    
    
</div>
<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hãy nhập tên sản phẩm</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{url('search1')}}" method="POST">
                @csrf
                <div class="input-group">
                    
                        <input id="keyword1" name="keyword" type="text" class="form-control" placeholder="Nhập từ khóa tìm kiếm">
                        <div  class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <button type="submit" style="border: none;background-color: none; padding: 0"><i class="fa fa-search"></i></button>
                            </span>
                        </div>            
                </div>
                <style>
                    #search1 a:hover{
                        background-color: blueviolet;
                        color: aliceblue
                    }
                </style>
                <div id="search1" class="input-group ">
                    
                </div>
                
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  
@endsection
@push('scripts')
    <script>
        show();
        function show(){
            if(localStorage.getItem('sosanh')!=null){
                var data = JSON.parse(localStorage.getItem('sosanh'));
                for (let i = 0; i < data.length; i++) {
                    let title = data[i].title;
                    let id = data[i].id;
                    let image = data[i].image;
                    let category = data[i].category;
                    $('#product'+(i+1)).empty()
                    $('#product'+(i+1)).append(` <img src="`+image+`" alt="" style="height: 70px">
                    <p>`+title+`</p>      
                    <button onclick="delete_item(`+id+`)">Xóa</button>  
                    <input type="hidden" id="id`+i+`" value="`+id+`">
                    `);
            
                }
            }else{
                localStorage.setItem('sosanh','[]');
            }
        }
        
        $('#mini_sosanh').click(function(){
            $('#sosanh').removeClass('d-none');
        })
        $('#thugon').click(function(){
            $('#sosanh').addClass('d-none');
        })
        $('#keyword1').keyup(function(){
            let keyword = $(this).val();
            if(keyword !=''){
                $.ajax({
          			url : "{{url('/search1')}}",
          			method: "GET",
          			data : {keyword:keyword},
          			success:function(data)
          			{
              			$('#search1').fadeIn();                       
              			$('#search1').html(data);
          			}
          		})
            }else{
                $('#search1').fadeOut();  
            }
        })
        function showmodal(){
           
           $('#exampleModal').modal();
       }
     
        function add(product_id){
            let id = product_id;
           let title = $('#title'+id).val();
           let category = $('#category'+id).val();
           let image = 'http://127.0.0.1:8000/image/products/'+$('#image'+id).val();
           let item = {
                'title' : title,
                'id' : id,
                'image' : image,
                'category' : category
           }
           if(localStorage.getItem('sosanh')==null){
                localStorage.setItem('sosanh','[]');
            }
            var old_data = JSON.parse(localStorage.getItem('sosanh'));
            var matches1 = $.grep(old_data, function(obj){
                return obj.id == id;
            })
            var matches2 = $.grep(old_data, function(obj){
                return obj.category == category;
            })
            if (matches1.length) {
                alert ('Sản phẩm đã thêm vào so sánh')
            }else if(old_data.length>0 && matches2==0) {
                alert ('Không cùng danh mục')
            }
            else {
                if(old_data.length<=2) {
                    old_data.push(item);
                    $('#exampleModal').modal('hide');
                    $('#sosanh').removeClass('d-none');
                    if(old_data.length==1){
                    $('#product1').empty()
                    $('#product1').append(`
                    <img src="`+image+`" alt="" style="height: 70px">
                    <p>`+title+`</p>
                    <button onclick="delete_item(`+id+`)">Xóa</button>
                    <input type="hidden" id="id0" value="`+id+`">
                    `);
                    }
                    if(old_data.length==2){
                    $('#product2').empty()
                    $('#product2').append(`
                    <img src="`+image+`" alt="" style="height: 70px">
                    <p>`+title+`</p>
                    <button onclick="delete_item(`+id+`)">Xóa</button>
                    <input type="hidden" id="id1" value="`+id+`">
                    `);
                    }
                    if(old_data.length==3){
                    $('#product3').empty()
                    $('#product3').append(`
                    <img src="`+image+`" alt="" style="height: 70px">
                    <p>`+title+`</p>
                    <button onclick="delete_item(`+id+`)">Xóa</button>
                    <input type="hidden" id="id2" value="`+id+`">
                    `);
                    }
                    
                }else{
                    alert ('Đã đạt giới hạn so sánh');
                }
           
                localStorage.setItem('sosanh', JSON.stringify(old_data));
            }
            localStorage.setItem('sosanh', JSON.stringify(old_data));
            
        }
        $('#delete_sosanh').click(function(){
            localStorage.removeItem('sosanh')
                    $('#product1').empty()
                    $('#product1').append(`
                    <a class="btn"  onclick="showmodal()"><i class="fas fa-image" style="font-size: 70px"></i></a>
                    <p>Thêm sản phẩm</p>
                    `);
                    $('#product2').empty()
                    $('#product2').append(`
                    <a class="btn"  onclick="showmodal()"><i class="fas fa-image" style="font-size: 70px"></i></a>
                    <p>Thêm sản phẩm</p>
                    `);    
                    $('#product3').empty()
                    $('#product3').append(`
                    <a class="btn"  onclick="showmodal()"><i class="fas fa-image" style="font-size: 70px"></i></a>
                    <p>Thêm sản phẩm</p>
                    `);   
        })
       
        function delete_item(id) {
            var olddata = JSON.parse(localStorage.getItem('sosanh'));
            var index = olddata.findIndex(item => item.id===id);
            olddata.splice(index, 1);
            localStorage.setItem('sosanh', JSON.stringify(olddata));
            $('#product1').empty()
            $('#product1').append(`
                <a class="btn"  onclick="showmodal()"><i class="fas fa-image" style="font-size: 70px"></i></a>
                <p>Thêm sản phẩm</p>
                `); 
                $('#product2').empty()
            $('#product2').append(`
                <a class="btn"  onclick="showmodal()"><i class="fas fa-image" style="font-size: 70px"></i></a>
                <p>Thêm sản phẩm</p>
                `);   
                $('#product3').empty()
            $('#product3').append(`
                <a class="btn"  onclick="showmodal()"><i class="fas fa-image" style="font-size: 70px"></i></a>
                <p>Thêm sản phẩm</p>
                `);     
            if(localStorage.getItem('sosanh')!=null){
                var data = JSON.parse(localStorage.getItem('sosanh'));
                for (let i = 0; i < data.length; i++) {
                    let title = data[i].title;
                    let id = data[i].id;
                    let image = data[i].image;
                    let category = data[i].category;
                    
                    $('#product'+(i+1)).empty()
                    $('#product'+(i+1)).append(` <img src="`+image+`" alt="" style="height: 70px">
                    <p>`+title+`</p>      
                    <button onclick="delete_item(`+id+`)">Xóa</button>  
                    <input type="hidden" id="id`+i+`" value="`+id+`">
                    `);
            
                }
            }else{
                localStorage.setItem('sosanh','[]');
            }
                 
            
             
        }
        $('#btn_compare').click(function(){
            let id0 = $('#id0').val();
            let id1 = $('#id1').val();
            let id2 = $('#id2').val();
            if(id1==null && id2==null){
                alert('Hãy thêm sản phẩm để so sánh')
            }
            else if(id1==null && id2==null && id0==null){
                alert('Hãy thêm sản phẩm để so sánh')
            }else if(id2==null){
                window.location.assign("http://127.0.0.1:8000/so-sanh-2/"+id0+"-vs-"+id1)
            }else{
                window.location.assign("http://127.0.0.1:8000/so-sanh-3/"+id0+"-vs-"+id1+"-vs-"+id2)
            }
        })
    </script>
@endpush