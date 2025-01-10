<?php 

use Illuminate\Support\Str;
use App\Models\Products;
use App\Models\ProductDetails;

function upload_editor_images($desc,$title,$user_id,$product_id){
$regex_editor_images = '#<img src="(.*?)" data-src="(.*?)" (.*?)>#ism';
preg_match_all($regex_editor_images,$desc,$matches);

foreach($matches[2] as $k => $img_url){
$img_url = str_replace('http:', '', $img_url);
$img_url = str_replace('https:', '', $img_url);


if(stripos($img_url, '.jpg') != false){
$img_name = str_slug($title);
$ext = ".jpg";
}

if(stripos($img_url, '.jpeg') != false){
$img_name = str_slug($title);
$ext = ".jpeg";
}

if(stripos($img_url, '.png') != false){
$img_name = str_slug($title);
$ext = ".png";
}

if(stripos($img_url, '.gif') != false){
$img_name = str_slug($title);
$ext = ".gif";
}

$img_url = str_replace('//', 'https://', $img_url);
$img_name = $img_name."$k-".get_clean_microtimestamp_string()."".$ext;

$f1 = mt_rand(0,9);
$f2 = mt_rand(0,9);



if(my_file_exists($img_url)){
$img = public_path("uploads/images/mce_uploads/$img_name");
@file_put_contents($img, file_get_contents($img_url));
$file_path = "$img_name";

$temp_img_url = '<img class="img-responsive" src="/uploads/images/mce_uploads/'.$file_path.'" >';

$file_url = "/uploads/images/mce_uploads/".$file_path;
$sql = "INSERT IGNORE INTO tw_editor_uploads (user_id,product_id,file_path,file_size,upload_type) VALUES ($user_id,$product_id,'".$file_url."','1000',0) ";
\DB::insert($sql);


$desc = str_replace($matches[0][$k],$temp_img_url,$desc);
}

}

return $desc;
}



function merge_select($arr,$txt="Select"){
    $temp_arr = array();
    $temp_arr[""] = $txt;
    foreach ($arr as $key => $value) {
        # code...
        $temp_arr[$key] = $value;
    }

    return $temp_arr;
}
function my_file_exists($file){

    $file_headers = @get_headers($file);
    if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found' || $file_headers[0] == 'HTTP/1.0 404 Not Found') {
        return false;
    }
    else {
        return true;
    }
    
}


function clean_product_desc($desc){

    // remove styles
    preg_match_all('#style="(.*?)"#', $desc, $matches);
    foreach ($matches[0] as $key => $value) {
        $desc = str_replace($value, '', $desc);
    }

    $desc = strip_tags($desc,'<p><h2><table><tr><td><img><b><strong>');


    //remove inline styles 
    preg_match_all('#align="(.*?)"#', $desc, $matches);
    foreach ($matches[0] as $key => $value) {
        $desc = str_replace($value, '', $desc);
    }


    //remove inline styles 
    preg_match_all('#class="(.*?)"#', $desc, $matches);
    foreach ($matches[0] as $key => $value) {
        $desc = str_replace($value, '', $desc);
    }

    $desc = strip_tags($desc,'<p><h2><table><tr><td><img><b><strong>');
    $desc = str_replace('<p>&nbsp;</p>', '', $desc);

    $desc = str_replace("<table ", "<table class='table'", $desc);

    return $desc;
}


function get_clean_microtimestamp_string() {
    //Get raw microtime (with spaces and dots and digits)
    $mt = microtime();
    
    //Remove all non-digit (or non-integer) characters
    $r = "";
    $length = strlen($mt);
    for($i = 0; $i < $length; $i++) {
        if(ctype_digit($mt[$i])) {
            $r .= $mt[$i];
        }
    }
    
    //Return
    return $r;
}


function get_thumb_url_100($folder,$url,$is_optimized = 0){
    if($url != ''){
        $url_arr = explode('.', $url);
        
        if($is_optimized == 1){
            $url = $url_arr[0]."_100.".$url_arr[1];
        }else{
            $url = $url_arr[0].".".$url_arr[1];
        }
    
        $path = config('app.url')."uploads/images/".$folder.$url;
        return $path;
    }else{
        return "/images/no-image_100.png";
    }
}

function get_thumb_url_200($folder,$url,$is_optimized = 0){
    
    if($url != '' && $url != '/' ){
        $url_arr = explode('.', $url);
        
        if($is_optimized == 1){
            $url = $url_arr[0].".".$url_arr[1];
        }else{
            $url = $url_arr[0].".".$url_arr[1];
        }
    
        $path = config('app.url')."uploads/images/".$folder.$url;
        return $path;
    }else{
        return "/images/no-image_200.png";
    }
}


function get_thumb_url_400($folder,$url,$is_optimized = 0){
    
    if($url != ''){
        $url_arr = explode('.', $url);
        
        if($is_optimized == 1){
            $url = $url_arr[0]."_400.".$url_arr[1];
        }else{
            $url = $url_arr[0].".".$url_arr[1];
        }
    
        $path = config('app.url')."uploads/images/".$folder.$url;
        return $path;
    }else{
        return "/images/no-image_400.png";
    }
}


//company banner
function get_thumb_url_240($folder,$url){
    
    if($url != ''){
        $url_arr = explode('.', $url);
        $url = $url_arr[0]."_240.".$url_arr[1];
    
        $path = config('app.url')."/uploads/images/".$folder.$url;
        return $path;
    }else{
        return "/assets/images/comp-banner.png";
    }
}

