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


    </div>
</div>
<a id="mini_sosanh" class="btn">So sánh</a>
<div class="d-none" id="sosanh">
    
    <div " style="text-align: right">
        <a id="thugon" class="btn tab" >Thu gọn</a>
    </div>
    
        @csrf
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
            <form action="{{route('page.search')}}" method="POST">
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