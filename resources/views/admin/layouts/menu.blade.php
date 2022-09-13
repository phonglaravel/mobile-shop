<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a id="a1" href="{{route('admin.dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a id="a2" href="{{route('category.index')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Danh mục</span>
                    </a>
                </li>
                <li>
                    <a id="a3" href="{{route('cate.index')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Danh mục con</span>
                    </a>
                </li>
                <li>
                    <a id="a4" href="{{route('product.index')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Sản phẩm</span>
                    </a>
                </li>
                <li>
                    <a id="a5" href="{{route('order.index')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Đơn hàng</span>
                    </a>
                </li>
                <li>
                    <a id="a6" href="{{route('coupon.index')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Mã giảm giá</span>
                    </a>
                </li>
                <li>
                    <a id="a7" href="{{route('blog.index')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Bài viết</span>
                    </a>
                </li>
                
                
                
        <!-- sidebar menu end-->
    </div>
</aside>
@if (Request::is('admincp'))
<script>
    $('#a1').addClass('active');
</script>
@elseif(Request::is('admincp/category') || Request::is('admincp/category/*'))
<script>
    $('#a2').addClass('active');
</script>
@elseif(Request::is('admincp/cate') || Request::is('admincp/cate/*'))
<script>
    $('#a3').addClass('active');
</script>
@elseif(Request::is('admincp/product') || Request::is('admincp/product/*'))
<script>
    $('#a4').addClass('active');
</script>
@elseif(Request::is('admincp/order') || Request::is('admincp/order/*'))
<script>
    $('#a5').addClass('active');
</script>
@elseif(Request::is('admincp/coupon') || Request::is('admincp/coupon/*'))
<script>
    $('#a6').addClass('active');
</script>
@elseif(Request::is('admincp/blog') || Request::is('admincp/blog/*'))
<script>
    $('#a7').addClass('active');
</script>
@endif
