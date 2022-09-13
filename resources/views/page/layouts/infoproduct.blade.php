@if ($product->category_id==1)
<table class="table table-bordered">
   <thead class="thead-light">
      <tr>
         <th>Kiểu màn hình</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>
            <p>Công nghệ màn hình</p>
            @foreach (explode(',',$info->congnghemanhinh) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
      </tr>
      <tr>
         <td>
            <p>Độ phân giải</p>
            @foreach (explode(',',$info->dophangiai) as $i)
            <li>{{$i}}</li>
            @endforeach           
         </td>
      </tr>
      <tr>
         <td>
            <p>Màn hình rộng</p>
            @foreach (explode(',',$info->manhinhrong) as $i)
            <li>{{$i}}</li>
            @endforeach        
         </td>
      </tr>
      <tr>
         <td>
            <p>Độ sáng tối đa</p>
            @foreach (explode(',',$info->dosangtoida) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
      <tr>
         <td>
            <p>Mặt kính cảm ứng</p>
            @foreach (explode(',',$info->matkinhcamung) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
   </tbody>
</table>
<table class="table table-bordered">
   <thead class="thead-light">
      <tr>
         <th>Camera sau</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>
            <p>Độ phân giải camera sau</p>
            @foreach (explode(',',$info->camerasau) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
      <tr>
         <td>
            <p>Quay phim</p>
            @foreach (explode(',',$info->quayphim) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
      <tr>
         <td>
            <p>Đèn Flash</p>
            @foreach (explode(',',$info->denflash) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
   </tbody>
</table>
<table class="table table-bordered">
   <thead class="thead-light">
      <tr>
         <th>Camera trước</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>
            <p>Độ phân giải camera trước</p>
            @foreach (explode(',',$info->cameratruoc) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
   </tbody>
</table>
<table class="table table-bordered">
   <thead class="thead-light">
      <tr>
         <th>Hệ điều hành & CPU</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>
            <p>Chip xử lý</p>
            @foreach (explode(',',$info->chipxuly) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
      <tr>
         <td>
            <p>Tốc độ CPU</p>
            @foreach (explode(',',$info->cpu) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
      <tr>
         <td>
            <p>Chip đồ họa</p>
            @foreach (explode(',',$info->chipdohoa) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
   </tbody>
</table>
<table class="table table-bordered">
   <thead class="thead-light">
      <tr>
         <th>Bộ nhớ & Lưu trữ</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>
            <p>RAM</p>
            @foreach (explode(',',$info->ram) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
      <tr>
         <td>
            <p>Bộ nhớ trong</p>
            @foreach (explode(',',$info->bonhotrong) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
      <tr>
         <td>
            <p>Danh bạ</p>
            @foreach (explode(',',$info->danhba) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
   </tbody>
</table>
<table class="table table-bordered">
   <thead class="thead-light">
      <tr>
         <th>Kết nối</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>
            <p>Mạng di động</p>
            @foreach (explode(',',$info->mangdidong) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
      <tr>
         <td>
            <p>Sim</p>
            @foreach (explode(',',$info->sim) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
      <tr>
         <td>
            <p>Wifi</p>
            @foreach (explode(',',$info->wifi) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
      <tr>
         <td>
            <p>GPS</p>
            @foreach (explode(',',$info->gps) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
      <tr>
         <td>
            <p>BlueTooth</p>
            @foreach (explode(',',$info->bluetooth) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
      <tr>
         <td>
            <p>Cổng kết nối sạc</p>
            @foreach (explode(',',$info->congsac) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
      <tr>
         <td>
            <p>Jack tai nghe</p>
            @foreach (explode(',',$info->jacktainghe) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
      <tr>
         <td>
            <p>Kết nối khác</p>
            @foreach (explode(',',$info->ketnoikhac) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
   </tbody>
</table>
<table class="table table-bordered">
   <thead class="thead-light">
      <tr>
         <th>Pin & Sạc</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>
            <p>Dung lượng pin</p>
            @foreach (explode(',',$info->dungluongpin) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
      <tr>
         <td>
            <p>Loại pin</p>
            @foreach (explode(',',$info->loaipin) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
      <tr>
         <td>
            <p>Hỗ trợ sạc tối đa</p>
            @foreach (explode(',',$info->hotrotoida) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
      <tr>
         <td>
            <p>Công nghệ pin</p>
            @foreach (explode(',',$info->congnghepin) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
   </tbody>
</table>
<table class="table table-bordered">
   <thead class="thead-light">
      <tr>
         <th>Tiện ích</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>
            <p>Bảo mật nâng cao</p>
            @foreach (explode(',',$info->baomatnangcao) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
      <tr>
         <td>
            <p>Tính năng đặc biệt</p>
            @foreach (explode(',',$info->tinhnangdacbiet) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
      <tr>
         <td>
            <p>Kháng nước bụi</p>
            @foreach (explode(',',$info->khangnuoc) as $i)
            <li>{{$i}}</li>
            @endforeach 
         </td>
      </tr>
      <tr>
         <td>
            <p>Ghi âm</p>
            @foreach (explode(',',$info->ghiam) as $i)
            <li>{{$i}}</li>
            @endforeach 
         </td>
      </tr>
      <tr>
         <td>
            <p>Xem phim</p>
            @foreach (explode(',',$info->xemphim) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
      <tr>
         <td>
            <p>Nghe nhạc</p>
            @foreach (explode(',',$info->nghenhac) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
   </tbody>
</table>
<table class="table table-bordered">
   <thead class="thead-light">
      <tr>
         <th>Thông tin chung</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>
            <p>Kích thước khối lượng</p>
            @foreach (explode(',',$info->kichthuoc) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
      <tr>
         <td>
            <p>Thời điểm ra mắt</p>
            @foreach (explode(',',$info->thoidiemramat) as $i)
            <li>{{$i}}</li>
            @endforeach
         </td>
      </tr>
   </tbody>
</table>
@elseif($product->category_id==3)
<table class="table table-bordered">
    <thead class="thead-light">
       <tr>
          <th>Kiểu màn hình</th>
       </tr>
    </thead>
    <tbody>
       <tr>
          <td>
             <p>Công nghệ màn hình</p>
             @foreach (explode(',',$info->congnghemanhinh) as $i)
             <li>{{$i}}</li>
             @endforeach            
          </td>
       </tr>
       <tr>
          <td>
             <p>Độ phân giải</p>
             @foreach (explode(',',$info->dophangiai) as $i)
             <li>{{$i}}</li>
             @endforeach           
          </td>
       </tr>
       <tr>
          <td>
             <p>Màn hình rộng</p>
             @foreach (explode(',',$info->manhinhrong) as $i)
             <li>{{$i}}</li>
             @endforeach        
          </td>
       </tr>
    </tbody>
</table>
<table class="table table-bordered">
    <thead class="thead-light">
       <tr>
          <th>Hệ điều hành & CPU</th>
       </tr>
    </thead>
    <tbody>
       <tr>
          <td>
             <p>Hệ điều hành</p>
             @foreach (explode(',',$info->hedieuhanh) as $i)
             <li>{{$i}}</li>
             @endforeach            
          </td>
       </tr>
       <tr>
          <td>
             <p>Chip xử lý</p>
             @foreach (explode(',',$info->chipxuly) as $i)
             <li>{{$i}}</li>
             @endforeach           
          </td>
       </tr>
       <tr>
          <td>
             <p>Tốc độ CPU</p>
             @foreach (explode(',',$info->tocdocpu) as $i)
             <li>{{$i}}</li>
             @endforeach        
          </td>
       </tr>
       <tr>
        <td>
           <p>Chip đồ họa</p>
           @foreach (explode(',',$info->chipdohoa) as $i)
           <li>{{$i}}</li>
           @endforeach        
        </td>
     </tr>
    </tbody>
</table>
<table class="table table-bordered">
    <thead class="thead-light">
       <tr>
          <th>Bộ nhớ & Lưu trữ</th>
       </tr>
    </thead>
    <tbody>
       <tr>
          <td>
             <p>RAM</p>
             @foreach (explode(',',$info->ram) as $i)
             <li>{{$i}}</li>
             @endforeach            
          </td>
       </tr>
       <tr>
          <td>
             <p>Bộ nhớ trong</p>
             @foreach (explode(',',$info->bonhotrong) as $i)
             <li>{{$i}}</li>
             @endforeach           
          </td>
       </tr>
       <tr>
          <td>
             <p>Bộ nhớ còn lại</p>
             @foreach (explode(',',$info->bonhoconlai) as $i)
             <li>{{$i}}</li>
             @endforeach        
          </td>
       </tr>
      
    </tbody>
</table>
<table class="table table-bordered">
    <thead class="thead-light">
       <tr>
          <th>Camera sau</th>
       </tr>
    </thead>
    <tbody>
       <tr>
          <td>
             <p>Độ phân giải camera sau</p>
             @foreach (explode(',',$info->camerasau) as $i)
             <li>{{$i}}</li>
             @endforeach            
          </td>
       </tr>
       <tr>
          <td>
             <p>Quay phim</p>
             @foreach (explode(',',$info->quayphim) as $i)
             <li>{{$i}}</li>
             @endforeach           
          </td>
       </tr>
       <tr>
          <td>
             <p>Tính năng</p>
             @foreach (explode(',',$info->tinhnang) as $i)
             <li>{{$i}}</li>
             @endforeach        
          </td>
       </tr>
    </tbody>
</table>
<table class="table table-bordered">
    <thead class="thead-light">
       <tr>
          <th>Camera trước</th>
       </tr>
    </thead>
    <tbody>
       <tr>
          <td>
             <p>Độ phân giải camera trước</p>
             @foreach (explode(',',$info->cameratruoc) as $i)
             <li>{{$i}}</li>
             @endforeach            
          </td>
       </tr>
       <tr>
          <td>
             <p>Tính năng camera trước</p>
             @foreach (explode(',',$info->tinhnangcameratruoc) as $i)
             <li>{{$i}}</li>
             @endforeach           
          </td>
       </tr>
    </tbody>
</table>
<table class="table table-bordered">
    <thead class="thead-light">
       <tr>
          <th>Kết nối</th>
       </tr>
    </thead>
    <tbody>
       <tr>
          <td>
             <p>Mạng di động</p>
             @foreach (explode(',',$info->mangdidong) as $i)
             <li>{{$i}}</li>
             @endforeach            
          </td>
       </tr>
       <tr>
          <td>
             <p>Sim</p>
             @foreach (explode(',',$info->sim) as $i)
             <li>{{$i}}</li>
             @endforeach           
          </td>
       </tr>
       <tr>
          <td>
             <p>Thực hiện cuộc gọi</p>
             @foreach (explode(',',$info->cuocgoi) as $i)
             <li>{{$i}}</li>
             @endforeach        
          </td>
       </tr>
       <tr>
        <td>
           <p>Wifi</p>
           @foreach (explode(',',$info->wifi) as $i)
           <li>{{$i}}</li>
           @endforeach        
        </td>
     </tr>
     <tr>
        <td>
           <p>GPS</p>
           @foreach (explode(',',$info->gps) as $i)
           <li>{{$i}}</li>
           @endforeach        
        </td>
     </tr>
     <tr>
        <td>
           <p>Bluetooth</p>
           @foreach (explode(',',$info->bluetooth) as $i)
           <li>{{$i}}</li>
           @endforeach        
        </td>
     </tr>
     <tr>
        <td>
           <p>Cổng kết nối</p>
           @foreach (explode(',',$info->congketnoi) as $i)
           <li>{{$i}}</li>
           @endforeach        
        </td>
     </tr>
     <tr>
        <td>
           <p>Jack tai nghe</p>
           @foreach (explode(',',$info->jacktainghe) as $i)
           <li>{{$i}}</li>
           @endforeach        
        </td>
     </tr>
    </tbody>
</table>
<table class="table table-bordered">
    <thead class="thead-light">
       <tr>
          <th>Tiện ích</th>
       </tr>
    </thead>
    <tbody>
       <tr>
          <td>
             <p>Tính năng đặc biệt</p>
             @foreach (explode(',',$info->tinhnangdacbiet) as $i)
             <li>{{$i}}</li>
             @endforeach            
          </td>
       </tr>
       
    </tbody>
</table>
<table class="table table-bordered">
    <thead class="thead-light">
       <tr>
          <th>Pin & Sạc</th>
       </tr>
    </thead>
    <tbody>
       <tr>
          <td>
             <p>Dung lượng pin</p>
             @foreach (explode(',',$info->dungluongpin) as $i)
             <li>{{$i}}</li>
             @endforeach            
          </td>
       </tr>
       <tr>
          <td>
             <p>Loại pin</p>
             @foreach (explode(',',$info->loaipin) as $i)
             <li>{{$i}}</li>
             @endforeach           
          </td>
       </tr>
       <tr>
        <td>
           <p>Công nghệ pin</p>
           @foreach (explode(',',$info->congnghepin) as $i)
           <li>{{$i}}</li>
           @endforeach           
        </td>
     </tr>
     <tr>
        <td>
           <p>Hỗ trợ sạc tối đa</p>
           @foreach (explode(',',$info->hotrotoida) as $i)
           <li>{{$i}}</li>
           @endforeach           
        </td>
     </tr>
     <tr>
        <td>
           <p>Sạc kèm theo máy</p>
           @foreach (explode(',',$info->sackemmay) as $i)
           <li>{{$i}}</li>
           @endforeach           
        </td>
     </tr>
    </tbody>
</table>
<table class="table table-bordered">
    <thead class="thead-light">
       <tr>
          <th>Thông tin chung</th>
       </tr>
    </thead>
    <tbody>
       <tr>
          <td>
             <p>Chất liệu</p>
             @foreach (explode(',',$info->chatluong) as $i)
             <li>{{$i}}</li>
             @endforeach            
          </td>
       </tr>
       <tr>
          <td>
             <p>Kích thước khối lượng</p>
             @foreach (explode(',',$info->kichthuoc) as $i)
             <li>{{$i}}</li>
             @endforeach           
          </td>
       </tr>
       <tr>
        <td>
           <p>Thời điểm ra mắt</p>
           @foreach (explode(',',$info->ngayramat) as $i)
           <li>{{$i}}</li>
           @endforeach           
        </td>
     </tr>
    </tbody>
</table>
<table class="table table-bordered">
    <thead class="thead-light">
       <tr>
          <th></th>
       </tr>
    </thead>
    <tbody>
       <tr>
          <td>
             <p>Tình trạng</p>
             @foreach (explode(',',$info->tinhtrang1) as $i)
             <li>{{$i}}</li>
             @endforeach            
          </td>
       </tr>
       <tr>
          <td>
             <p>Nguồn gốc</p>
             @foreach (explode(',',$info->nguongoc) as $i)
             <li>{{$i}}</li>
             @endforeach           
          </td>
       </tr>
       
    </tbody>
</table>
@elseif($product->category_id==4)
<table class="table table-bordered">
   <thead class="thead-light">
      <tr>
         <th></th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>
            <p>Công nghệ CPU</p>
            @foreach (explode(',',$info->congnghecpu) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
      </tr>
      <tr>
         <td>
            <p>Tốc độ CPU</p>
            @foreach (explode(',',$info->tocdocpu) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
      </tr>     
      <tr>
         <td>
            <p>Tốc độ tối đa</p>
            @foreach (explode(',',$info->tocdotoida) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
      </tr>     
      <tr>
         <td>
            <p>RAM</p>
            @foreach (explode(',',$info->ram) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
      </tr>     
      <tr>
         <td>
            <p>Loại ram</p>
            @foreach (explode(',',$info->loairam) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
      </tr>     
      <tr>
         <td>
            <p>Tốc độ Bus RAM</p>
            @foreach (explode(',',$info->tocdobusram) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
      </tr>     
      <tr>
         <td>
            <p>Hỗ trợ RAM tối đa</p>
            @foreach (explode(',',$info->ramtoida) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
      </tr>     
      <tr>
         <td>
            <p>Ổ cứng</p>
            @foreach (explode(',',$info->ocung) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
      </tr>          
   </tbody>
</table>
<table class="table table-bordered">
   <thead class="thead-light">
      <tr>
         <th>Kiểu màn hình</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>
            <p>Màn hình</p>
            @foreach (explode(',',$info->manhinh) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
      </tr>
      <tr>
         <td>
            <p>Độ phân giải</p>
            @foreach (explode(',',$info->dophangiai) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
      </tr>
      <tr>
         <td>
            <p>Công nghệ màn hình</p>
            @foreach (explode(',',$info->congnghemanhinh) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
      </tr>
   </tbody>
</table>
<table class="table table-bordered">
   <thead class="thead-light">
      <tr>
         <th>Đồ họa và Âm thanh</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>
            <p>Card màn hình</p>
            @foreach (explode(',',$info->cardmanhinh) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
         
      </tr>
      <tr>
         <td>
            <p>Công nghệ âm thanh</p>
            @foreach (explode(',',$info->congngheamthanh) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
      </tr>
   </tbody>
</table>
<table class="table table-bordered">
   <thead class="thead-light">
      <tr>
         <th>Cổng kết nối & tính năng mở rộng</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>
            <p>Cổng giao tiếp</p>
            @foreach (explode(',',$info->conggiaotiep) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
      </tr>
      <tr>
         <td>
            <p>Kết nối không dây</p>
            @foreach (explode(',',$info->ketnoikhongday) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
      </tr>
      <tr>
         <td>
            <p>Webcam</p>
            @foreach (explode(',',$info->webcam) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
      </tr>
      <tr>
         <td>
            <p>Tính năng khác</p>
            @foreach (explode(',',$info->tinhnangkhac) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
      </tr>
      <tr>
         <td>
            <p>Đèn bàn phím</p>
            @foreach (explode(',',$info->denbanphim) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
      </tr>
   </tbody>
</table>
<table class="table table-bordered">
   <thead class="thead-light">
      <tr>
         <th>Kích thước & trọng lượng</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>
            <p>Kích thước, trọng lượng</p>
            @foreach (explode(',',$info->kichthuoc) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
         
      </tr>
      <tr>
         <td>
            <p>Chất liệu</p>
            @foreach (explode(',',$info->chatlieu) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
      </tr>
   </tbody>
</table>
<table class="table table-bordered">
   <thead class="thead-light">
      <tr>
         <th>Thông tin khác</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>
            <p>Thông tin Pin</p>
            @foreach (explode(',',$info->thongtinpin) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
         
         
      </tr>
      <tr>
         <td>
            <p>Hệ điều hành</p>
            @foreach (explode(',',$info->hedieuhanh) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
      </tr>
      <tr>
         <td>
            <p>Thời điểm ra mắt</p>
            @foreach (explode(',',$info->thoigianramat) as $i)
            <li>{{$i}}</li>
            @endforeach            
         </td>
      </tr>
   </tbody>
</table>


@endif