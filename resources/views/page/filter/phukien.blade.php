<form action="{{url('danh-muc/phu-kien/filter')}}" method="POST">
    @csrf
    <h4>Giá</h4>
    <div  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
        <input @foreach ($check as $item)
        @if($item=='duoi-2-trieu')
            checked
        @endif
    @endforeach name="gia[]" value="duoi-2-trieu" type="checkbox"  class="custom-control-input" id="price-1">
        <label class="custom-control-label" for="price-1">0 - 2 triệu</label>
       
    </div>
    <div  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
        <input @foreach ($check as $item)
        @if($item=='2-4-trieu')
            checked
        @endif
    @endforeach name="gia[]" value="2-4-trieu" type="checkbox" class="custom-control-input" id="price-2">
        <label  class="custom-control-label" for="price-2">2 triệu - 4 triệu</label>
        
    </div>
    <div  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
        <input @foreach ($check as $item)
        @if($item=='4-10-trieu')
            checked
        @endif
    @endforeach name="gia[]" value="4-10-trieu" type="checkbox" class="custom-control-input" id="price-3">
        <label class="custom-control-label" for="price-3">4 triệu - 10 triệu</label>
        
    </div>
    <div  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
        <input @foreach ($check as $item)
        @if($item=='10-20-trieu')
            checked
        @endif
    @endforeach name="gia[]" value="10-20-trieu" type="checkbox" class="custom-control-input" id="price-4" >
        <label class="custom-control-label" for="price-4">10 triệu - 20 triệu</label>
        
    </div>
    <div  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
        <input @foreach ($check as $item)
        @if($item=='tren-20-trieu')
            checked
        @endif
    @endforeach name="gia[]" value="tren-20-trieu" type="checkbox" class="custom-control-input" id="price-5">
        <label class="custom-control-label" for="price-5">Trên 20 triệu</label>
        
    </div>
    <button id="filter1" type="submit" class="btn btn-primary text-white">Lọc</button>
    <h4>Loại</h4>
    @foreach ($category->cate as $item)
    <div  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
        <input @foreach ($check as $i)
        @if($i==$item->slug_cate)
            checked
        @endif
    @endforeach name="cate[]" value="{{$item->slug_cate}}" type="checkbox" class="custom-control-input" id="{{$item->title}}">
        <label class="custom-control-label" for="{{$item->title}}">{{$item->title}}</label>
        
    </div>
    @endforeach
    <button id="filter1" type="submit" class="btn btn-primary text-white">Lọc</button>
    
</form>
