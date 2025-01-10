<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\ProductImages;
use App\Models\ProductDetails;

use App\Models\BasicDetails;
use App\Models\Industry;
use App\Models\SeoContent;
use App\Models\MetaTags;


class ProductController extends Controller
{

    public function show($slud, $id)
    {
        $product = Products::where('id', $id)->first();

        $product_images = ProductImages::where('product_id', $product->id)->get();

        $product_detail = ProductDetails::where('product_id', $product->id)->first();

        $industry = Industry::where('id', $product->industry_id)->first();

        $category_products = Products::where('industry_id', $industry->id)->join('products_details', 'products_details.product_id', 'products.id')->select('products.*', 'products_details.short_description')->orderBy('products.id', 'ASC')->paginate('12');

        $basic_details = BasicDetails::first();
        $industries = Industry::get();
        $seo_content = SeoContent::all()->keyBy('key')->toArray();

        $captcha_img = captcha_img();
        $all_industries = Industry::all();




        $meta_info['title'] = 'Wholesale ' . $product->name . ' Exporter | ' . $basic_details->company_name;
        $meta_info['description'] = $basic_details->company_name . ' is the most demanding wholesale ' . $product->name
            . ' distributor. We offer the best quality products at affordable rates all around the world.';

        $meta_info['is_index'] = $product->is_index;
        /*if($product->meta_title != '')
        {
            $meta_info['title'] = $product->meta_title;
            $meta_info['description'] = $product->meta_description;        
        }*/


        $meta_tags = MetaTags::where('page', 'product-view')->first();
        if ($meta_tags) {
            if ($meta_tags['title'] != '') {
                $meta_info['title'] = $meta_tags['title'];
            }

            if ($meta_tags['description'] != '') {
                $meta_info['description'] = $meta_tags['description'];
            }


            $meta_info['keyword'] = $meta_tags['keyword'];
            $meta_info['content'] = $meta_tags['content'];
        }

        $related_products = Products::join('products_details', 'products_details.product_id', 'products.id')->select('products.*', 'products_details.short_description')->limit(4)->get();

        $products = Products::whereNotIn('id', [$id])->limit(4)->get();

        return view('frontend.show_product', compact('related_products', 'product', 'meta_info', 'captcha_img', 'product_images', 'all_industries', 'product_detail', 'industry', 'basic_details', 'industries', 'seo_content', 'products', 'category_products'));
    }



    public function all_products(Request $request)
    {

        $basic_details = BasicDetails::first();
        $industries = Industry::limit(12)->get();
        $industry = Industry::orderBy('id', 'ASC')->first();
        $seo_content = SeoContent::all()->keyBy('key')->toArray();

        $all_industries = Industry::all();

        $query = Products::query(); // Initialize query builder
        $is_filtered = 0;

        // Apply joins first
        $query->join('products_details', 'products_details.product_id', '=', 'products.id')
            ->select(
                'products.*',
                'products_details.description',
                'products_details.price',
                'products_details.address',
                'products_details.bed',
                'products_details.bath',
                'products_details.size'
            );

        // Apply filters conditionally
        if (isset($request->property_keyword) && $request->property_keyword != "") {
            $query->where('products.name', 'LIKE', '%' . $request->property_keyword . '%');
            $is_filtered = 1;
        }

        if (isset($request->property_type) && $request->property_type != "") {
            $query->where('products.property_for', 'LIKE', '%' . $request->property_type . '%');
            $is_filtered = 1;
        }

        if (isset($request->property_location) && $request->property_location != "") {
            $query->where('products_details.address', 'LIKE', '%' . $request->property_location . '%');
            $is_filtered = 1;
        }

        // Include relationships and paginate
        $all_products = $query->with('industry')
            ->orderBy('ordering', 'ASC')
            ->paginate(12);

        $search_term = $request->all();


        // $all_products = $query->join('products_details','products_details.product_id','products.id')->select('products.*','products_details.short_description')->paginate('12');

 

        // dd($search_term);
        // dd($all_products);

        $captcha_img = captcha_img();
        $meta_info = [];
        $meta_tags = MetaTags::where('page', 'product-listing')->first();
        if ($meta_tags) {
            if ($meta_tags['title'] != '') {
                $meta_info['title'] = $meta_tags['title'];
            }

            if ($meta_tags['description'] != '') {
                $meta_info['description'] = $meta_tags['description'];
            }


            $meta_info['keyword'] = $meta_tags['keyword'];
            $meta_info['content'] = $meta_tags['content'];
        }

        return view('frontend.all_products', compact('industry', 'basic_details', 'captcha_img', 'all_products', 'all_industries', 'industries', 'seo_content', 'meta_info','is_filtered','search_term'));
    }



    public function category_products($slug)
    {
        $industry = Industry::where('slug', $slug)->first();

        $basic_details = BasicDetails::first();
        $industries = Industry::limit(12)->get();
        $seo_content = SeoContent::all()->keyBy('key')->toArray();

        $all_industries = Industry::all();

        // $category_products = Products::where('industry_id',$industry->id)->join('products_details','products_details.product_id','products.id')->select('products.*','products_details.short_description')->orderBy('products.id','ASC')->paginate('12');
        // $category_products = Products::where('industry_id',$industry->id)->join('products_details','products_details.product_id','products.id')->select('products.*','products_details.description')->orderBy('products.id','ASC')->paginate('12');

        //Adding first category to industry ids array.
        $industryIds = [$industry->id];

        // Checking if industry has child records
        $childIndustries = Industry::where('parent_id', $industry->id)->get();

        if ($childIndustries->count() > 0) {
            $childIds = $childIndustries->pluck('id')->toArray();
            $industryIds = array_merge($industryIds, $childIds);
        }

        $category_products = Products::whereIn('industry_id', $industryIds)->join('products_details', 'products_details.product_id', 'products.id')->select('products.*', 'products_details.description')->orderBy('products.id', 'DESC')->paginate('12');


        $captcha_img = captcha_img();
        $meta_info = [];
        $meta_info['title'] = $industry->meta_title;
        $meta_info['description'] = $industry->meta_description;
        $meta_info['content'] = $industry->seo_content;
        $meta_tags = MetaTags::where('page', 'category-product')->first();
        if ($meta_tags) {
            if ($meta_tags['title'] != '') {
                $meta_info['title'] = $meta_tags['title'];
            }

            if ($meta_tags['description'] != '') {
                $meta_info['description'] = $meta_tags['description'];
            }


            $meta_info['keyword'] = $meta_tags['keyword'];
            $meta_info['content'] = $meta_tags['content'];
        }

        $productess = Products::limit(4)->get();


        //  dd($category_products->all());

        return view('frontend.category_products', compact('basic_details', 'captcha_img', 'category_products', 'all_industries', 'industries', 'seo_content', 'industry', 'meta_info', 'productess'));
    }
}
