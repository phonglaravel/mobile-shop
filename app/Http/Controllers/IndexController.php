<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Cate;
use App\Models\Category;
use App\Models\Coupon;

use App\Mail\OrderMail;
use App\Models\CommentProduct;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductCate;
use App\Models\ProductColorPrice;
use App\Models\ProductDungluong;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;



class IndexController extends Controller
{
    public function index()
    {
        $to_day = Carbon::now('Asia/Ho_Chi_minh')->format('M d, Y'); 
        $sale = Product::where('day_start','<=',$to_day)->where('day_end','>=',$to_day)->where('amount_sale','>',0)->get();
       
        $categories = Category::orderBy('id','ASC')->get();
        $banner = Product::orderBy('id','DESC')->whereNotNull('banner')->take(3)->get();   

        $category_skip_0 = Category::skip(0)->first();
        $product_skip_0 = Product::orderBy('order_count','DESC')->where('category_id',$category_skip_0->id)->take(8)->get();   
        
        $category_skip_1 = Category::skip(1)->first();
        $product_skip_1 = Product::orderBy('order_count','DESC')->where('category_id',$category_skip_1->id)->take(8)->get();
        
        $category_skip_2 = Category::skip(2)->first();
        $product_skip_2 = Product::orderBy('order_count','DESC')->where('category_id',$category_skip_2->id)->take(8)->get(); 
        
        $category_skip_3 = Category::skip(3)->first();
        $product_skip_3 = Product::orderBy('order_count','DESC')->where('category_id',$category_skip_3->id)->take(8)->get();
    
        $category_skip_4 = Category::skip(4)->first();
        $product_skip_4 = Product::orderBy('order_count','DESC')->where('category_id',$category_skip_4->id)->take(8)->get();
        
        $category_skip_5 = Category::skip(5)->first();
        $product_skip_5 = Product::orderBy('order_count','DESC')->where('category_id',$category_skip_5->id)->take(8)->get();
        
        return view('page.index',
        compact('categories','banner','category_skip_0',
        'product_skip_0','category_skip_1','product_skip_1','category_skip_2','product_skip_2',
        'category_skip_3','product_skip_3'
        ,'category_skip_4','product_skip_4','category_skip_5','product_skip_5','sale','to_day'));
    }
    public function category($slug)
    {
        $to_day = Carbon::now('Asia/Ho_Chi_minh')->format('M d, Y');
        $categories = Category::orderBy('id','ASC')->get();
        $category = Category::where('slug_category',$slug)->first();
        $products = Product::orderBy('id','DESC')->where('category_id',$category->id)->get();
        $check = [];
        return view('page.category', compact('category','categories','products','check','to_day'));
    }
    public function cate($slug_category,$slug_cate)
    {
        $to_day = Carbon::now('Asia/Ho_Chi_minh')->format('M d, Y');
        $categories = Category::orderBy('id','ASC')->get();
        $category = Category::where('slug_category',$slug_category)->first();
        $cate = Cate::where('slug_cate',$slug_cate)->first();
        $product_cate = ProductCate::where('cate_id',$cate->id)->get();
         $productsrr = [];
        foreach($product_cate as $item){
             $productsrr[] = $item->product_id;
        }
        $products = Product::orderBy('id','DESC')->whereIn('id', $productsrr)->get();
        $check = [];
        $check[] = $cate->slug_cate;
        return view('page.cate', compact('category','categories','products','cate','check','to_day'));
    }
    public function product($slug_category,$slug_product,$slug_dungluong)
    {
        $to_day = Carbon::now('Asia/Ho_Chi_minh')->format('M d, Y');
        $categories = Category::orderBy('id','ASC')->get();
        $category = Category::where('slug_category',$slug_category)->first();
       $product = Product::where('slug_product',$slug_product)->first();
       $product_dungluong = ProductDungluong::where('product_id',$product->id)->where('slug_dungluong',$slug_dungluong)->first();
       $product_color_price = ProductColorPrice::where('dungluong_id',$product_dungluong->id)->get();
       $lienquan = Product::orderBy('id','DESC')->where('category_id',$category->id)->take(5)->get();
       $comments = CommentProduct::orderBy('id','DESC')->where('product_id',$product->id)->get();
       $star = $comments->avg('star');
       return view('page.product', compact('star','comments','to_day','lienquan','categories','product','category','product_dungluong','product_color_price'));
    }
    public function product1($slug_category,$slug_product)
    {
        $to_day = Carbon::now('Asia/Ho_Chi_minh')->format('M d, Y');
        $categories = Category::orderBy('id','ASC')->get();
        $category = Category::where('slug_category',$slug_category)->first();
       $product = Product::where('slug_product',$slug_product)->first();
       $comments = CommentProduct::orderBy('id','DESC')->where('product_id',$product->id)->get();
       $product_color_price = ProductColorPrice::where('product_id',$product->id)->get();
       $lienquan = Product::orderBy('id','DESC')->where('category_id',$category->id)->take(5)->get();
       $star = $comments->avg('star');
       return view('page.product', compact('star','comments','lienquan','categories','product','category','product_color_price','to_day'));
    }
    public function cart()
    {
        // dd(Session::get('sale'));
        $categories = Category::orderBy('id','ASC')->get();
        return view('page.cart', compact('categories'));
    }
    public function save_cart(Request $request,$id)
    {
        $to_day = Carbon::now('Asia/Ho_Chi_minh')->format('M d, Y');
        $pro_color = ProductColorPrice::where('id',$request->pro_color)->first();
       if($request->qty > $pro_color->qty){
        return back()->with('error_qty','Vượt quá số lượng tồn kho');
       }else{
        $product = Product::find($id);
        if($product->amount_sale > 0&& $product->day_start<=$to_day && $product->day_end>=$to_day){
            if($request->qty>1){
                return back()->with('error_qty','Chỉ được mua 1 sản phẩm giảm giá');
            }
            else{
                $product->amount_sale = $product->amount_sale - $request->qty;
                $product->save();
                $data['id'] = $product->id;
                $data['qty'] = $request->qty;
                $data['name'] = $product->title;
                $data['price'] = $request->price;
                $data['weight'] = 0;
                $data['options']['image']= $product->image;
                $data['options']['color_id']= $pro_color->id;
                Cart::add($data);
                
                $pro_color->qty =  $pro_color->qty - $request->qty;
                $pro_color->save();   
                Session::push('sale',$product->id);
                Session::save();
                return back();
            }
            
        }else{
            $data['id'] = $product->id;
                $data['qty'] = $request->qty;
                $data['name'] = $product->title;
                $data['price'] = $request->price;
                $data['weight'] = 0;
                $data['options']['image']= $product->image;
                $data['options']['color_id']= $pro_color->id;
                Cart::add($data);
                
                $pro_color->qty =  $pro_color->qty - $request->qty;
                $pro_color->save();   
                return back();
        }
        
       }
    }
    public function delete_cart($id)
    {
        $rowId = $id;  
        $product = Product::find(Cart::get($rowId)->id);
        if(Session::has('sale')){  
            $ar = [];  
            foreach(Session::get('sale') as $item){
                
                if($item == $product->id){
                    $product->amount_sale = $product->amount_sale + 1;
                    $product->save();
                   
                }else{
                    $ar[] = $item;
                }
            }
            if(count($ar)==0){
                Session::forget('sale');
            }else{
                Session::forget('sale');
                Session::put('sale',$ar);
            }       
           
            
        }
        
        $qty = ProductColorPrice::find(Cart::get($rowId)->options->color_id);
        $qty->qty = $qty->qty + Cart::get($rowId)->qty;
        $qty->save();
        Cart::remove($rowId);
        
        return back();
    }
    public function qty_down($id,$qty)
    {
        $rowId = $id;
        $qty = $qty -1 ;
        Cart::update($rowId,$qty);
        $qty = ProductColorPrice::find(Cart::get($rowId)->options->color_id);
        $qty->qty = $qty->qty + 1;
        $qty->save();
        return back();
    }
    public function qty_up($id,$qty)
    {
        $rowId = $id;
        $qty = $qty +1 ;
        Cart::update($rowId,$qty);
        $qty = ProductColorPrice::find(Cart::get($rowId)->options->color_id);
        $qty->qty = $qty->qty - 1;
        $qty->save();
        return back();
    }
    public function check_coupon(Request $request)
    {
        $coupon = Coupon::where('title',$request->title)->first();
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');
        
       
            if($coupon){           
                if($coupon->amount==0){
                    return back()->with('error_coupon','Mã giảm giá đã hết');
                }elseif($coupon->day_end<$today){
                    return back()->with('error_coupon','Mã giảm giá đã hết hạn sử dụng');
                }elseif($coupon->day_start>$today){
                    return back()->with('error_coupon','Mã giảm giá không đúng');
                }elseif($coupon->condition>Cart::subTotal(0,',','')){
                    return back()->with('error_coupon','Không đủ điều kiện nhận mã này');
                }
                else{
                    Session::put('coupon',$coupon);
                    Session::save();
                    $coupon->amount = $coupon->amount - 1;
                    $coupon->save();
                    return back();
                }
            }else{
                return back()->with('error_coupon','Mã không đúng');
            }
        
        
    }
    public function delete_coupon(){
        $coupon = Coupon::where('id',Session::get('coupon')->id)->first();
        $coupon->amount = $coupon->amount + 1;
        $coupon->save();
        Session::forget('coupon');
        return back();
    }
    public function checkout()
    {
        $categories = Category::orderBy('id','ASC')->get();
        return view('page.checkout', compact('categories'));
    }
    public function send_checkout(CheckoutRequest $request)
    {
        
        $order = new Order();
        $order->name = $request->name;
        $order->nickname = $request->nickname;
        $order->email = $request->email;
        $order->phone	 = $request->phone;
        $order->address1 = $request->address1;
        $order->address2 = $request->address2;
        $order->tinh = $request->tinh;
        $order->huyen = $request->huyen;
        $order->status = 'Đang chờ xử lý';
        $order->ngaytao = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');
        $order->thang = Carbon::now('Asia/Ho_Chi_Minh')->format('m/Y');
        if(Session::has('coupon')){
            $order->total = Cart::subTotal(0,',','') - Session::get('coupon')->price;
        }else{
            $order->total = Cart::subTotal(0,',','');
        }
        $order->payment = $request->payment;
        $order->save();
        $data = [];
        foreach(Cart::content() as $item){
            $data[] = $item->qty.' '.$item->name.' giá '.$item->price.'. Tổng tiền'.$item->price*$item->qty;
            $order_detail = new OrderDetail();
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $item->id;
            $order_detail->product_name = $item->name;
            $order_detail->price = $item->price;
            $order_detail->qty = $item->qty;
            $color = ProductColorPrice::where('id',$item->options->color_id)->first();
            $order_detail->color = $color->color;
            if($color->dungluong_id!=null){
                $order_detail->dungluong = $color->product_dungluong->dungluong;
            }
            $order_detail->save();
            $product = Product::find($item->id);
            $product->order_count = $product->order_count + $item->qty;
            $product->save();     
        }
        $email = $request->email;
        Mail::to($email)->send(new OrderMail($email,$data));
        Cart::destroy();
        Session::forget('coupon');
       
        Session::forget('sale');
        
        return back()->with('success','Đặt hàng thành công chúng tôi sẽ liên hệ bạn');
        

    }
    public function filter(Request $request, $slug)
    {
        
        $categories = Category::orderBy('id','ASC')->get();
        $category = Category::where('slug_category',$slug)->first();
       
        
        if($request->gia!=null && $request->cate==null){
            $products = new Collection([]);       
            $check = new Collection([]);
        foreach($request->gia as $item){
            if($item=='duoi-2-trieu'){
                $a = Product::orderBy('id','DESC')->where('price','<',2000000)->where('category_id',$category->id)->get();
                $products = $products->merge($a);
                $check = $check->merge('duoi-2-trieu');
            }
            if($item=='2-4-trieu'){
                 $a = Product::orderBy('id','DESC')->where('price','>=',2000000)->where('price','<',4000000)->where('category_id',$category->id)->get();
                 $products = $products->merge($a);
                 $check = $check->merge('2-4-trieu');
            }
            if($item=='4-10-trieu'){
                 $a = Product::orderBy('id','DESC')->where('price','>=',4000000)->where('price','<',10000000)->where('category_id',$category->id)->get();
                 $products = $products->merge($a);
                 $check = $check->merge('4-10-trieu');
            }
            if($item=='10-20-trieu'){
                 $a = Product::orderBy('id','DESC')->where('price','>=',10000000)->where('price','<',20000000)->where('category_id',$category->id)->get();
                 $products = $products->merge($a);
                 $check = $check->merge('10-20-trieu');
                 
            }
            if($item=='tren-20-trieu'){
                 $a = Product::orderBy('id','DESC')->where('price','>=',20000000)->where('category_id',$category->id)->get();
                 $products = $products->merge($a);
                 $check = $check->merge('tren-20-trieu');
            }
            if($item=='duoi-10-trieu'){
                $a = Product::orderBy('id','DESC')->where('price','<',10000000)->where('category_id',$category->id)->get();
                $products = $products->merge($a);
                $check = $check->merge('duoi-10-trieu');
           }
        }
        
        }elseif($request->gia!=null && $request->cate!=null){
            $products = new Collection([]);       
            $check = new Collection([]);
            $b = [];
            foreach($request->cate as $item){
                $cate = Cate::where('slug_cate',$item)->first();
                $product_cate = ProductCate::where('cate_id',$cate->id)->get();
                foreach($product_cate as $i){
                    $b[] = $i->product_id; 
                }
                
                $check = $check->merge($item);
            }
            foreach($request->gia as $item){
                if($item=='duoi-2-trieu'){
                    $a = Product::orderBy('id','DESC')->where('price','<',2000000)->where('category_id',$category->id)->whereIn('id',$b)->get();
                    $products = $products->merge($a);
                    $check = $check->merge('duoi-2-trieu');
                }
                if($item=='2-4-trieu'){
                     $a = Product::orderBy('id','DESC')->where('price','>=',2000000)->where('price','<',4000000)->where('category_id',$category->id)->whereIn('id',$b)->get();
                     $products = $products->merge($a);
                     $check = $check->merge('2-4-trieu');
                }
                if($item=='4-10-trieu'){
                     $a = Product::orderBy('id','DESC')->where('price','>=',4000000)->where('price','<',10000000)->where('category_id',$category->id)->whereIn('id',$b)->get();
                     $products = $products->merge($a);
                     $check = $check->merge('4-10-trieu');
                }
                if($item=='10-20-trieu'){
                     $a = Product::orderBy('id','DESC')->where('price','>=',10000000)->where('price','<',20000000)->where('category_id',$category->id)->whereIn('id',$b)->get();
                     $products = $products->merge($a);
                     $check = $check->merge('10-20-trieu');
                     
                }
                if($item=='tren-20-trieu'){
                     $a = Product::orderBy('id','DESC')->where('price','>=',20000000)->where('category_id',$category->id)->whereIn('id',$b)->get();
                     $products = $products->merge($a);
                     $check = $check->merge('tren-20-trieu');
                }
            }
        }elseif($request->gia==null && $request->cate!=null){
               
            $check = new Collection([]);
            $b = [];
            foreach($request->cate as $item){
                $cate = Cate::where('slug_cate',$item)->first();
                $product_cate = ProductCate::where('cate_id',$cate->id)->get();
               
                foreach($product_cate as $i){
                    $b[] = $i->product_id; 
                }
                
                $check = $check->merge($item);
            }
            $products = Product::orderBy('id','DESC')->whereIn('id',$b)->get();
        }
        else{
            
            $products = Product::orderBy('id','DESC')->where('category_id',$category->id)->get();
            $check = [];
            
        }
        
        return view('page.filter', compact('category','categories','products','check'));
    }
    public function search(Request $request)
    {
        $to_day = Carbon::now('Asia/Ho_Chi_minh')->format('M d, Y');
        $categories = Category::orderBy('id','ASC')->get();
        $products = Product::where('title','LIKE','%'.$request->keyword.'%')->get();
        $keyword = $request->keyword;
        return view('page.search', compact('categories','products','to_day','keyword'));
    }
    public function search_ajax(Request $request)
    {
        if($request->keyword){
            $products = Product::where('title','LIKE','%'.$request->keyword.'%')->take(10)->get();
            $output ='';
            foreach($products as $item){
                if($item->product_dungluong->count()==0){
                    $output.= '<a href="'.route('page.product1',[$item->category->slug_category,$item->slug_product]).'" class="form-control" style="height:40px;width:100%;text-decoration: none">
                    <img style="height: 100%" src="'.asset('image/products/'.$item->image).'" alt="">
                
                '.$item->title.'
                
                </a>';
                }else{
                    $output.= '<a href="'.route('page.product',[$item->category->slug_category,$item->slug_product,$item->product_dungluong->first()->slug_dungluong]).'" class="form-control" style="height:40px;width:100%;text-decoration: none">
                    <img style="height: 100%" src="'.asset('image/products/'.$item->image).'" alt="">
                    
                    '.$item->title.'
                    
                    </a>';
                }
               
            }
        }
        echo $output;
        
        
    }
    public function search_ajax1(Request $request)
    {
        if($request->keyword){
            $products = Product::where('title','LIKE','%'.$request->keyword.'%')->take(10)->get();
            $output ='';
            foreach($products as $item){
                
                    $output.= '<a onclick="add('.$item->id.')" class="form-control" style="height:40px;width:100%;text-decoration: none">
                    <img style="height: 100%" src="'.asset('image/products/'.$item->image).'" alt="">
                    
                '.$item->title.'
                
                </a>
                <input type="hidden" id="image'.$item->id.'" value="'.$item->image.'">
                <input type="hidden" id="category'.$item->id.'" value="'.$item->category->title.'">
                <input type="hidden" id="title'.$item->id.'" value="'.$item->title.'">
                ';
                
                
               
            }
        }
        echo $output;
        
        
    }
    public function comment(Request $request,$id)
    {
        $comment = new CommentProduct();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->content = $request->content;
        $comment->star = $request->star;
        $comment->date = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');
        $comment->product_id = $request->id;
        $comment->save();
        return back();
    }
    public function compare2($id0, $id1){
       
        $categories = Category::orderBy('id','ASC')->get();
        $products = Product::whereIn('id',[$id0,$id1])->get();
        return view('page.compare', compact('products','categories'));
    }
    public function compare3($id0, $id1, $id2){
       
        $categories = Category::orderBy('id','ASC')->get();
        $products = Product::whereIn('id',[$id0,$id1,$id2])->get();
        return view('page.compare', compact('products','categories'));
    }
}
