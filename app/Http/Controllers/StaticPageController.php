<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BasicDetails;
use App\Models\Industry;
use App\Models\SeoContent;
use App\Models\MetaTags;

class StaticPageController extends Controller
{
    //
    public function about_us(){
    	$page_title = "About US";

        $basic_details = BasicDetails::first();
        $industries = Industry::limit(6)->get();
        $seo_content = SeoContent::all()->keyBy('key')->toArray();
        
        $captcha_img = captcha_img();

        $meta_tags = MetaTags::where('page','about-us')->first();
        $meta_info = [];
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

    	return view('frontend.about_us',compact('page_title','captcha_img','basic_details','industries','seo_content','meta_info'));
    }

    public function contact_us(){
    	$page_title = "Contact US";

        $basic_details = BasicDetails::first();
        $industries = Industry::limit(6)->get();
        $seo_content = SeoContent::all()->keyBy('key')->toArray();
        
        $captcha_img = captcha_img();


        $meta_tags = MetaTags::where('page','contact-us')->first();
        $meta_info = [];
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

    	return view('frontend.contact_us',compact('page_title','captcha_img','basic_details','industries','seo_content','meta_info'));
    }
    
    
    public function certificate(){
    	$page_title = "Certificate";

        $basic_details = BasicDetails::first();
        $industries = Industry::limit(6)->get();
        $seo_content = SeoContent::all()->keyBy('key')->toArray();

        $captcha_img = captcha_img();


        $meta_tags = MetaTags::where('page','certifacte')->first();
        $meta_info = [];
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
            
        }

    	return view('frontend.certificate',compact('page_title','captcha_img','basic_details','industries','seo_content','meta_info'));
    }
    
    
    public function catalog(){
    	$page_title = "Certificate";

        $basic_details = BasicDetails::first();
        $industries = Industry::limit(6)->get();
        $seo_content = SeoContent::all()->keyBy('key')->toArray();

        $captcha_img = captcha_img();


        $meta_tags = MetaTags::where('page','catalog')->first();
        $meta_info = [];
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
            
        }

    	return view('frontend.catalog',compact('page_title','captcha_img','basic_details','industries','seo_content','meta_info'));
    }
    
    
    
     public function project_case(){
    	$page_title = "project_case";

        $basic_details = BasicDetails::first();
        $industries = Industry::limit(6)->get();
        $seo_content = SeoContent::all()->keyBy('key')->toArray();
        
        $captcha_img = captcha_img();


        $meta_tags = MetaTags::where('page','project_case')->first();
        $meta_info = [];
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
            
        }

    	return view('frontend.project_case',compact('page_title','captcha_img','basic_details','industries','seo_content','meta_info'));
    } 
         public function introduction(){
    	$page_title = "introduction";

        $basic_details = BasicDetails::first();
        $industries = Industry::limit(6)->get();
        $seo_content = SeoContent::all()->keyBy('key')->toArray();
        
        $captcha_img = captcha_img();


        $meta_tags = MetaTags::where('page','introduction')->first();
        $meta_info = [];
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
            
        }

    	return view('frontend.introduction',compact('page_title','captcha_img','basic_details','industries','seo_content','meta_info'));
    } 
    
             public function banner(){
    	$page_title = "banner";

        $basic_details = BasicDetails::first();
        $industries = Industry::limit(6)->get();
        $seo_content = SeoContent::all()->keyBy('key')->toArray();
        
        $captcha_img = captcha_img();


        $meta_tags = MetaTags::where('page','banner')->first();
        $meta_info = [];
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
            
        }

    	return view('frontend.banner',compact('page_title','captcha_img','basic_details','industries','seo_content','meta_info'));
    } 


    // public function video(){
    // 	$page_title = "Video";

    //     $basic_details = BasicDetails::first();
    //     $industries = Industry::limit(6)->get();
    //     $seo_content = SeoContent::all()->keyBy('key')->toArray();
        
    //     $captcha_img = captcha_img();


    //     $meta_tags = MetaTags::where('page','video')->first();
    //     $meta_info = [];
    //     if($meta_tags)
    //     {
    //         if($meta_tags['title'] != '')
    //         {
    //             $meta_info['title'] = $meta_tags['title'];
    //         }
            
    //         if($meta_tags['description'] != '')
    //         {
    //             $meta_info['description'] = $meta_tags['description'];
    //         }
            
    
    //         $meta_info['keyword'] = $meta_tags['keyword'];
    //         $meta_info['content'] = $meta_tags['content'];
            
    //     }

    // 	return view('frontend.video',compact('page_title','captcha_img','basic_details','industries','seo_content','meta_info'));
    // }    
    
}


