@extends('admin.layouts.master')
@section('title')
<title>Sản phẩm</title>
@endsection
@section('content')

<div class="mr-1" style="width: 800px; margin: 0 auto;">
    <h2 style="text-align: center; margin-bottom:20px">Tạo Danh Mục</h2>
    <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('put')
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Tên</label>
          <div class="col-sm-10">
            <input value="{{$product->title}}" name="title" type="text" class="form-control" placeholder="Tên">
            @error('title')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Sale</label>
          <div class="col-sm-10">
            <input value="{{$product->sale}}" name="sale" type="text" class="form-control" placeholder="Tên">
            
          </div>
          <label class="col-sm-2 col-form-label">Số lượng</label>
          <div class="col-sm-10">
            <input  value="{{$product->amount_sale}}" name="amount_sale" type="text" class="form-control" placeholder="Tên">
            
          </div>
          <label class="col-sm-2 col-form-label">Bắt đầu</label>
          <div class="col-sm-10">
            <input id="datepicker1" value="{{$product->day_start}}" name="day_start" type="text" class="form-control" placeholder="Tên">
          </div>
          <label class="col-sm-2 col-form-label">Kết thúc</label>
          <div class="col-sm-10">
            <input id="datepicker2" value="{{$product->day_end}}" name="day_end" type="text" class="form-control" placeholder="Tên">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Danh mục</label>
          <div class="col-sm-10">
            <select name="category_id" class="form-control danhmuccha">
              
              @foreach ($categories as $item)
              <option @if ($item->id==$product->category_id)
                  selected
              @endif value="{{$item->id}}">{{$item->title}}</option>
              @endforeach
              
            </select>
            @error('category_id')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Danh mục con</label> 
          <div class="form-check col-sm-10" id="danhmuccon">
            @foreach ($cates as $item)
            <input {{in_array($item->id,$mang)? 'checked':''}} value="{{$item->id}}" name="cate_id[]" type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">{{$item->title}}</label>
            @endforeach                
          </div>
        </div>
        @if ($product->slug_category=='laptop')
       
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Ram</label>
          <div class="col-sm-10">
            <input value="{{$ram}}" name="ram" type="text" class="form-control" placeholder="Ram">
            @error('title')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        @endif
        
        @if ($product->product_dungluong->count()==0)
        <div class="form-group row">          
          <label class="col-sm-2 col-form-label">Giá</label>          
          <div class="col-sm-10 row">
            @foreach ($product->product_color_price as $item)
                
                <input name="gia[]" class="col-sm-6" type="text" value="{{$item->price}}">
                <input name = "qty[]" class="col-sm-6" type="text" value="{{$item->qty}}">
            @endforeach
            
          </div>
        </div>
        @else 
        <div class="form-group row">          
          <label class="col-sm-2 col-form-label">Giá</label>          
          <div class="col-sm-10 row">
            @foreach ($product->product_color_price as $item)
                <h4 class="col-sm-12">{{$item->color}}-{{$item->product_dungluong->dungluong}}</h4>
                <input name="gia[]" class="col-sm-6" type="text" value="{{$item->price}}">
                <input name = "qty[]" class="col-sm-6" type="text" value="{{$item->qty}}">
            @endforeach
            
          </div>
        </div>
        @endif
        
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Tinh trạng</label>
          <div class="col-sm-10">
            <input value="{{$product->tinhtrang}}" name="tinhtrang" type="text" class="form-control" placeholder="Tên">
            @error('tinhtrang')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Bộ sản phẩm</label>
          <div class="col-sm-10">
            <input value="{{$product->bosanpham}}" name="bosanpham" type="text" class="form-control" placeholder="Tên">
            @error('bosanpham')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Bảo hành</label>
          <div class="col-sm-10">
            <input value="{{$product->baohanh}}" name="baohanh" type="text" class="form-control" placeholder="Tên">
            @error('baohanh')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Gói bảo hành(vnd)</label>
          <div class="col-sm-10">
            <input value="{{$product->goibaohanh}}" name="goibaohanh" type="text" class="form-control" placeholder="Tên">
            @error('goibaohanh')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Mô tả</label>
          <div class="col-sm-10">
            <textarea id="editor1" name="description" type="text" class="form-control" placeholder="Tên">{{$product->description}}</textarea>
            @error('description')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Kỷ thuật</label>
          <div class="col-sm-10">
            <input name="kithuat" value="{{$product->kithuat}}" type="text" class="form-control" placeholder="Tên">
            @error('kithuat')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Trạng thái</label>
          <div class="col-sm-10">
            <select name="status" class="form-control">
              @if ($product->status==1)
              <option selected value="1">Hiện</option>
              <option value="0">Ẩn</option>
              @else
              <option value="1">Hiện</option>
              <option selected  value="0">Ẩn</option>
              @endif
             
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Ảnh</label>
          <div class="col-sm-10 row">
          <input type="file" name="images[]" id="" class="form-control" accept="image/*" multiple>
          
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Banner</label>
          <div class="col-sm-10">
          <input type="file" name="banner" id="" class="form-control" accept="image/*" >
          <img src="{{asset('image/products/banner/'.$product->banner)}}" alt="">
          </div>
        </div>
        @include('admin.layouts.editinfo')
        <button name="saveproduct" style="margin: 20px auto" type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{route('product.index')}}" class="btn btn-success">Quay lại</a>
    </form>
    <div class="row">
      @foreach ($product->product_image as $item)
              <div class="col-sm-3">
                <img style="position: relative;width: 100%; border: 1px solid" src="{{asset('image/products/'.$item->image)}}" alt="">
                <form action="{{route('delete_image',$item->id)}}" method="POST">
                  @csrf
                  @method('delete')
                  <button name="deleteimage" type="submit" style="position: absolute;top: 5px; right:20px"><i  class="fa-solid fa-rectangle-xmark"></i></button>
                </form>
                
              </div>     
          @endforeach
    </div>
</div>
@endsection
@push('scripts')
<script>
  $('.danhmuccha').change(function(){
    const danhmuccha = $(this).val();
    
     $.ajax({
      url: '{{url('/danhmuccon')}}',
      
      data: {danhmuccha:danhmuccha},
      success:function(data){
        $('#danhmuccon').html(data);
      }
    })
  })
</script>
<script>
  $('.dungluong1').click(function(){
      $('#ipdungluong').append('<input name="dungluong[]" type="text" class="form-control" />');
    });
  
  CKEDITOR.replace( 'editor1' );
  CKEDITOR.replace( 'editor2' );
  
</script>
<script>
  $('.dungluong').click(function(){
      $('#ipdungluong').append('<input name="dungluong[]" type="text" class="form-control" />');
    });
  
    
  
</script>

@endpush