<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SliderImages;
use App\Models\Products;
use App\Models\ProductImages;
use App\Models\ProductAttributes;
use App\Models\ProductDetails;
use App\Models\BasicDetails;
use App\Models\SeoContent;
use App\Models\Industry;
use App\Models\MetaTags;
use App\Models\BlogArticles;

class HomePageController extends Controller
{ 
    //

    public function index(){
    	$slider_images = SliderImages::limit(4)->get();    	

    	$products = Products::with('industry')->join('products_details','products_details.product_id','products.id')->select('products.*','products_details.description','products_details.price','products_details.address','products_details.bed','products_details.bath','products_details.size')->orderBy('ordering','ASC')->limit(8)->get();
        
        
        $f_blogs = BlogArticles::where('featured','1')->limit(1)->get();
        $f_products = Products::with('industry')->join('products_details','products_details.product_id','products.id')->select('products.*','products_details.short_description','products_details.price','products_details.address','products_details.bed','products_details.bath','products_details.size')->where('featured','1')->limit(8)->get();
        
        $basic_details = BasicDetails::first();
        $industries = Industry::limit(8)->get();
        $f_industries = Industry::where('fea_cat','1')->orderBy('ordering','ASC')->limit(3)->get();
    	$seo_content = SeoContent::all()->keyBy('key')->toArray();
        $home_category = Industry::where('f_industries','1')->limit(5)->get();
         
    	$meta_info['title'] = $basic_details->company_name;
    	$meta_info['description'] = $basic_details->company_name;
        
        $meta_tags = MetaTags::where('page','homepage')->first();
        if($meta_tags)
        {
            if($meta_tags['title'] != '')
            {
                $meta_info['title'] = $meta_tags['title'];
            }
            
            if($meta_tags['description'] != '')
            {
                $meta_info['description'] = $meta_tags['description'];
            }
            
            $meta_info['keyword'] = $meta_tags['keyword'];
            $meta_info['content'] = $meta_tags['content'];
            $meta_info['page_schema'] = $meta_tags['page_schema'];
            
        }
        
        $captcha_img = captcha_img();
        $data['blogs'] = BlogArticles::where('featured','0')->orderBy('id','DESC')->limit(3)->get();
        // dd($products);
    	return view('frontend.homepage',compact('basic_details','captcha_img','slider_images','industries','f_industries','products','seo_content','meta_info','data','f_blogs','f_products','home_category'));
    }

}
