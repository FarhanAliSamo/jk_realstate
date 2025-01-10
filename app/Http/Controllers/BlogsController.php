<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BasicDetails;
use App\Models\Industry;
use App\Models\SeoContent;
use App\Models\MetaTags;
use App\Models\BlogArticles;
use App\Models\BlogMessage;


class BlogsController  extends Controller
{
    //
    public function index(){
    	$page_title = "Blogs";
        $seo_content = SeoContent::all()->keyBy('key')->toArray();
        $basic_details = BasicDetails::first();
        $industries = Industry::limit(6)->get();
        $captcha_img = captcha_img();
        $data['blogs'] = BlogArticles::orderBy('id','DESC')->paginate(6);

        $meta_tags = MetaTags::where('page','blog-listing')->first();
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

    	return view('frontend.blogs.listing',compact('page_title','captcha_img','basic_details','meta_info','data','industries','seo_content'));
    }

    public function view(Request $request,$slug){
        
        $seo_content = SeoContent::all()->keyBy('key')->toArray();
        $blog = BlogArticles::where('slug',$slug)->first();
        $data['blogs'] = BlogArticles::orderBy('id','DESC')->paginate(6);
        $blog_message = BlogMessage::where('product_id',$blog->id)->where('is_approved',1)->get();
        
        $industries = Industry::limit(6)->get();
        if($blog)
        {
            $basic_details = BasicDetails::first();
    
            $captcha_img = captcha_img();
            $page_title = "Blogs - {{$blog->title}}";
    
            $meta_tags = MetaTags::where('page','blog_view')->first();
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
            
            $meta_info['is_index'] = 0;
            if($blog->meta_title != '')
            {
                $meta_info['title'] = $blog->meta_title;
                $meta_info['description'] = $blog->meta_description;
                $meta_info['is_index'] = $blog->is_index;
            
            }
                
        	return view('frontend.blogs.view',compact('blog_message','page_title','captcha_img','basic_details','blog','meta_info','industries','seo_content'));
        }

    }
    
}
