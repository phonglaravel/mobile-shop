<form action="{{url('danh-muc/laptop/filter')}}" method="POST">
    @csrf
    <h4>Giá</h4>
    <div  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
        <input @foreach ($check as $item)
        @if($item=='duoi-10-trieu')
            checked
        @endif
    @endforeach name="gia[]" value="duoi-10-trieu" type="checkbox"  class="custom-control-input" id="price-1">
        <label class="custom-control-label" for="price-1">0 - 10 triệu</label>
       
    </div>
    <div  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
        <input @foreach ($check as $item)
        @if($item=='10-20-trieu')
            checked
        @endif
    @endforeach name="gia[]" value="10-20-trieu" type="checkbox" class="custom-control-input" id="price-2">
        <label  class="custom-control-label" for="price-2">10 triệu - 20 triệu</label>
        
    </div>
    <div  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
        <input @foreach ($check as $item)
        @if($item=='tren-20-trieu')
            checked
        @endif
    @endforeach name="gia[]" value="tren-20-trieu" type="checkbox" class="custom-control-input" id="price-3">
        <label class="custom-control-label" for="price-3">Tren 20 triệu</label>
        
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
    {{-- <h4>Ram</h4>
    
    <div  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
        <input @foreach ($check as $item)
        @if($item=='4gb')
            checked
        @endif
    @endforeach name="ram[]" value="4gb" type="checkbox" class="custom-control-input" id="ram1" >
        <label class="custom-control-label" for="ram1">4GB</label>
        
    </div>
    <div  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
        <input @foreach ($check as $item)
        @if($item=='8gb')
            checked
        @endif
    @endforeach name="ram[]" value="8gb" type="checkbox" class="custom-control-input" id="ram2" >
        <label class="custom-control-label" for="ram2">8GB</label>
        
    </div>
    <div  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
        <input @foreach ($check as $item)
        @if($item=='16gb')
            checked
        @endif
    @endforeach name="ram[]" value="16gb" type="checkbox" class="custom-control-input" id="ram3" >
        <label class="custom-control-label" for="ram3">16GB</label>
        
    </div>
    <div  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
        <input @foreach ($check as $item)
        @if($item=='32gb')
            checked
        @endif
    @endforeach name="ram[]" value="32gb" type="checkbox" class="custom-control-input" id="ram4" >
        <label class="custom-control-label" for="ram4">32GB</label>
        
    </div>
    <button id="filter1" type="submit" class="btn btn-primary text-white">Lọc</button> --}}
    
</form>
