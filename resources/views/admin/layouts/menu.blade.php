<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{route('admin.dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản trị</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{route('category.index')}}">Danh mục</a></li>
						<li><a href="{{route('cate.index')}}">Danh mục con</a></li>
                        <li><a href="{{route('product.index')}}">Sản phẩm</a></li>
                        <li><a href="{{route('coupon.index')}}">Mã giảm giá</a></li>
                        <li><a href="{{route('order.index')}}">Đơn hàng</a></li>
                    </ul>
                </li>
                
        <!-- sidebar menu end-->
    </div>
</aside>