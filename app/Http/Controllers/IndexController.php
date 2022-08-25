<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Cate;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductCate;
use App\Models\ProductColorPrice;
use App\Models\ProductDungluong;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Session\Session as SessionSession;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;


class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id','ASC')->get();
        $banner = Product::orderBy('id','DESC')->whereNotNull('banner')->take(3)->get();
        return view('page.index',compact('categories','banner'));
    }
    public function category($slug)
    {
        $categories = Category::orderBy('id','ASC')->get();
        $category = Category::where('slug_category',$slug)->first();
        $products = Product::orderBy('id','DESC')->where('category_id',$category->id)->get();
        $check = [];
        return view('page.category', compact('category','categories','products','check'));
    }
    public function cate($slug_category,$slug_cate)
    {
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
        return view('page.cate', compact('category','categories','products','cate','check'));
    }
    public function product($slug_category,$slug_product,$slug_dungluong)
    {
        $categories = Category::orderBy('id','ASC')->get();
        $category = Category::where('slug_category',$slug_category)->first();
       $product = Product::where('slug_product',$slug_product)->first();
       $product_dungluong = ProductDungluong::where('product_id',$product->id)->where('slug_dungluong',$slug_dungluong)->first();
       $product_color_price = ProductColorPrice::where('dungluong_id',$product_dungluong->id)->get();
       $lienquan = Product::orderBy('id','DESC')->where('category_id',$category->id)->take(5)->get();
       return view('page.product', compact('lienquan','categories','product','category','product_dungluong','product_color_price'));
    }
    public function product1($slug_category,$slug_product)
    {
        $categories = Category::orderBy('id','ASC')->get();
        $category = Category::where('slug_category',$slug_category)->first();
       $product = Product::where('slug_product',$slug_product)->first();
       
       $product_color_price = ProductColorPrice::where('product_id',$product->id)->get();
       $lienquan = Product::orderBy('id','DESC')->where('category_id',$category->id)->take(5)->get();
       return view('page.product', compact('lienquan','categories','product','category','product_color_price'));
    }
    public function cart()
    {
        $categories = Category::orderBy('id','ASC')->get();
        return view('page.cart', compact('categories'));
    }
    public function save_cart(Request $request,$id)
    {
       
        $pro_color = ProductColorPrice::where('id',$request->pro_color)->first();
       if($request->qty > $pro_color->qty){
        return back()->with('error_qty','Vượt quá số lượng tồn kho');
       }
       else{
        $product = Product::find($id);
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
    public function delete_cart($id)
    {
        $rowId = $id;  
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
        $order->ngaytao = Carbon::now('Asia/Ho_Chi_Minh')->format('h:i:s d/m/Y');
        if(Session::has('coupon')){
            $order->total = Cart::subTotal(0,',','') - Session::get('coupon')->price;
        }else{
            $order->total = Cart::subTotal(0,',','');
        }
        $order->payment = $request->payment;
        $order->save();
        foreach(Cart::content() as $item){
            $order_detail = new OrderDetail();
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $item->id;
            $order_detail->product_name = $item->name;
            $order_detail->price = $item->price;
            $order_detail->qty = $item->qty;
            $order_detail->save();
        }
        Cart::destroy();
        Session::forget('coupon');
        return back()->with('success','Đặt hàng thành công chúng tôi sẽ liên hệ bạn');
        

    }
    public function filter(Request $request, $slug)
    {
        
        $categories = Category::orderBy('id','ASC')->get();
        $category = Category::where('slug_category',$slug)->first();
        $check = new Collection([]);
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
               //aaaaaaaaaaaaaaaa
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
}
