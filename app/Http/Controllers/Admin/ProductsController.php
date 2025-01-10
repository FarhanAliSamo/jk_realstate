<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Products;
use App\Models\ProductDetails;
use App\Models\ProductImages;
use App\Models\ProductAttributes;
use App\Models\Industry;
use App\Models\EditorUploads;
use App\Models\CompanyProfiles;
use App\Models\BasicDetails;


class ProductsController extends Controller
{
    //
    public function index(Request $request){
       $limit = 12;
        $query = new Products();
        
        if(isset($request->keyword) && $request->keyword != ''){
            $query = $query->where('name','LIKE',"%".$request->keyword."%");
        }
        
        $query = $query->orderBy('id','DESC')->select('products.*')->join('products_details','products_details.product_id','products.id');
        
        $products = $query->paginate($limit);
        
        $basic_details = BasicDetails::where('id','1')->first();

        $page_title = "All Products";
        return view('admin.products.index',compact('products','basic_details','page_title','limit'));
    }

    public function add(){
        $page_title = "Add Product";

        $industries_arr = Industry::pluck('name','id')->toArray();
        $industries_arr = merge_select($industries_arr);
        $basic_details = BasicDetails::where('id','1')->first();

        return view('admin.products.add',compact('page_title','basic_details','industries_arr'));
    }
    
       public function delete($id){
        $page_title = "";
        Products::where('id',$id)->delete();
        
        return redirect()->to(route('admin.products.index'))->with(['success' => 'Products Deleted Successfully!']);
    }



    public function edit($id){
        $page_title = "Edit Product";

        $product = Products::join('products_details','products_details.product_id','products.id')->select('products.*','products_details.description','short_description','products_details.min_price','products_details.max_price','products_details.min_order','products_details.min_order_unit','products_details.price','products_details.address','products_details.bed','products_details.bath','products_details.size')->where('products.id',$id)->first();
        // dd($product);
        if(!$product){
            abort('404');
        }

        $product_images = ProductImages::where('product_id',$product->id)->get()->keyBy('order_no');

        if($product_images->count()  > 0){
            $product_images = $product_images->toArray();
        }
        
        
       

        $product_attributes = ProductAttributes::where('product_id',$product->id)->pluck('attribute_value','attribute_label');

        $industry = Industry::where('id',$product->industry_id)->first();
        $ind_name = str_replace('/', ' > ', $industry->slug);
        $ind_name = str_replace('-', ' ', $ind_name);
        $product->ind_name = $ind_name;

        $industries_arr = Industry::pluck('name','id')->toArray();
        $industries_arr = merge_select($industries_arr);
        $basic_details = BasicDetails::where('id','1')->first();
        
        return view('admin.products.edit',compact('page_title','basic_details','product','product_images','product_attributes','industries_arr'));
    }

    public function store(Request $request){

        $this->_validate_request($request,'store');
        $product = new Products();
        $before = $product->toArray();
        $product->name = $request->name;
        $product->industry_id = $request->industry_id;
        $product->property_for = $request->property_for;
        $product->keywords = $request->keywords;
        $product->imagetitle = $request->imagetitle;
        $product->slug = str_slug($request->name);
        
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        
        if($request->file('prod_diagram') != null){
            $product->diagram = $this->upload_product_diagram($request);
        }
        
         if($request->file('prod_video') != null){
            $product->prod_video = $this->upload_prod_video($request);
        }
        
        if($request->featured != ''){
            $product->featured = $request->featured;
        }else{
            $product->featured = 0;
        }
        
          if($request->file('featured_banner') != null){
            $product->featured_banner = $this->upload_featured_banner($request);
        }
        
         if($request->popular_product != ''){
            $product->popular_product = $request->popular_product;
        }else{
            $product->popular_product = 0;
        }
        
          if($request->leftproducts != ''){
            $product->leftproducts = $request->leftproducts;
        }else{
            $product->leftproducts = 0;
        }
        
         if($request->rightsproducts != ''){
            $product->rightsproducts = $request->rightsproducts;
        }else{
            $product->rightsproducts = 0;
        }
        
        if($request->best_seller != ''){
            $product->best_seller = $request->best_seller;
        }else{
            $product->best_seller = 0;
        }

        $product->save();
        
        $after = $product->toArray();
        
        createHistory('products_store',$product->id,$before,$after);
        
        $product_details = new ProductDetails();
        $before = $product_details->toArray();
        $product_details->product_id = $product->id;

        $desc = $this->upload_linked_images($request->description);
        $product_details->description = $desc;
            
        // addition for property start
        $product_details->price = $request->price;
        $product_details->address = $request->address;
        $product_details->size = $request->size;
        $product_details->bed = $request->bed;
        $product_details->bath = $request->bath;

        // addition for property end

        $product_details->min_price = floatval($request->min_price);
        $product_details->max_price = floatval($request->max_price);
        $product_details->min_order = intval($request->min_order);
        $product_details->min_order_unit = $request->min_order_unit;
        $product_details->short_description = $request->short_description;

        $product_details->port = $request->port;
        $product_details->packaging = $request->packaging;
        $product_details->lead_time = $request->lead_time;

        $product_details->save();
        $after = $product_details->toArray();
        
        createHistory('products_details_store',$product_details->id,$before,$after);

        $this->_upload_product_images($request,$product);
        $this->_store_product_attributes($request,$product);
        
        return redirect()->to(route('admin.products.index'))->with(['success' => 'product Added successfully!']);
    }

