<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Cate;
use App\Models\InfoLaptop;
use App\Models\InfoMobile;
use App\Models\InfoTablet;
use App\Models\Product;
use App\Models\ProductCate;
use App\Models\ProductColorPrice;
use App\Models\ProductDungluong;
use App\Models\ProductImage;
use App\Models\ProductRam;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','DESC')->get();
        return view('admin.product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
       
        $product = new Product();
        $product->title = $request->title;       
        $product->slug_product = Str::slug($request->title);
        $product->category_id	 = $request->category_id;
        $product->tinhtrang	 = $request->tinhtrang;
        $product->bosanpham	 = $request->bosanpham;
        $product->baohanh	 = $request->baohanh;
        $product->goibaohanh	 = $request->goibaohanh;
        $product->description	 = $request->description;
        $product->kithuat	 = $request->kithuat;
        $product->status	 = $request->status;
        $product->sale	 = $request->sale;
        $product->amount_sale	 = $request->amount_sale;
        $product->day_start	 = $request->day_start;
        $product->day_end	 = $request->day_end;
        $product->order_count = 0;
        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $extension = $file->getClientOriginalExtension();
            if (strcasecmp($extension, 'jpg')=== 0
                ||strcasecmp($extension, 'png')=== 0
                ||strcasecmp($extension, 'jepg')=== 0) {
                  $image =Str::slug($request->title).'_'.Str::random(5).'.'.$extension;
                while (file_exists("image/products/banner/". $image))
                  $image = Str::slug($request->title).'_'.Str::random(5).'.'.$extension;
                  $file->move('image/products/banner/', $image);
                  $product->banner = $image;                 
                }
           }
        $product->save();

        if($product->category_id==1){
            $info = new InfoMobile();
            $info->product_id = $product->id;
            $info->congnghemanhinh = $request->congnghemanhinh;
            $info->dophangiai = $request->dophangiai;
            $info->manhinhrong = $request->manhinhrong;
            $info->dosangtoida = $request->dosangtoida;
            $info->matkinhcamung = $request->matkinhcamung;
            $info->camerasau = $request->camerasau;
            $info->quayphim = $request->quayphim;
            $info->denflash = $request->denflash;
            $info->cameratruoc = $request->cameratruoc;
            $info->chipxuly = $request->chipxuly;
            $info->cpu = $request->cpu;
            $info->chipdohoa = $request->chipdohoa;
            $info->ram = $request->ram;
            $info->bonhotrong = $request->bonhotrong;
            $info->danhba = $request->danhba;
            $info->mangdidong = $request->mangdidong;
            $info->sim = $request->sim;
            $info->wifi = $request->wifi;
            $info->gps = $request->gps;
            $info->bluetooth = $request->bluetooth;
            $info->congsac = $request->congsac;
            $info->jacktainghe = $request->jacktainghe;
            $info->ketnoikhac = $request->ketnoikhac;
            $info->dungluongpin = $request->dungluongpin;
            $info->loaipin = $request->loaipin;
            $info->hotrotoida = $request->hotrotoida;
            $info->congnghepin = $request->congnghepin;
            $info->baomatnangcao = $request->baomatnangcao;
            $info->tinhnangdacbiet = $request->tinhnangdacbiet;
            $info->khangnuoc = $request->khangnuoc;
            $info->ghiam = $request->ghiam;
            $info->xemphim = $request->xemphim;
            $info->nghenhac = $request->nghenhac;
            $info->kichthuoc = $request->kichthuoc;
            $info->thoidiemramat = $request->thoidiemramat;
            $info->save();
        }elseif($product->category_id==3){
            $info = new InfoTablet();
            $info->product_id = $product->id;
            $info->congnghemanhinh = $request->congnghemanhinh;
            $info->dophangiai = $request->dophangiai;
            $info->manhinhrong = $request->manhinhrong;
            $info->hedieuhanh = $request->hedieuhanh;
            $info->chipxuly = $request->chipxuly;
            $info->tocdocpu = $request->tocdocpu;
            $info->chipdohoa = $request->chipdohoa;
            $info->ram = $request->ram;
            $info->bonhotrong = $request->bonhotrong;
            $info->bonhoconlai = $request->bonhoconlai;
            $info->camerasau = $request->camerasau;
            $info->quayphim = $request->quayphim;
            $info->tinhnang = $request->tinhnang;
            $info->cameratruoc = $request->cameratruoc;
            $info->tinhnangcameratruoc = $request->tinhnangcameratruoc;
            $info->mangdidong = $request->mangdidong;
            $info->sim = $request->sim;
            $info->cuocgoi = $request->cuocgoi;
            $info->wifi = $request->wifi;
            $info->gps = $request->gps;
            $info->bluetooth = $request->bluetooth;
            $info->congketnoi = $request->congketnoi;
            $info->jacktainghe = $request->jacktainghe;
            $info->tinhnangdacbiet = $request->tinhnangdacbiet;
            $info->dungluongpin = $request->dungluongpin;
            $info->loaipin = $request->loaipin;
            $info->congnghepin = $request->congnghepin;
            $info->hotrotoida = $request->hotrotoida;
            $info->sackemmay = $request->sackemmay;
            $info->chatluong = $request->chatluong;
            $info->kichthuoc = $request->kichthuoc;
            $info->ngayramat = $request->ngayramat;
            $info->tinhtrang1 = $request->tinhtrang1;
            $info->nguongoc = $request->nguongoc;
            $info->save();
          
        }elseif($product->category_id==4){
            $info = new InfoLaptop();
            $info->product_id = $product->id;
            $info->congnghecpu = $request->congnghecpu;
            $info->tocdocpu = $request->tocdocpu;
            $info->tocdotoida = $request->tocdotoida;
            $info->ram = $request->ram;
            $info->loairam = $request->loairam;
            $info->tocdobusram = $request->tocdobusram;
            $info->ramtoida = $request->ramtoida;
            $info->ocung = $request->ocung;
            $info->manhinh = $request->manhinh;
            $info->dophangiai = $request->dophangiai;
            $info->congnghemanhinh = $request->congnghemanhinh;
            $info->cardmanhinh = $request->cardmanhinh;
            $info->congngheamthanh = $request->congngheamthanh;
            $info->conggiaotiep = $request->conggiaotiep;
            $info->ketnoikhongday = $request->ketnoikhongday;
            $info->webcam = $request->webcam;
            $info->tinhnangkhac = $request->tinhnangkhac;
            $info->denbanphim = $request->denbanphim;
            $info->kichthuoc = $request->kichthuoc;
            $info->chatlieu = $request->chatlieu;
            $info->thongtinpin = $request->thongtinpin;
            $info->hedieuhanh = $request->hedieuhanh;
            $info->thoigianramat = $request->thoigianramat;
            
            $info->save();
          
        }
        $product->cate()->attach($request->cate_id);
        if($request->dungluong[0]!=null){
            foreach($request->dungluong as $item){
                $a = new ProductDungluong();
                $a->product_id = $product->id;
                $a->dungluong = $item;
                $a->slug_dungluong = Str::slug($item);
                $a->save();
            }
            $a = ProductDungluong::where('product_id',$product->id)->get();
            foreach($request->input('item') as $key=> $itemm){
                 foreach($a as $keyy=> $i){
                    $b = new ProductColorPrice();
                        $b->product_id = $product->id;
                        $b->dungluong_id = $i->id;
                        $b->color = $request->input('item.'.$key.'.color');
                        $b->price = $request->input('item.'.$key.'.price'.$keyy.'');
                        $b->qty = $request->input('item.'.$key.'.qty'.$keyy.'');
                        $b->save();
                        $product->price = $request->input('item.0.price0');
                        $product->save();
                 }                                            
            }
        }else{
            foreach($request->input('item') as $key=> $item){
                        $b = new ProductColorPrice();
                       $b->product_id = $product->id;
                       
                       $b->color = $request->input('item.'.$key.'.color');
                       $b->price = $request->input('item.'.$key.'.price0');
                       $b->qty = $request->input('item.'.$key.'.qty0');
                       $b->save();
                       $product->price = $request->input('item.0.price0');
                       $product->save();
                }            
        }
        
        if ($request->hasFile('images')) {
            foreach($request->file('images') as $key=> $anh){
                $file = $anh;
                $name_file = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                if (strcasecmp($extension, 'jpg')=== 0
                ||strcasecmp($extension, 'png')=== 0
                ||strcasecmp($extension, 'jepg')=== 0) {
                  $image =Str::random(5). "_" . $name_file;
                while (file_exists("image/products/". $image))
                  $image = Str::random(5) . "_" . $name_file;
                  $file->move('image/products', $image);
                  $img = new ProductImage();
                  $img->product_id = $product->id;
                  $img->image = $image;
                  $img->save();
                  if($key==0){
                    $product->image = $image;
                    $product->save();
                  }
                }
            }           
           }
           
           if(isset($request->ram)){
            $ram = explode(',',$request->ram);
            foreach($ram  as $item){
                $a = new ProductRam();
                $a->product_id = $product->id;
                $a->ram = $item;
                $a->save();
            }
           }       
        return redirect()->route('product.index')->with('success','Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if($product->category_id==1){
            $info = InfoMobile::where('product_id',$product->id)->first();
        }elseif($product->category_id==3){
            $info = InfoTablet::where('product_id',$product->id)->first();
        }elseif($product->category_id==4){
            $info = InfoLaptop::where('product_id',$product->id)->first();
        }else{
            $info = '';
        }
        $mang = [];
        foreach($product->cate as $i){
            $mang[] = $i->id;
        }
        
        $cates = Cate::where('category_id',$product->category_id)->get();
        $categories = Category::all();
        if(count($product->product_ram)!=0){
            $ramarr = [];
            foreach($product->product_ram as $item){
                $ramarr[] = $item->ram;
            }
            $ram = implode(',',$ramarr);
            
            return view('admin.product.edit',compact('info','categories','product','cates','mang','ram'));
        }
        return view('admin.product.edit',compact('info','categories','product','cates','mang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
       
        $product = Product::find($id);
        $product->title = $request->title;
        $product->slug_product = Str::slug($request->title);
        $product->category_id	 = $request->category_id;
        $product->tinhtrang	 = $request->tinhtrang;
        $product->bosanpham	 = $request->bosanpham;
        $product->baohanh	 = $request->baohanh;
        $product->goibaohanh	 = $request->goibaohanh;
        $product->description	 = $request->description;
        $product->kithuat	 = $request->kithuat;
        $product->status	 = $request->status;
        $product->sale	 = $request->sale;
        $product->amount_sale	 = $request->amount_sale;
        $product->day_start	 = $request->day_start;
        $product->day_end	 = $request->day_end;
        $product->price = $request->gia[0];
        if ($request->hasFile('banner')) {
            $image_path = 'image/products/banner'.$product->banner;
                    if (File::exists($image_path)) {
                    File::delete($image_path);
                    //unlink($image_path);
                    }
            $file = $request->file('banner');
            $extension = $file->getClientOriginalExtension();
            if (strcasecmp($extension, 'jpg')=== 0
                ||strcasecmp($extension, 'png')=== 0
                ||strcasecmp($extension, 'jepg')=== 0) {
                  $image =Str::slug($request->title).'_'.Str::random(5).'.'.$extension;
                while (file_exists("image/products/banner/". $image))
                  $image = Str::slug($request->title).'_'.Str::random(5).'.'.$extension;
                  $file->move('image/products/banner/', $image);
                  $product->banner = $image;
                  
                }
           }
        $product->save();
        
        if($product->category_id==1){
            $info = InfoMobile::where('product_id',$product->id)->first();
            $info->product_id = $product->id;
            $info->congnghemanhinh = $request->congnghemanhinh;
            $info->dophangiai = $request->dophangiai;
            $info->manhinhrong = $request->manhinhrong;
            $info->dosangtoida = $request->dosangtoida;
            $info->matkinhcamung = $request->matkinhcamung;
            $info->camerasau = $request->camerasau;
            $info->quayphim = $request->quayphim;
            $info->denflash = $request->denflash;
            $info->cameratruoc = $request->cameratruoc;
            $info->chipxuly = $request->chipxuly;
            $info->cpu = $request->cpu;
            $info->chipdohoa = $request->chipdohoa;
            $info->ram = $request->ram;
            $info->bonhotrong = $request->bonhotrong;
            $info->danhba = $request->danhba;
            $info->mangdidong = $request->mangdidong;
            $info->sim = $request->sim;
            $info->wifi = $request->wifi;
            $info->gps = $request->gps;
            $info->bluetooth = $request->bluetooth;
            $info->congsac = $request->congsac;
            $info->jacktainghe = $request->jacktainghe;
            $info->ketnoikhac = $request->ketnoikhac;
            $info->dungluongpin = $request->dungluongpin;
            $info->loaipin = $request->loaipin;
            $info->hotrotoida = $request->hotrotoida;
            $info->congnghepin = $request->congnghepin;
            $info->baomatnangcao = $request->baomatnangcao;
            $info->tinhnangdacbiet = $request->tinhnangdacbiet;
            $info->khangnuoc = $request->khangnuoc;
            $info->ghiam = $request->ghiam;
            $info->xemphim = $request->xemphim;
            $info->nghenhac = $request->nghenhac;
            $info->kichthuoc = $request->kichthuoc;
            $info->thoidiemramat = $request->thoidiemramat;
            $info->save();
        }elseif($product->category_id==3){
            $info = InfoTablet::where('product_id',$product->id)->first();
            $info->product_id = $product->id;
            $info->congnghemanhinh = $request->congnghemanhinh;
            $info->dophangiai = $request->dophangiai;
            $info->manhinhrong = $request->manhinhrong;
            $info->hedieuhanh = $request->hedieuhanh;
            $info->chipxuly = $request->chipxuly;
            $info->tocdocpu = $request->tocdocpu;
            $info->chipdohoa = $request->chipdohoa;
            $info->ram = $request->ram;
            $info->bonhotrong = $request->bonhotrong;
            $info->bonhoconlai = $request->bonhoconlai;
            $info->camerasau = $request->camerasau;
            $info->quayphim = $request->quayphim;
            $info->tinhnang = $request->tinhnang;
            $info->cameratruoc = $request->cameratruoc;
            $info->tinhnangcameratruoc = $request->tinhnangcameratruoc;
            $info->mangdidong = $request->mangdidong;
            $info->sim = $request->sim;
            $info->cuocgoi = $request->cuocgoi;
            $info->wifi = $request->wifi;
            $info->gps = $request->gps;
            $info->bluetooth = $request->bluetooth;
            $info->congketnoi = $request->congketnoi;
            $info->jacktainghe = $request->jacktainghe;
            $info->tinhnangdacbiet = $request->tinhnangdacbiet;
            $info->dungluongpin = $request->dungluongpin;
            $info->loaipin = $request->loaipin;
            $info->congnghepin = $request->congnghepin;
            $info->hotrotoida = $request->hotrotoida;
            $info->sackemmay = $request->sackemmay;
            $info->chatluong = $request->chatluong;
            $info->kichthuoc = $request->kichthuoc;
            $info->ngayramat = $request->ngayramat;
            $info->tinhtrang1 = $request->tinhtrang1;
            $info->nguongoc = $request->nguongoc;
            $info->save();
          
        }elseif($product->category_id==4){
            $info = InfoLaptop::where('product_id',$product->id)->first();
            $info->product_id = $product->id;
            $info->congnghecpu = $request->congnghecpu;
            $info->tocdocpu = $request->tocdocpu;
            $info->tocdotoida = $request->tocdotoida;
            $info->ram = $request->ram;
            $info->loairam = $request->loairam;
            $info->tocdobusram = $request->tocdobusram;
            $info->ramtoida = $request->ramtoida;
            $info->ocung = $request->ocung;
            $info->manhinh = $request->manhinh;
            $info->dophangiai = $request->dophangiai;
            $info->congnghemanhinh = $request->congnghemanhinh;
            $info->cardmanhinh = $request->cardmanhinh;
            $info->congngheamthanh = $request->congngheamthanh;
            $info->conggiaotiep = $request->conggiaotiep;
            $info->ketnoikhongday = $request->ketnoikhongday;
            $info->webcam = $request->webcam;
            $info->tinhnangkhac = $request->tinhnangkhac;
            $info->denbanphim = $request->denbanphim;
            $info->kichthuoc = $request->kichthuoc;
            $info->chatlieu = $request->chatlieu;
            $info->thongtinpin = $request->thongtinpin;
            $info->hedieuhanh = $request->hedieuhanh;
            $info->thoigianramat = $request->thoigianramat;
            
            $info->save();
          
        }
        foreach($product->product_cate as $item){
            $item->delete();
        }
        $product->cate()->attach($request->cate_id);
        
       
        foreach($product->product_color_price as $key => $item){
            $pro_color_price = ProductColorPrice::find($item->id);
            $pro_color_price->price = $request->gia[$key];
            $pro_color_price->qty = $request->qty[$key];
            $pro_color_price->save();
        
        }

        
        
        
        
        if ($request->hasFile('images')) {
            foreach($request->file('images') as $key=> $anh){
                $file = $anh;
                $name_file = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                if (strcasecmp($extension, 'jpg')=== 0
                ||strcasecmp($extension, 'png')=== 0
                ||strcasecmp($extension, 'jepg')=== 0) {
                  $image =Str::random(5). "_" . $name_file;
                while (file_exists("image/products/". $image))
                  $image = Str::random(5) . "_" . $name_file;
                  $file->move('image/products', $image);
                  $img = new ProductImage();
                  $img->product_id = $product->id;
                  $img->image = $image;
                  $img->save();
                  
                }
            }
            
           }       
           if(isset($request->ram)){
            foreach($product->product_ram as $item){
                $item->delete();
            }
            $ram = explode(',',$request->ram);
            foreach($ram  as $item){
                $a = new ProductRam();
                $a->product_id = $product->id;
                $a->ram = $item;
                $a->save();
            }
           }       
        return redirect()->route('product.index')->with('success','Thêm sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $pro_cate = ProductCate::where('product_id',$product->id)->get();
        $pro_dungluong = ProductDungluong::where('product_id',$product->id)->get();
        $pro_color = ProductColorPrice::where('product_id',$product->id)->get();
        $pro_image = ProductImage::where('product_id',$product->id)->get();
        foreach($pro_cate as $item){
            $item->delete();
        }
        foreach($pro_dungluong as $item){
            $item->delete();
        }
        foreach($pro_color as $item){
            $item->delete();
        }
        foreach($pro_image as $item){
            $image_path = 'image/products/'.$item->image;
            if (File::exists($image_path)) {
            File::delete($image_path);
            $item->delete();
        }
            
        }
        $product->delete();
        return redirect()->route('product.index')->with('success','Xóa Thành Công');
    }

    public function danhmuccon(Request $request)
    {
        $data = $request->all();
        
        $danhmuccha = Category::where('id',$data['danhmuccha'])->first();
        if($danhmuccha->slug_category=='laptop'){
            $output = '';
            foreach($danhmuccha->cate as $item){
                $output.='
                        <input value="'.$item->id.'" name="cate_id[]" type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">'.$item->title.'</label>         
                        
                ';
            }
            $output.='<div class="form-group row">
            <label class="col-sm-2 col-form-label">Ram</label>
            <div class="col-sm-10">
              <input name="ram" type="text" class="form-control" placeholder="Tên">
              
            </div>
          </div>      ';
            echo $output;
        }else{
            $output = '';
            foreach($danhmuccha->cate as $item){
                $output.='
                        <input value="'.$item->id.'" name="cate_id[]" type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">'.$item->title.'</label>         
                              
                ';
            }
            echo $output;
        }
     
    
    }
    public function delete_image($id)
    {
        
        $image = ProductImage::find($id);
        $image_path = 'image/products/'.$image->image;
            if (File::exists($image_path)) {
            File::delete($image_path);
            }
        $image->delete();
        return back();
        
    }
}
