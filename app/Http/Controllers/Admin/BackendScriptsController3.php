<?php
namespace App\Http\Controllers\Admin;

// header('Content-Type: text/plain; charset=utf-8');

set_time_limit(0);

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Products;
use App\Models\ProductDetails;
use App\Models\Industry;


class BackendScriptsController3 extends Controller
{
    //
    public function index(Request $request,$action_name){
    	if($action_name != ''){
    		$func_name = $action_name;

    		$this->$action_name();
    	}
    }
    
 
    
    public function insert_ab_products(){
        $sql = "SELECT keyword FROM `ab_products_html`";
        $data = \DB::select($sql);
        
        foreach($data as $key => $value){
            $name = $value->keyword;
            
            $name =str_replace(['_','.html'],[' ',''],$name);
            
            $slug = str_slug($name);

            $sql = "INSERT IGNORE INTO industries (name,slug) VALUES ('$name','$slug')";
            
            \DB::insert($sql);
        }
        
        $sql = "SELECT * FROM industries";
        $data = \DB::select($sql);
        
        
        
        $groups_arr = array();
        foreach($data as $key => $value){
            $groups_arr[strtolower($value->name)] = $value->id;
        }
        
        // create Products
        $sql = "SELECT * FROM ab_products_html WHERE product_id = 0" ;
        $data = \DB::select($sql);
        
        // foreach($data as $key => $value){
        //     // $sql = "UPDATE ab_products_html SET product_id = 1 WHERE id = $value->id";
        //     \DB::update($sql);
        // }
        
        foreach($data as $key => $value){
            $name = $value->title;
            $slug = str_slug($name);
            $keywords = $value->keyword;
            $images_arr = json_decode($value->images);
            
            $uploaded_images = $this->ab_upload_images($images_arr,$name);
            
            
            
            if(count($uploaded_images) == 0){
                
                echo "here";
                continue;
            }

            $thumbnail_img = $uploaded_images[0];
            
            
            $temp_kw = str_replace(['_','.html'],[' ',''],$value->keyword);
            // dd($groups_arr);
            

            
            if(isset($groups_arr[strtolower($temp_kw)])){
                $group_id = $groups_arr[strtolower($temp_kw)];
            }
            
            $dated = date('Y-m-d H:i:s');
            
            // $sql = "SELECT count(*) as total FROM products where user_id = $user_id";
            $sql = "SELECT count(*) as total FROM products";
            $prod_total = \DB::select($sql);
            $order_no = $prod_total[0]->total+1;
            
            $sql = "INSERT INTO products (
                name,
                keywords,
                thumbnail_img,
                slug,
                industry_id,
                created_at,
                updated_at
                ) 
            VALUES (
                '$name',
                '$keywords',
                '$thumbnail_img',
                '$slug',
                '$group_id',
                '$dated',
                '$dated'
            )";
            
            \DB::insert($sql);
            $prod_id = \DB::getPdo()->lastInsertId();
            
            if(count($uploaded_images) > 1){
                foreach($uploaded_images as $k => $img){
                    if($k > 0){
                        $k = $k+1;
                        $sql = "INSERT INTO products_images (product_id,img_name,order_no,created_at,updated_at) VALUES (
                                '$prod_id',
                                '$img',
                                '$k',
                                '$dated',
                                '$dated'
                            )";
                            
                        \DB::insert($sql);
                    }
                }
            }
            
            $desc = html_entity_decode($value->details);
            $desc = $this->upload_editor_images($desc,$value->title);
            $desc = $this->clean_links($desc);
            $desc = str_replace('<noscript>','',$desc);
            $desc = preg_replace('#<style>(.*?)</style>#','',$desc);
            
            $desc = str_replace("'",'',$desc);
            
            $desc = $this->upload_editor_images2($desc,$value->title);
            
            // $desc = "";
            
            $min_price = $value->min_price;
            $max_price = $value->max_price;
            
