@extends('page.layouts.master')
@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="/">Trang chủ</a>
                
                <span class="breadcrumb-item active">So sánh sản phẩm</span>
            </nav>
        </div>
    </div>
</div>


<!-- Shop Start -->
<div class="container-fluid">
    <div class="px-xl-5">
        @if ($products->first()->category_id==1)             
        <table class="table table-bordered">         
            <tbody>
                <tr>               
                    @foreach ($products as $item)
                    <td class="col-4">
                        <img style="height: 120px" src="{{asset('image/products/'.$item->image)}}" alt="">
                        <h5 class="ml-2">{{$item->title}}</h5>
                        <p class="ml-2">{{number_format($item->price,0,'.',',')}} đ</p>
                    </td>
                    @endforeach
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif    
                </tr>           
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">TỔNG QUAN</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($products as $item)
                    <td class="col-4">
                    @foreach (explode(',',$item->kithuat) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
             
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">Kiểu màn hình</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Công nghệ màn hình</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->congnghemanhinh) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Độ phân giải</p>
                     @else 
                      <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->dophangiai) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                        <p>Màn hình rộng</p>
                    @else 
                        <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->manhinhrong) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                 
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                        <p>Độ sáng tối đa</p>
                    @else 
                        <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->dosangtoida) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                  
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                        <p>Mặt kính cảm ứng</p>
                    @else 
                        <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->matkinhcamung) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                  
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
             
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">Camera sau</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Độ phân giải camera sau</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->camerasau) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                   
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                        <p>Quay phim</p>
                    @else 
                        <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->quayphim) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                   
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                        <p>Đèn Flash</p>
                    @else 
                        <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->denflash) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
            
             
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">Camera trước</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Độ phân giải camera trước</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->cameratruoc) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                   
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
          
                
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">Hệ điều hành & CPU</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Chip xử lý</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->chipxuly) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Tốc độ CPU</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->cpu) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                   
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Chip đồ họa</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->chipdohoa) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                  
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
          
                
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">Bộ nhớ & Lưu trữ</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>RAM</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->ram) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                  
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Bộ nhớ trong</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->bonhotrong) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Danh bạ</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->danhba) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                   
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
          
                
            </tbody>
        </table>
    
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">Kết nối
                    </th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Mạng di động</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->mangdidong) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                   
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Sim</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->sim) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                   
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Wifi</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->wifi) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>GPS</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->gps) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>BlueTooth</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->bluetooth) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                   
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Cổng kết nối sạc</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->congsac) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                   
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Jack tai nghe</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->jacktainghe) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                   
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Kết nối khác</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->ketnoikhac) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                  
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
        
                
            </tbody>
        </table>

        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">Pin & Sạc</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Dung lượng pin</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->dungluongpin) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                   
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Loại pin</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->loaipin) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                   
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Hỗ trợ sạc tối đa</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->hotrotoida) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                   
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Công nghệ pin</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->congnghepin) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">Tiện ích</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Bảo mật nâng cao</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->baomatnangcao) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                   
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Tính năng đặc biệt</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->tinhnangdacbiet) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                   
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Kháng nước bụi</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->khangnuoc) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                   
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Ghi âm</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->ghiam) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                   
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Xem phim</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->xemphim) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                   
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Nghe nhạc</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->nghenhac) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                   
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">Thông tin chung</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Kích thước khối lượng</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->kichthuoc) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Thời điểm ra mắt</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->thoidiemramat) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                   
                    </td>
                    
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
               
                
            </tbody>
        </table>
        @elseif ($products->first()->category_id==3)
        <table class="table table-bordered">         
            <tbody>
                <tr>               
                    @foreach ($products as $item)
                    <td class="col-4">
                        <img style="height: 120px" src="{{asset('image/products/'.$item->image)}}" alt="">
                        <h5 class="ml-2">{{$item->title}}</h5>
                        <p class="ml-2">{{number_format($item->price,0,'.',',')}} đ</p>
                    </td>
                    @endforeach
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif    
                </tr>           
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">TỔNG QUAN</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($products as $item)
                    <td class="col-4">
                    @foreach (explode(',',$item->kithuat) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
             
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">Kiểu màn hình</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Công nghệ màn hình</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->congnghemanhinh) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Độ phân giải</p>
                     @else 
                      <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->dophangiai) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                        <p>Màn hình rộng</p>
                    @else 
                        <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->manhinhrong) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                 
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">Hệ điều hành & CPU</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Hệ điều hành</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->hedieuhanh) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Chip xử lý</p>
                     @else 
                      <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->chipxuly) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                        <p>Tốc độ CPU</p>
                    @else 
                        <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->tocdocpu) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                 
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                        <p>Chip đồ họa</p>
                    @else 
                        <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->chipdohoa) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                 
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">Bộ nhớ & Lưu trữ</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>RAM</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->ram) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Bộ nhớ trong</p>
                     @else 
                      <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->bonhotrong) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                        <p>Bộ nhớ còn lại</p>
                    @else 
                        <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->bonhoconlai) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                 
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">Camera sau</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Độ phân giải camera sau</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->camerasau) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Quay phim</p>
                     @else 
                      <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->quayphim) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                        <p>Tính năng<</p>
                    @else 
                        <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->tinhnang) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                 
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">Camera trước</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Độ phân giải camera trước</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->cameratruoc) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Tính năng camera trước</p>
                     @else 
                      <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->tinhnangcameratruoc) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">Kết nối</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Mạng di động</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->mangdidong) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Sim</p>
                     @else 
                      <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->sim) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                        <p>Thực hiện cuộc gọi</p>
                    @else 
                        <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->cuocgoi) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                 
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                        <p>Wifi</p>
                    @else 
                        <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->wifi) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                 
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                        <p>GPS</p>
                    @else 
                        <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->gps) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                 
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                        <p>Bluetooth</p>
                    @else 
                        <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->bluetooth) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                 
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                        <p>Cổng kết nối</p>
                    @else 
                        <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->congketnoi) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                 
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                        <p>Jack tai nghe</p>
                    @else 
                        <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->jacktainghe) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                 
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">Tiện ích</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Tính năng đặc biệt</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->tinhnangdacbiet) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
              
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">Pin & Sạc</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Dung lượng pin</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->dungluongpin) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Loại pin</p>
                     @else 
                      <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->loaipin) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                        <p>Công nghệ pin</p>
                    @else 
                        <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->congnghepin) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                 
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                        <p>Hỗ trợ sạc tối đa</p>
                    @else 
                        <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->hotrotoida) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                 
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                        <p>Sạc kèm theo máy</p>
                    @else 
                        <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->sackemmay) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                 
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">Thông tin chung</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Chất liệu</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->chatluong) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Kích thước khối lượng</p>
                     @else 
                      <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->kichthuoc) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                        <p>Thời điểm ra mắt</p>
                    @else 
                        <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->ngayramat) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                 
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Tình trạng</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->tinhtrang1) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Nguồn gốc</p>
                     @else 
                      <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->nguongoc) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
               
                
            </tbody>
        </table>
        @elseif ($products->first()->category_id==4)
        <table class="table table-bordered">         
            <tbody>
                <tr>               
                    @foreach ($products as $item)
                    <td class="col-4">
                        <img style="height: 120px" src="{{asset('image/products/'.$item->image)}}" alt="">
                        <h5 class="ml-2">{{$item->title}}</h5>
                        <p class="ml-2">{{number_format($item->price,0,'.',',')}} đ</p>
                    </td>
                    @endforeach
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif    
                </tr>           
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">TỔNG QUAN</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($products as $item)
                    <td class="col-4">
                    @foreach (explode(',',$item->kithuat) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
             
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Công nghệ CPU</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->congnghecpu) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Tốc độ CPU</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->tocdocpu) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Tốc độ tối đa</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->tocdotoida) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>RAM</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->ram) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Loại ram</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->loairam) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Tốc độ Bus RAM</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->tocdobusram) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Hỗ trợ RAM tối đa</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->ramtoida) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Ổ cứng</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->ocung) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">Kiểu màn hình</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Màn hình</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->manhinh) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Độ phân giải</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->dophangiai) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Công nghệ màn hình</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->congnghemanhinh) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">Đồ họa và Âm thanh</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Card màn hình</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->cardmanhinh) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Công nghệ âm thanh</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->congngheamthanh) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">Cổng kết nối & tính năng mở rộng</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Cổng giao tiếp</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->conggiaotiep) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Kết nối không dây</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->ketnoikhongday) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Webcam</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->webcam) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Tính năng khác</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->tinhnangkhac) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Đèn bàn phím</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->denbanphim) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">Kích thước & trọng lượng</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Kích thước, trọng lượng</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->kichthuoc) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Chất liệu</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->chatlieu) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>                
                    <th class="col-4">Thông tin khác</th>
                    <th class="col-4"></th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Thông tin Pin</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->thongtinpin) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Hệ điều hành</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->hedieuhanh) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
                <tr>               
                    @foreach ($info as $key => $item)
                    <td class="col-4">
                    @if ($key==0)
                    <p>Thời điểm ra mắt</p>
                    @else 
                    <p>&nbsp</p>              
                    @endif
                    @foreach (explode(',',$item->thoigianramat) as $i)
                    <li>{{$i}}</li>
                    @endforeach
                    
                    </td>
                    @endforeach  
                    @if (count($products)==2)
                    <td class="col-4"></td>
                    @endif                  
                </tr>
            </tbody>
        </table>
        @endif 

    </div>
</div>
@include('page.layouts.mini_compare')
@endsection
