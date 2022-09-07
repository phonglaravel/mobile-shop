@extends('admin.layouts.master')
@section('title')
<title>Dashbord</title>
@endsection
@section('content')

  <div>
    <span>Doanh số trong ngày {{$ngay}}: </span><span>{{number_format($doanhso_ngay,0,',','.')}} đ</span>
  </div>
  <div>
    <span>Doanh số trong tháng {{$thang}}: </span><span>{{number_format($doanhso_thang,0,',','.')}} đ</span>
  </div>
@endsection