            $sql = "INSERT INTO products_details (product_id,description,min_price,max_price,price_unit,created_at,updated_at) VALUES (
                    '$prod_id',
                    '$desc',
                    '$min_price',
                    '$max_price',
                    'pieces',
                    '$dated',
                    '$dated'
                )";
                
            \DB::insert($sql);
            
            $attributes_arr = json_decode($value->attributes);
            
            if($attributes_arr != '' && !$attributes_arr){
                foreach($attributes_arr as $label => $val){
                    
                    $sql = "INSERT INTO products_attributes (product_id,attribute_label,attribute_value,created_at,updated_at) VALUES (
                            '$prod_id',
                            '$label',
                            '$val',
                            '$dated',
                            '$dated'
                        )";
                    
                    \DB::insert($sql);
                }
            }
            
            
            $sql = "UPDATE ab_products_html SET product_id = '$prod_id' WHERE id = $value->id";
            \DB::update($sql);
            
        }
        
        echo "DONE!";
        die;
    }
    
    
    
    function ab_upload_images($images_arr,$title){
        // $img = public_path("/uploads/images/products/0/3/jade-eggsyoni-eggskegel-eggs-women-pc-muscle-training-3-in-1-set0-0773245001632468439.jpeg");
        // // dd($img);
        
        // $img = \Image::make($img);
        // dd($img);
        $uploaded_images = array();
        
        foreach($images_arr as $key => $value){
            $img_url = $value;
            $img_url = str_replace('http:', '', $img_url);
            $img_url = str_replace('https:', '', $img_url);
            
            $img_url = str_replace('_50x50.png','',$img_url);
            $img_url = str_replace('_50x50.jpg','',$img_url);
            $img_url = str_replace('_50x50.jpeg','',$img_url);
            $img_url = str_replace('_50x50.gif','',$img_url);
            
            if(strpos($img_url, '.jpg') != false){
                // $img_url = str_replace('.jpg', '.jpg_300x300.jpg', $img_url);
                $img_name = str_slug($title);
                $ext = ".jpg";
            }

            if(strpos($img_url, '.jpeg') != false){
                // $img_url = str_replace('.jpeg', '.jpeg_300x300.jpeg', $img_url);
                $img_name = str_slug($title);
                $ext = ".jpeg";
            }

            if(strpos($img_url, '.png') != false){
                // $img_url = str_replace('.png', '.png_300x300.png', $img_url);
                $img_name = str_slug($title);
                $ext = ".png";
            }

            if(strpos($img_url, '.gif') != false){
                // $img_url = str_replace('.gif', '.gif_300x300.gif', $img_url);
                $img_name = str_slug($title);
                $ext = ".gif";
            }
            
            
            $img_url = str_replace('//', 'https://', $img_url);
            $img_url = str_replace('productshttps:/','products',$img_url);
             $img_url = str_replace('img2','img6',$img_url);
            
         
            
            
            // echo($img_url); 
            
            // die;
            
            $fileName = $img_name."$key-".get_clean_microtimestamp_string();
            $img_name = $fileName."".$ext;

            $f1 = mt_rand(0,9);
            $f2 = mt_rand(0,9);

            if(my_file_exists($img_url)){
                $img = public_path("uploads/images/products/$f1/$f2/$img_name");
                @file_put_contents($img, file_get_contents($img_url));
                


                $file_name_500 = "/$f1/$f2/" . str_slug($fileName)."_500";
                $file_name_200 = "/$f1/$f2/" . str_slug($fileName)."_200";
                $file_name_100 = "/$f1/$f2/" . str_slug($fileName)."_100";
                $img = \Image::make($img);
                
                //save _500
                $img->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });         
    
                $img->save(public_path("uploads/images/products/" . $file_name_500 . $ext));
    
                //save 200
                $img->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
    
                $img->save(public_path("uploads/images/products/" . $file_name_200 . $ext)); 
    
                //save 100
                $img->resize(100, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
    
                $img->save(public_path("uploads/images/products/" . $file_name_100 . $ext));  


                
                $uploaded_images[] = "/$f1/$f2/$img_name";
            }
        }
        
        return $uploaded_images;
    }
    
    
        
    function upload_editor_images2($desc,$title){
        $regex_editor_images = '#<img src="(.*?)" (.*?)>#ism';
        preg_match_all($regex_editor_images,$desc,$matches);
        
        foreach($matches[1] as $k => $img_url){
            $img_url = str_replace('http:', '', $img_url);
            $img_url = str_replace('https:', '', $img_url);
            
            
            if(strpos($img_url, '.jpg') != false){
                $img_name = str_slug($title);
                $ext = ".jpg";
            }

            if(strpos($img_url, '.jpeg') != false){
                $img_name = str_slug($title);
                $ext = ".jpeg";
            }

            if(strpos($img_url, '.png') != false){
                $img_name = str_slug($title);
                $ext = ".png";
            }

            if(strpos($img_url, '.gif') != false){
                $img_name = str_slug($title);
                $ext = ".gif";
            }
                
            $img_url = str_replace('//', 'https://', $img_url);
            
            $img_url = "https://www1.tradewheel.com".$img_url;
            
            $img_name = $img_name."$k-".get_clean_microtimestamp_string()."".$ext;

            $f1 = mt_rand(0,9);
            $f2 = mt_rand(0,9);

            if(my_file_exists($img_url)){
                $img = public_path("uploads/images/products/$f1/$f2/$img_name");
                @file_put_contents($img, file_get_contents($img_url));
                $file_path = "/$f1/$f2/$img_name";
                
                $temp_img_url = '<img class="img-responsive" src="/uploads/images/products/'.$file_path.'" >';
                $desc = str_replace($matches[0][$k],$temp_img_url,$desc);
            }
        }
        
        return $desc;
    }
    
    
    function upload_editor_images($desc,$title){
        $regex_editor_images = '#<img src="(.*?)" data-src="(.*?)" (.*?)>#ism';
        preg_match_all($regex_editor_images,$desc,$matches);
        
        foreach($matches[2] as $k => $img_url){
            $img_url = str_replace('http:', '', $img_url);
            $img_url = str_replace('https:', '', $img_url);
            
            
            if(strpos($img_url, '.jpg') != false){
                $img_name = str_slug($title);
                $ext = ".jpg";
            }

            if(strpos($img_url, '.jpeg') != false){
                $img_name = str_slug($title);
                $ext = ".jpeg";
            }

            if(strpos($img_url, '.png') != false){
                $img_name = str_slug($title);
                $ext = ".png";
            }

            if(strpos($img_url, '.gif') != false){
                $img_name = str_slug($title);
                $ext = ".gif";
            }
                
            $img_url = str_replace('//', 'https://', $img_url);
            $img_name = $img_name."$k-".get_clean_microtimestamp_string()."".$ext;

            $f1 = mt_rand(0,9);
            $f2 = mt_rand(0,9);

            if(my_file_exists($img_url)){
                $img = public_path("uploads/images/products/$f1/$f2/$img_name");
                @file_put_contents($img, file_get_contents($img_url));
                $file_path = "/$f1/$f2/$img_name";
                
                $temp_img_url = '<img class="img-responsive" src="/uploads/images/products/'.$file_path.'" >';
                $desc = str_replace($matches[0][$k],$temp_img_url,$desc);
            }
        }
        
        return $desc;
        
    }
    
    function clean_links($desc){
        $regex_links = '#href="(.*?)"#ism';
        preg_match_all($regex_links,$desc,$matches);
        
        foreach($matches[1] as $key => $value){
            $desc = str_replace($value,'',$desc);
        }
        
        $desc = str_replace('<a','<span',$desc);
        $desc = str_replace('</a','</span',$desc);
        
        return $desc;
    }
    
    function set_thumbs(){
        $sql = "SELECT * FROM products";
        $data = \DB::select($sql);
        
        foreach($data as $key => $value){
            $id = $value->id;
            
            $sql = "SELECT * FROM products_images WHERE product_id = $id AND order_no = 2";
            $temp_data = \DB::select($sql);
            
            if($temp_data[0]->img_name != ''){
                $img_src = $temp_data[0]->img_name;
                
                $sql = "UPDATE products SET thumbnail_img = '".$img_src."' WHERE id = $id";
                \DB::select($sql);
            }
        }
        
    }
    
    
    function set_description(){
        $sql = "SELECT * FROM `ab_products_html` WHERE product_id > 0 ";
        $data = \DB::select($sql);
        
        foreach($data as $key => $value){
            $details = $value->details;
            
            $desc = html_entity_decode($value->details);
            $desc = $this->upload_editor_images($desc,$value->title);
            $desc = $this->clean_links($desc);
            $desc = str_replace('<noscript>','',$desc);
            $desc = preg_replace('#<style>(.*?)</style>#','',$desc);
            
            $desc = str_replace("'",'',$desc);
            
            // $desc = htmlentities($desc);
            
            $sql = "UPDATE products_details SET description = '".$desc."' WHERE product_id = $value->product_id";
            \DB::update($sql);
        }
        
    }
    
    

    
    
    function get_linked_images(){
        
        $sql = "SELECT * FROM `products_details` WHERE description LIKE '%alicdn%'";
        $prods = \DB::select($sql);
        
        foreach($prods as $k1 => $value){
            $pid = $value->product_id;
            
            $sql = "SELECT * FROM `products_details` WHERE product_id = $pid";
            $data = \DB::select($sql);
            
            $desc = $data[0]->description;
            
            $regex_imgs = '#<img style="(.*?)" src="(.*?)" (.*?) data-src="(.*?)" data-alt="(.*?)" />#ism';
            preg_match_all($regex_imgs,$desc,$matches);
            
            foreach($matches[4] as $key => $img_url){
                
                $img_url = str_replace('http:', '', $img_url);
                $img_url = str_replace('https:', '', $img_url);
                
                $title = "p".$key;
                
                if(strpos($img_url, '.jpg') != false){
                    $img_name = str_slug($title);
                    $ext = ".jpg";
                }
    
                if(strpos($img_url, '.jpeg') != false){
                    $img_name = str_slug($title);
                    $ext = ".jpeg";
                }
    
                if(strpos($img_url, '.png') != false){
                    $img_name = str_slug($title);
                    $ext = ".png";
                }
    
                if(strpos($img_url, '.gif') != false){
                    $img_name = str_slug($title);
                    $ext = ".gif";
                }
                
                $img_url = str_replace('//', 'https://', $img_url);
                $img_name = $img_name."$key-".get_clean_microtimestamp_string()."".$ext;
    
                $f1 = mt_rand(0,9);
                $f2 = mt_rand(0,9);
    
    
                if(my_file_exists($img_url)){
                    $img = public_path("uploads/images/products/$f1/$f2/$img_name");
                    @file_put_contents($img, file_get_contents($img_url));
                    $file_path = "/$f1/$f2/$img_name";
                    
                    $temp_img_url = '<img class="img-responsive" src="/uploads/images/products/'.$file_path.'" >';
                    $desc = str_replace($matches[0][$key],$temp_img_url,$desc);
                }
                
            }
            
            $product = ProductDetails::where('product_id',$pid)->first();
            $product->description = $desc;
            $product->save();
        
        }
        
        echo "done";
        die;
    }
    
    

}
