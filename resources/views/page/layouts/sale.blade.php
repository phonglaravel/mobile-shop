<div class="container-fluid">
    <div class="mhn-slide owl-carousel">
        @foreach ($sale as $key => $item)
        <div class="mhn-item">
            <div class="mhn-inner">
                <img style="position: relative" src="{{asset('image/products/'.$item->image)}}">
                <div id="clockdiv" style="position: absolute; top:10px;right:10px">
                    <div>
                        <span class="days" style="text-align: left;">{{$item->sale}} %</span>                          
                      </div>
                    <div>
                      <span class="days" id="day{{$key}}" ></span>                       
                    </div>
                    <div>
                      <span class="hours" id="hour{{$key}}"></span>                        
                    </div>
                    <div>
                      <span class="minutes" id="minute{{$key}}" ></span>                        
                    </div>
                    <div>
                      <span class="seconds" id="second{{$key}}"></span>                         
                    </div>
                  </div>
                <div class="mhn-text">
                    <div class="text-truncate mt-2">
                    @if ($item->product_dungluong->count()==0)
                    <a class="h6 text-decoration-none text-truncate text-nowrap" href="{{route('page.product1',[$item->category->slug_category,$item->slug_product])}}">{{$item->title}}</a> 
                    @else 
                    @foreach ($item->product_dungluong as $k=> $it)
                    @if ($k==0)
                    <a class="h6 text-decoration-none text-truncate text-nowrap" href="{{route('page.product',[$item->category->slug_category,$item->slug_product,$it->slug_dungluong])}}">{{$item->title}}</a>
                    @endif
                    @endforeach
                    @endif
                    </div>
                    <input type="hidden" class="form-group" id="input-{{$key}}" value="{{$item->day_end}}">
                    <span>{{number_format($item->price*(100-$item->sale)/100,0,',','.')}}</span>
                    <span style="text-decoration-line:line-through" class=" ml-2" >{{number_format($item->price,0,',','.')}}</span>
                    <p style="padding: 10px;background-color: chartreuse; border-radius: 5px">Còn lại: {{$item->amount_sale}}</p>
                </div>
            </div>
        </div>
        
       
        @endforeach
       
    </div>
</div>
@for ($i = 0; $i < $sale->count(); $i++)
<script>   
    // var endDate0 = "dec 30, 2022 00:00:00";
    setInterval(function () {
   const day_end = document.getElementById("input-"+{{$i}}).value; 
    document.getElementById("day"+{{$i}}).innerHTML = Math.floor((new Date(day_end+" 23:59:00").getTime() - new Date().getTime()) / (1000 * 60 * 60 * 24)) + ' ngày';
    document.getElementById("hour"+{{$i}}).innerHTML =Math.floor(((new Date(day_end+" 23:59:00").getTime() - new Date().getTime()) % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))+ ' giờ';
    document.getElementById("minute"+{{$i}}).innerHTML = Math.floor(((new Date(day_end+" 23:59:00").getTime() - new Date().getTime()) % (1000 * 60 * 60)) / (1000 * 60))+ ' phút';
    document.getElementById("second"+{{$i}}).innerHTML = Math.floor(((new Date(day_end+" 23:59:00").getTime() - new Date().getTime())% (1000 * 60)) / 1000)+ ' giây'; 
    }, 1000);    
</script>
@endfor