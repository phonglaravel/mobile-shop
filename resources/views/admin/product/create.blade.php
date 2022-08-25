@extends('admin.layouts.master')
@section('title')
<title>Sản phẩm</title>
@endsection
@section('content')

<div class="mr-1" style="width: 800px; margin: 0 auto;">
    <h2 style="text-align: center; margin-bottom:20px">Tạo Danh Mục</h2>
    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Tên</label>
          <div class="col-sm-10">
            <input  name="title" type="text" class="form-control" placeholder="Tên">
            @error('title')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Danh mục</label>
          <div class="col-sm-10">
            <select name="category_id" class="form-control danhmuccha">
              <option selected value="">-Chọn danh mục-</option>
              @foreach ($categories as $item)
              <option value="{{$item->id}}">{{$item->title}}</option>
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
          
                          
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Dung lượng</label>
          
          <div class="col-sm-10" id="ipdungluong">
            <p class="btn btn-primary dungluong" id="dungluong">Thêm</p>
            <input name="dungluong[]" type="text" class="form-control" />
            
          </div>
          
        </div>
        <div class="form-group row">
          
          
          <p class="btn btn-primary mau col-sm-2">Hiện màu/giá</p>
          <input type="number" name="colornumber" id="colornumber">
          <div class="col-sm-10" id="ipmau">
           
            
          </div>
          @error('item')
              <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Tinh trạng</label>
          <div class="col-sm-10">
            <input name="tinhtrang" type="text" class="form-control" placeholder="Tên">
            @error('tinhtrang')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Bộ sản phẩm</label>
          <div class="col-sm-10">
            <input name="bosanpham" type="text" class="form-control" placeholder="Tên">
            @error('bosanpham')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Bảo hành</label>
          <div class="col-sm-10">
            <input name="baohanh" type="text" class="form-control" placeholder="Tên">
            @error('baohanh')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Gói bảo hành(vnd)</label>
          <div class="col-sm-10">
            <input name="goibaohanh" type="text" class="form-control" placeholder="Tên">
            @error('goibaohanh')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Mô tả</label>
          <div class="col-sm-10">
            <textarea id="editor1" name="description" type="text" class="form-control" placeholder="Tên"></textarea>
            @error('description')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Kỷ thuật</label>
          <div class="col-sm-10">
            <textarea id="editor2" name="kithuat" type="text" class="form-control" placeholder="Tên"></textarea>
            @error('kithuat')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Trạng thái</label>
          <div class="col-sm-10">
            <select name="status" class="form-control">
              <option selected value="1">Hiện</option>
              <option value="0">Ẩn</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Ảnh</label>
          <div class="col-sm-10">
          <input type="file" name="images[]" id="" class="form-control" accept="image/*" multiple>
          @error('images')
              <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Banner</label>
          <div class="col-sm-10">
          <input type="file" name="banner" id="" class="form-control" accept="image/*" >
          </div>
        </div>
        <button style="margin: 20px auto" type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{route('product.index')}}" class="btn btn-success">Quay lại</a>
    </form>
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
  $('.dungluong').click(function(){
      $('#ipdungluong').append('<input name="dungluong[]" type="text" class="form-control" />');
    });
  $('.mau').click(function(){
    let ip = $('#ipdungluong input').length;
    let color = $('#colornumber').val();
    let text = "";
    for (let i=0; i<color;i++ ){
      $('#ipmau').append(`<label for="">Màu</label>
             <input name="item[`+i+`][color]" type="text" class="form-control" placeholder="màu">
            
             `);
      for(let j=0;j<ip;j++){
        $('#ipmau').append(`Giá<input name="item[`+i+`][price`+j+`]" type="text" class="form-control" placeholder="giá"/>
        SL<input name="item[`+i+`][qty`+j+`]" type="text" class="form-control" placeholder="giá"/>`);
        
      }
    }
  }) 
    
  
</script>
<script>
 
  CKEDITOR.replace( 'editor1' );
  CKEDITOR.replace( 'editor2' );
</script>
@endpush