function get_thumb_url_500($folder,$url,$is_optimized = 0){
    
    if($url != ''){
        $url_arr = explode('.', $url);
        
        if($is_optimized == 1){
            $url = $url_arr[0]."_500.".$url_arr[1];
        }else{
            $url = $url_arr[0].".".$url_arr[1];
        }
    
        $path = config('app.url')."uploads/images/".$folder.$url;
        return $path;
    }else{
        return "/images/no-image_500.png";
    }
    
}


function get_thumb_url_600($folder,$url,$is_optimized = 0){
    
    if($url != ''){
        $url_arr = explode('.', $url);
        
        if($is_optimized == 1){
            $url = $url_arr[0].".".$url_arr[1];
        }else{
            $url = $url_arr[0].".".$url_arr[1];
        }
    
        $path = config('app.url')."uploads/images/".$folder.$url;
        return $path;
    }else{
        return "/images/no-image_600.png";
    }
    
}


function getproducturl($product){
    $slug = $product->slug;
    $id = $product->id;

    return "/product/$slug/$id";
}

function getRecentProducts(){
    
    $products = App\Models\Products::orderBy('id','DESC')->limit(5)->get();
    return $products;
}


function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


function getLevel1Categories($child_count=0)
{
    $sql = "SELECT * FROM t_industries WHERE parent_id IN (SELECT id FROM t_industries WHERE parent_id = 0 ) ";
    $data = \DB::select($sql);

    $ind_arr = array();
    foreach ($data as $key => $value) {
        # code...
        $ind_arr[$value->parent_id][$value->id]['id'] = $value->id;
        $ind_arr[$value->parent_id][$value->id]['name'] = $value->name;
        $ind_arr[$value->parent_id][$value->id]['slug'] = $value->slug;
    }

    return $ind_arr;
}

function getHeaderIndustries()
{
    $industryIds = '1,2,3,4,5';
    $implodedIds = [1,2,3,4,5];
    $industries = App\Models\Industry::whereIn('id',$implodedIds)->orderByRaw("FIELD(t_industries.id,". $industryIds .")")->get();
    return $industries;
    
}
function getIndustriesProducts($industries)
{
    $indProducts = App\Models\Products::whereIn('industry_id',$industries->pluck('id')->toArray())->get();
    $products = [];
    
    foreach($indProducts as $key=>$value)
    {
        $products[$value->industry_id][] = $value;
    }

    return $products;
}

// for deleting product gallery images

function delete_image(Request $request,$id){
        $product_image = ProductImages::where('order_no',$request->image_id)->where('product_id',$request->product_id)->where('user_id',auth()->user()->id)->first();
        if($product_image)
        {
            $img_file_arr = explode('.', $product_image->img_name);
    
            $d = public_path('uploads/images/products/');
            @unlink($d.$product_image->img_name);
    
            $img_file_arr = explode('.', $product_image->img_name);
            
            @unlink($d.$img_file_arr[0]."_500.".$img_file_arr[1]);
            @unlink($d.$img_file_arr[0]."_200.".$img_file_arr[1]);
            @unlink($d.$img_file_arr[0]."_100.".$img_file_arr[1]);

            $product_image->forceDelete();
            return $request->image_id;
        }    
        else
        {
            return 0;
        }

    }
    
    
    
    function footerBlogs()
{
    $footBlogArticles = App\Models\BlogArticles::orderBy('id','ASC')->limit(3)->get();
    return $footBlogArticles;
}

function footerProducts()
{
    $footproducts = App\Models\Products::orderBy('id','ASC')->limit(5)->get();
    return $footproducts;
}

function get_blogthumb_url_500($folder,$url,$is_optimized = 0){
    
    if($url != ''){
        $url_arr = explode('.', $url);
        
        if($is_optimized == 1){
            $url = $url_arr[0]."_500.".$url_arr[1];
        }else{
            $url = $url_arr[0].".".$url_arr[1];
        }
    
        $path = config('app.url')."uploads/images/".$folder.$url;
        return $path;
    }else{
        return "/images/no-image_500.png";
    }
    
}
function getTopHeaderIndustries()
{
    $industries = App\Models\Industry::orderBy('id','ASC')->get();
    // $products = App\Models\Products::all();
    // $data = [
    //     'industries' => $industries,
    //     'products' => $products
    //     ];
    
    return $industries;
}




function str_slug($str){
    
    $slug = Str::slug($str, '-');
    
    return $slug;
}






function createHistory($table_name,$table_id,$before,$after){
    
    try{
        $user_ip = get_client_ip();
        $admin_id = auth('admin')->user()->id;    
        
        $history = new App\Models\History();
        $history->admin_id = $admin_id;
        $history->ip = $user_ip;
        $history->table_name = $table_name;
        $history->table_id = $table_id;
        $history->before = $before;
        $history->after = $after;
        
        $history->save();
    }
    catch(\Exception $e){
        //return $e;
    }
}



function createEvents(){
    
    $createHistory = App\Models\Events::get();
    
}


function str_random($length = 16) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $result = '';
    for ($i = 0; $i < $length; $i++) {
        $result .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $result;
}

function footerIndustry()
{
    $footindustry = App\Models\Industry::where('parent_id','0')->orderBy('id','ASC')->limit(5)->get();
    return $footindustry;
}
 
function getSearchBarData() {
    $addresses = ProductDetails::distinct('address') // Fetch only distinct addresses
        ->orderBy('address', 'ASC') // Optional: Order addresses alphabetically
        ->pluck('address'); // Extract only address values
        
    return $addresses;
}