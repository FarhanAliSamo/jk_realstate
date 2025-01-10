<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

use App\Models\BasicDetails;
use App\Models\SliderImages;
use App\Models\ProductImages;
use App\Models\Products;
use App\Models\Industry;
use App\Models\BlogArticles;

class DashboardController extends Controller
{
    //
    public function index(){

    	$page_title = "Dashboard | Index";

    	$basic_details = BasicDetails::where('id','1')->first();

    	return view('admin.dashboard.index',compact('page_title','basic_details'));
    }

    public function banners(){
        $page_title = "Banners List";

        $slider_images = SliderImages::all()->keyBy('order_no')->toArray();
        $basic_details = BasicDetails::where('id','1')->first();

        return view('admin.banners.index',compact('page_title','slider_images','basic_details'));
    }

    public function upload_banners(Request $request){

        if($request->file('banner_images') != null){
            $this->_upload_banner_images($request);
        }


        foreach ($request->txt_line1 as $key => $value) {
            $p_image = SliderImages::where('order_no',$key)->first();
            
            $before = $p_image->toArray();
            
            if(!$p_image){
                $p_image = new SliderImages();
            }
            
            $p_image->txt_line1 = $request->txt_line1[$key];
            $p_image->txt_line2 = $request->txt_line2[$key];
            $p_image->txt_line3 = $request->txt_line3[$key];
            $p_image->order_no = $key;
            $p_image->save();
            
            $after = $p_image->toArray();
            createHistory('slider_banner',$p_image->id,$before,$after);
        }

        return redirect()->back()->with(['success' => 'Banners Uplaoded Successfully!']);
    }

    public function save_basic_details(Request $request){
    	$basic_details = BasicDetails::where('id','1')->first();
    	
    	$before = $basic_details->toArray();

    	if(!$basic_details){
	    	$basic_details = new BasicDetails();
	    }

        $basic_details->company_name = $request->company_name;
        
        if($request->file('logo') != null){
            $basic_details->logo = $this->upload_company_logo($request,'logo');
        }
        
        if($request->file('logo_grey') != null){
            $basic_details->logo_grey = $this->upload_company_logo($request,'logo_grey');
        }

        if($request->file('featured_banner') != null){
            $basic_details->featured_banner = $this->upload_featured_banner($request);
        }

    	$basic_details->email = $request->email;
        $basic_details->theme_color1 = $request->theme_color1;
        $basic_details->theme_color2 = $request->theme_color2;

    	$basic_details->phone_number = $request->phone_number;
		$basic_details->phone_number2 = $request->phone_number2;
    	$basic_details->address = $request->address;
    	$basic_details->facebook_url = $request->facebook_url;
    	$basic_details->twitter_url = $request->twitter_url;
    	$basic_details->linkedin_url = $request->linkedin_url;
    	$basic_details->instagram_url = $request->instagram_url;
    	$basic_details->youtube = $request->youtube;
    	$basic_details->whatsapp = $request->whatsapp;
    	$basic_details->wechat = $request->wechat;
    	$basic_details->is_index = intval($request->is_index);
    	
    	$basic_details->save();
    	
    	$after = $basic_details->toArray();
        
        createHistory('basic_details',$basic_details->id,$before,$after);

    	return redirect()->back()->with(['success' => 'Details Updated Successfully!']);
    }


    function _upload_banner_images($request){
        $f1 = mt_rand(0,9);
        $f2 = mt_rand(0,9);

        $d = public_path("uploads/images/banners/");


        $banner_images = $request->file('banner_images');

        foreach ($banner_images as $key => $image) {
            $t = get_clean_microtimestamp_string();

            $name = auth()->user('admin')->company_name;
            $img_title = substr($name,0,20);

            $file_name = $d.$t.'-'.str_slug($img_title);
            $file_name_600 = $d.$t.'-'.str_slug($img_title)."_600";

            $img = \Image::make($image);

            $ext = $image->extension();

            //save original
            $img = $img->save($file_name.".".$ext,80);

            //save _700
            $img->resize(null, 600, function ($constraint) {
                $constraint->aspectRatio();
            });         

            $img->save($file_name_600.".".$ext);


            $file_name = $t.'-'.str_slug($img_title).".".$ext;


            $p_image = SliderImages::where('order_no',$key)->first();
            

            if($p_image){
                $p_image->forceDelete();
                $d = public_path('uploads/images/banners/');
                @unlink($d.$p_image->img_name);

                $img_file_arr = explode('.', $p_image->img_name);
                @unlink($d.$img_file_arr[0]."_700.".$img_file_arr[1]);
            }

            $p_image = new SliderImages();
            $p_image->banner_path = $file_name;
            $p_image->txt_line1 = $request->txt_line1[$key];
            $p_image->txt_line2 = $request->txt_line2[$key];
            $p_image->order_no = $key;
            $p_image->save();
            
            
            
        }
    }