    public function update(Request $request,$id){
        
        $this->_validate_request($request,'update');

        $product = Products::where('id',$id)->first();
        
        $before = $product->toArray();
        
        $product->name = $request->name;
        $product->industry_id = $request->industry_id;
        $product->property_for = $request->property_for;
        $product->keywords = $request->keywords;
        $product->imagetitle = $request->imagetitle;
        $product->slug = str_slug($request->name);
        
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        
        $product->is_index = $request->is_index;
        
        if($request->file('prod_diagram') != null){
            $product->diagram = $this->upload_product_diagram($request);
        }
        
        if($request->file('prod_video') != null){
            $product->prod_video = $this->upload_prod_video($request);
        }
        
        if($request->featured != ''){
            $product->featured = $request->featured;
        }else{
            $product->featured = 0;
        }
        
        
           if($request->file('featured_banner') != null){
            $product->featured_banner = $this->upload_featured_banner($request);
        }
        
        
         if($request->popular_product != ''){
            $product->popular_product = $request->popular_product;
        }else{
            $product->popular_product = 0;
        }
        
          if($request->leftproducts != ''){
            $product->leftproducts = $request->leftproducts;
        }else{
            $product->leftproducts = 0;
        }
        
         if($request->rightsproducts != ''){
            $product->rightsproducts = $request->rightsproducts;
        }else{
            $product->rightsproducts = 0;
        }
        
        if($request->best_seller != ''){
            $product->best_seller = $request->best_seller;
        }else{
            $product->best_seller = 0;
        }


        $product->save();
        
        $after = $product->toArray();
        
        createHistory('products_update',$product->id,$before,$after);

        $product_details = ProductDetails::where('product_id',$product->id)->first();
        
        $before = $product_details->toArray();
        
        $product_details->product_id = $product->id;

        $desc = $this->upload_linked_images($request->description);
        $product_details->description = $desc;
        $product_details->short_description = $request->short_description;
        
         // addition for property start
         $product_details->price = $request->price;
         $product_details->address = $request->address;
         $product_details->size = $request->size;
         $product_details->bed = $request->bed;
         $product_details->bath = $request->bath;
 
         // addition for property end

        $product_details->min_price = floatval($request->min_price);
        $product_details->max_price = floatval($request->max_price);
        $product_details->min_order = intval($request->min_order);
        $product_details->min_order_unit = $request->min_order_unit;

        $product_details->port = $request->port;
        $product_details->packaging = $request->packaging;
        $product_details->lead_time = $request->lead_time;
        
        $product_details->save();
        
        $after = $product_details->toArray();
        
        createHistory('products_details_update',$product_details->id,$before,$after);
        
        $this->_store_product_attributes($request,$product);
        
        if($request->hasFile('product_images') )
        {
            $this->_upload_product_images($request,$product);    
        }
        
        return redirect()->to(route('admin.products.index'))->with(['success' => 'product Updated successfully!']);
    }