    function upload_company_logo($request,$name){
        $d = public_path("uploads/images/logo/");

        $image = $request->file($name);
        $t = get_clean_microtimestamp_string();

        $name = auth()->user('admin')->company_name;
        $img_title = substr($name,0,20);

        $file_name = $d.$t.'-'.str_slug($img_title);
        $file_name_200 = $d.$t.'-'.str_slug($img_title)."_200";

        $img = \Image::make($image);

        $ext = $image->extension();

        //save original
        $img = $img->save($file_name.".".$ext,80);

        //save _200
        $img->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        });         

        $img->save($file_name_200.".".$ext);


        $file_name = $t.'-'.str_slug($img_title).".".$ext;

        return $file_name;
    }


    function upload_featured_banner($request){
        $d = public_path("uploads/images/banners/");

        $image = $request->file('featured_banner');
        $t = get_clean_microtimestamp_string();

        $name = auth()->user('admin')->company_name;
        $img_title = substr($name,0,20);

        $file_name = $d.$t.'-'.str_slug($img_title);
        $file_name_400 = $d.$t.'-'.str_slug($img_title)."_400";

        $img = \Image::make($image);

        $ext = $image->extension();

        //save original
        $img = $img->save($file_name.".".$ext,80);

        //save _400
        $img->resize(null, 400, function ($constraint) {
            $constraint->aspectRatio();
        });         

        $img->save($file_name_400.".".$ext);


        $file_name = $t.'-'.str_slug($img_title).".".$ext;

        return $file_name;
    }
    
    function generate_sitemap(){
        
        $industries = Industry::get();
        $blogs = BlogArticles::get();
        $products = Products::get();
        
        $homepage_url = config('app.url');
        $aboutus_url = config('app.url')."about-us";
        $products_url = config('app.url')."products";
        $blogs_url = config('app.url')."blogs";
        $contactus_url = config('app.url')."contact-us";
        
        $txt = '<?xml version="1.0" encoding="UTF-8"?>
        <urlset
              xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
              xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
              xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
                    http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
        
        $txt .= "<url>
          <loc>$homepage_url</loc>
        </url>";
        
        $txt .= "<url>
          <loc>$aboutus_url</loc>
        </url>";
        
        $txt .= "<url>
          <loc>$products_url</loc>
        </url>";
        
        $txt .= "<url>
          <loc>$blogs_url</loc>
        </url>";
        
        $txt .= "<url>
          <loc>$contactus_url</loc>
        </url>";
        
        
        // foreach($industries as $key => $ind){
        //     $url = route('category_products',$ind->slug);
            
        //     $txt .= "<url>
        //       <loc>$url</loc>
        //     </url>";
        // }
        
        // foreach($blogs as $key => $blog){
        //     $url = route('blogs.view',$blog->slug);
            
        //     $txt .= "<url>
        //       <loc>$url</loc>
        //     </url>";
        // }
        
        // foreach($products as $key => $product){
        //     $url = route('product.show',[$product->slug,$product->id]);
            
        //     $txt .= "<url>
        //       <loc>$url</loc>
        //     </url>";
        // }
        
        
        $txt .= "</urlset>";
        
        
        file_put_contents("sitemap.xml",$txt);
        
        // echo "SiteMap Updated";
        
        return redirect()->to(route('admin.dashboard.index'))->with(['success' => 'siteMap Updated Successfully!']);
    }
    
    function generate_image_sitemap(){
     
     $products = Products::get();
     
     $productimages = ProductImages::get();
     
     
     $txt = '<?xml version="1.0" encoding="UTF-8"?>
            <urlset
                  xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
                  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                  xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
                        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
            
            
            
            foreach($products as $key => $products){
                $url = config('app.url')."uploads/images/products".$products->thumbnail_img;
                
                $txt .= "<url>
                  <loc>$url</loc>
                </url>";
            }
            
            foreach($productimages as $key => $productimages){
                $url = config('app.url')."uploads/images/products".$productimages->img_name;
                
                $txt .= "<url>
                  <loc>$url</loc>
                </url>";
            }
            
            
            $txt .= "</urlset>";
            
            
            file_put_contents("product-img-sitemap.xml",$txt);
            
            // echo "SiteMap Updated";
            
            return redirect()->to(route('admin.dashboard.index'))->with(['success' => 'Product Images Sitemap Updated Successfully!']);
        }
    
    function generate_robots(){
        

        $user = "User-agent: *";
        $allow = "Allow: /";
        $product_name = "Disallow: /products?product_name=*";
        $assets = "Disallow: /assets/*";
        $captcha = "Disallow: /captcha?*";
        $sitemap = "Sitemap: ".config('app.url')."sitemap.xml";
        
        $txt = "";
        
        $txt .= "$user\r\n";
        
        $txt .= "$allow\r\n";
        
        $txt .= "$product_name\r\n";
        
        $txt .= "$assets\r\n";
        
        $txt .= "$captcha\r\n";
        
        $txt .= "$sitemap";
        

        file_put_contents("robots.txt",$txt);
        
        return redirect()->to(route('admin.dashboard.index'))->with(['success' => 'Robots.txt Updated Successfully!']);
   
    }

}