    function upload_linked_images($description){
        $desc = $description;
        preg_match_all("#src=\"(.*?)\"#", $desc, $matches);
        
        if(isset($matches[1])){
            $f1 = mt_rand(0,9);
            $f2 = mt_rand(0,9);

            foreach ($matches[1] as $key => $img_url) {

                $temp_img = $img_url;
                
                if(my_file_exists($img_url) && $img_url == str_replace('/uploads/images/mce_uploads/','',$img_url) ){
                    if(strpos($img_url, '.jpg') != false){$ext = ".jpg";}
                    if(strpos($img_url, '.jpeg') != false){$ext = ".jpeg";}
                    if(strpos($img_url, '.png') != false){$ext = ".png";}
                    if(strpos($img_url, '.gif') != false){$ext = ".gif";}

                    $img_url = str_replace('http:', '', $img_url);
                    $img_url = str_replace('https:', '', $img_url);

                    $img_url = str_replace('//', 'https://', $img_url);
                    $img_name = get_clean_microtimestamp_string()."".$ext;

                    $img = public_path("uploads/images/mce_uploads/$img_name");
                    @file_put_contents($img, file_get_contents($img_url));
                    
                    $desc = str_replace($temp_img, "/uploads/images/mce_uploads/$img_name", $desc);
                }
            }
        }

        return $desc;
    }
    
    
    function upload_featured_banner($request){
        $d = public_path("uploads/images/categories/");

        $image = $request->file('featured_banner');
        $t = get_clean_microtimestamp_string();

        $name = $request->name;
        $img_title = substr($name,0,20);

        $file_name = $d.$t.'-'.str_slug($img_title);
        $file_name_200 = $d.$t.'-'.str_slug($img_title)."_200";

        $img = \Image::make($image);

        $ext = $image->extension();

        //save original
        $img = $img->save($file_name.".".$ext,80);

        //save _700
        $img->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        });         

        $img->save($file_name_200.".".$ext);


        $file_name = $t.'-'.str_slug($img_title).".".$ext;

        return $file_name;
    }
    
    

    function _validate_request($request,$type){

        if($type == 'store'){
            $rules = [
                'name' => 'required|max:255',
                'description' => 'required',
                'industry_id' => 'required',
                'property_for' => 'required',
                'product_images.1' => 'required|image|max:2048',
                'product_images.2' => 'image|max:2048',
                'product_images.3' => 'image|max:2048',
                'product_images.4' => 'image|max:2048',
                'product_images.5' => 'image|max:2048',
                'short_description' => ''
                // 'project_title' => function($attribute, $value, $fail) {
                //     $total = Projects::where('member_id',auth()->user('member')->id)->count();
                //     if ($total >= 5) {
                //         $fail("As Free Member You can only Create 5 Project Upgrade to Create More Projects");
                //     }
                // },
            ];
        }elseif($type == 'update'){
            $rules = [
                'name' => 'required|max:255',
                'description' => 'required',
                'industry_id' => 'required',
                'product_images.1' => 'image|max:2048',
                'product_images.2' => 'image|max:2048',
                'product_images.3' => 'image|max:2048',
                'product_images.4' => 'image|max:2048',
                'product_images.5' => 'image|max:2048',
                // 'project_title' => function($attribute, $value, $fail) {
                //     $total = Projects::where('member_id',auth()->user('member')->id)->count();
                //     if ($total >= 5) {
                //         $fail("As Free Member You can only Create 5 Project Upgrade to Create More Projects");
                //     }
                // },
            ];
        }

        $customMessages = [
            'product_images.1.max' => 'Max upload size is 2048 KB (Thumbnail is bigger than 2048 KB).',
            'product_images.2.max' => 'Max upload size is 2048 KB (Image 1 is bigger than 2048 KB).',
            'product_images.3.max' => 'Max upload size is 2048 KB (Image 2 is bigger than 2048 KB).',
            'product_images.4.max' => 'Max upload size is 2048 KB (Image 3 is bigger than 2048 KB).',
            'product_images.5.max' => 'Max upload size is 2048 KB (Image 4 is bigger than 2048 KB).',
        ];

        $this->validate($request, $rules, $customMessages);
    }

    function _upload_product_images($request,$product){
        $f1 = mt_rand(0,9);
        $f2 = mt_rand(0,9);

        $d = public_path("uploads/images/products/$f1/$f2/");


        $product_images = $request->file('product_images');

        foreach ($product_images as $key => $image) {
            $t = get_clean_microtimestamp_string();

            $img_title = substr($request->name,0,20);

            $file_name = $d.$t.'-'.str_slug($img_title);
            $file_name_500 = $d.$t.'-'.str_slug($img_title)."_500";
            $file_name_200 = $d.$t.'-'.str_slug($img_title)."_200";
            $file_name_100 = $d.$t.'-'.str_slug($img_title)."_100";

            $img = \Image::make($image);

            $ext = $image->extension();

            //save original
            $img = $img->save($file_name.".".$ext,80);

            //save _500
            $img->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            });         

            $img->save($file_name_500.".".$ext);

            //save 200
            $img->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->save($file_name_200.".".$ext); 

            //save 100
            $img->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->save($file_name_100.".".$ext);         

            $file_name = "/".$f1.'/'.$f2.'/'.$t.'-'.str_slug($img_title).".".$ext;

            if($key == 1){
                $product->thumbnail_img = $file_name;
                $product->save();
            }else{
                $p_image = ProductImages::where('user_id',auth()->user()->id)->where('product_id',$product->id)->where('order_no',$key)->first();

                if(($p_image)){
                    $p_image->forceDelete();
                    $d = public_path('uploads/images/products/');
                    @unlink($d.$p_image->img_name);

                    $img_file_arr = explode('.', $p_image->img_name);
                    @unlink($d.$img_file_arr[0]."_500.".$img_file_arr[1]);
                    @unlink($d.$img_file_arr[0]."_200.".$img_file_arr[1]);
                    @unlink($d.$img_file_arr[0]."_100.".$img_file_arr[1]);
                }

                $p_image = new ProductImages();
                $p_image->user_id = auth()->user()->id;
                $p_image->product_id = $product->id;
                $p_image->img_name = $file_name;
                $p_image->order_no = $key;
                $p_image->save();
            }
        }
    }

    function _store_product_attributes($request,$product){
        $prod_attrs = ProductAttributes::where('product_id',$product->id)->forceDelete();

        if(isset($request->attribute_label) && count($request->attribute_label) > 0){
            foreach ($request->attribute_label as $key => $attr_label) {
                # code...
                if($attr_label != "" && isset($request->attribute_value[$key]) && $request->attribute_value[$key] != ""){
                    $product_attributes = new ProductAttributes();
                    $product_attributes->product_id = $product->id;
                    $product_attributes->attribute_label = $attr_label;
                    $product_attributes->attribute_value = $request->attribute_value[$key];
                    $product_attributes->save();
                }
            }
        }
    }

    function mce_upload_image(Request $request){

        $file = $request->file('file');

        if($file->getMimeType() == 'video/mp4'){
            $rules = [
                'file' => 'mimes:mp4|max:51200',
            ];

            $customMessages = [
                'file.max' => 'Max upload size is 50 MB (Video is bigger than 50 MB).',
            ];

            $this->validate($request, $rules, $customMessages);

            $d = public_path("uploads/videos/");
            $file_name = get_clean_microtimestamp_string()."-".mt_rand(0,9999);
            $ext = $file->extension();

            $file->move($d, $file_name.".".$ext);

            $editor_upload = new EditorUploads();
            $editor_upload->user_id = \Auth::user()->id;
            $editor_upload->file_path = "/uploads/videos/".$file_name.".".$ext;
            $editor_upload->file_size = @filesize("uploads/videos/".$file_name.".".$ext); // save size in bytes
            $editor_upload->save();

            return "/uploads/videos/".$file_name.".".$ext; 
        }else{
            $rules = [
                'file' => 'image|max:1024',
            ];

            $customMessages = [
                'file.max' => 'Max upload size is 1024 KB (Image is bigger than 1024 KB).',
            ];

            $this->validate($request, $rules, $customMessages);


            $image = $request->file('file');

            $d = public_path("uploads/images/mce_uploads/");
            $t = get_clean_microtimestamp_string()."-".mt_rand(0,9999);
            $file_name = $d.$t;
            $ext = $image->extension();

            $image = $request->file('file');
            $img = \Image::make($image);

            //save original
            $img = $img->save($file_name.".".$ext,80);

            $editor_upload = new EditorUploads();
            $editor_upload->user_id = \Auth::user()->id;
            $editor_upload->file_path = "/uploads/images/mce_uploads/".$t.".".$ext;
            $editor_upload->file_size = $file->getSize(); //save size in bytes
            $editor_upload->save();

            return "/uploads/images/mce_uploads/".$t.".".$ext;
        }
    }

    function product_images_order(Request $request){
        $image1 = ProductImages::where('user_id',auth()->user()->id)->where('product_id',$request->product_id)->where('order_no',$request->order_old)->first();

        if($image1){
            $image1->order_no = $request->order_new;

            $image2 = ProductImages::where('user_id',auth()->user()->id)->where('product_id',$request->product_id)->where('order_no',$request->order_new)->first();

            if($image2){
                $image2->order_no = $request->order_old;

                $image1->save();
                $image2->save();

                return "1";
            }
        }
    }

    function get_industries(Request $request){
        $kw = $request->search_ind;

        $kw = str_replace(' > ', '/', $kw);
        $kw = str_replace(' ', '-', $kw);

        $data = Industry::where('slug','LIKE','%'.$kw.'%')->limit(10)->get();

        $industries_data = array();
        foreach ($data as $key => $value) {
            # code...
            $ind_name = str_replace('/', ' > ', $value->slug);
            $ind_name = str_replace('-', ' ', $ind_name);

            $industries_data[$value->id] = $ind_name;
        }

        return json_encode($industries_data);
    }
    
    function delete_image(Request $request,$id){
        $product_image = ProductImages::where('order_no',$request->image_id)->where('product_id',$request->product_id)->first();

        $img_file_arr = explode('.', $product_image['img_name']);

        $d = public_path('uploads/images/products/');
        @unlink($d.$product_image['img_name']);

        $img_file_arr = explode('.', $product_image['img_name']);
        
        @unlink($d.$img_file_arr[0]."_500.".$img_file_arr[1]);
        @unlink($d.$img_file_arr[0]."_200.".$img_file_arr[1]);
        @unlink($d.$img_file_arr[0]."_100.".$img_file_arr[1]);


        $product_image->forceDelete();

        return $request->image_id;
    }
    
    function upload_product_diagram($request){
        $file_name = "";
        try
        {
            $d = public_path("uploads/images/");
    
            $image = $request->file('prod_diagram');
            $t = get_clean_microtimestamp_string();
    
            $name = auth()->user('admin')->company_name;
            $img_title = substr($name,0,20);
    
            $file_name = $d.$t.'-'.str_slug($img_title);
            $file_name_500 = $d.$t.'-'.str_slug($img_title)."_500";
    
            $img = \Image::make($image);
    
            $ext = $image->extension();
    
            //save original
            $img = $img->save($file_name.".".$ext,80);
    
            //save _400
            $img->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            });         
    
            $img->save($file_name_500.".".$ext);
    
    
            $file_name = $t.'-'.str_slug($img_title).".".$ext;            
        }
        catch(\Exception $ex)
        {
            $file_name = "";
        }


        return $file_name;
    }
    
   function upload_prod_video($request){
    $file = $request->file('prod_video');

    // Check if a file was actually uploaded
    if (!$file) {
        return "No video file uploaded.";
    }

    // Check the file size
    $maxFileSize = 20 * 1024 * 1024; // 20 MB (adjust this limit as needed)
    if ($file->getSize() > $maxFileSize) {
        return "The video file size exceeds the maximum allowed limit (20 MB).";
    }

    // Check the file type
    $allowedMimeTypes = ['video/mp4', 'video/avi'];
    if (!in_array($file->getMimeType(), $allowedMimeTypes)) {
        return "Invalid file format. Only MP4 and AVI videos are allowed.";
    }

    // Proceed with the upload
    $destination = public_path("uploads/videos/");
    $file_name = get_clean_microtimestamp_string() . "-" . mt_rand(0, 9999);
    $ext = $file->extension();

    try {
        $file->move($destination, $file_name . "." . $ext);
    } catch (\Exception $e) {
        // Log the error for debugging purposes
        \Log::error("Error while uploading video: " . $e->getMessage());
        return "An error occurred during the upload process. Please try again later.";
    }

    return "/uploads/videos/" . $file_name . "." . $ext; 
}

    
    
}
