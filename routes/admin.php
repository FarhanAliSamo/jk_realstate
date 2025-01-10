<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['admin_rights_check'])->group(function () {


// Route::get('/dashboard','app\HTTP\Controllers\Admin\DashboardController@index')->name('dashboard.index');

Route::get('/home', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');

Route::post('/save_basic_details',[App\Http\Controllers\Admin\DashboardController::class,'save_basic_details'])->name('save_basic_details');

Route::get('/banners',[App\Http\Controllers\Admin\DashboardController::class,'banners'])->name('banners.index');
Route::post('/upload_banners',[App\Http\Controllers\Admin\DashboardController::class,'upload_banners'])->name('upload_banners');

Route::get('/categories','App\Http\Controllers\Admin\CategoriesController@index')->name('categories.index');
Route::get('/categories/add','App\Http\Controllers\Admin\CategoriesController@add')->name('categories.add');
Route::post('/categories/save','App\Http\Controllers\Admin\CategoriesController@save')->name('categories.save');
Route::get('/categories/edit/{id}','App\Http\Controllers\Admin\CategoriesController@edit')->name('categories.edit');
Route::post('/categories/update/{id}','App\Http\Controllers\Admin\CategoriesController@update')->name('categories.update');
Route::get('/categories/delete/{id}',['uses' => 'App\Http\Controllers\Admin\CategoriesController@delete'])->name('categories.delete');
Route::post('/mce_upload_image','App\Http\Controllers\Admin\CategoriesController@mce_upload_image')->name('mce_upload_image');


Route::get('/aboutus/content',[App\Http\Controllers\Admin\ContentController::class,'aboutus_content'])->name('aboutus_content');
Route::get('/homepage/content',[App\Http\Controllers\Admin\ContentController::class,'homepage_content'])->name('homepage_content');
Route::post('/save_content',[App\Http\Controllers\Admin\ContentController::class,'save_content'])->name('save_content');

Route::get('/products','App\Http\Controllers\Admin\ProductsController@index')->name('products.index');
Route::get('/products/add',['uses' => 'App\Http\Controllers\Admin\ProductsController@add'])->name('products.add');
Route::post('/products/store',['uses' => 'App\Http\Controllers\Admin\ProductsController@store'])->name('products.store');
Route::get('/products/edit/{id}',['uses' => 'App\Http\Controllers\Admin\ProductsController@edit'])->name('products.edit');
Route::post('/products/update/{id}',['uses' => 'App\Http\Controllers\Admin\ProductsController@update'])->name('products.update');
Route::get('/products/delete/{id}',['uses' => 'App\Http\Controllers\Admin\ProductsController@delete'])->name('products.delete');
Route::post('/product_images_change_order',['uses' => 'Admin\ProductsController@product_images_order'])->name('product_images.order');
Route::post('/delete_image/{id}',['uses' => 'Admin\ProductsController@delete_image'])->name('delete_image');
Route::post('/mce_upload_image','Admin\ProductsController@mce_upload_image')->name('mce_upload_image');

// Admin upload hot link images
Route::post('/upload_editor_images',[App\Http\Controllers\Admin\ProductsController::class,'upload_editor_images'])->name('upload_editor_images');

Route::get('/blog/index',[App\Http\Controllers\Admin\BlogController::class,'index'])->name('blog.index');
Route::get('/blog/add',[App\Http\Controllers\Admin\BlogController::class,'add'])->name('blog.add');
Route::post('/blog/store',[App\Http\Controllers\Admin\BlogController::class,'store'])->name('blog.store');

Route::get('/blog/edit/{id}',['uses' => 'App\Http\Controllers\Admin\BlogController@edit'])->name('blog.edit');
Route::post('/blog/update/{id}',['uses' => 'App\Http\Controllers\Admin\BlogController@update'])->name('blog.update');
Route::get('/blog/delete/{id}',['uses' => 'App\Http\Controllers\Admin\BlogController@delete'])->name('blog.delete');
Route::post('/mce_upload_image','App\Http\Controllers\Admin\BlogController@mce_upload_image')->name('mce_upload_image');


// Inquiry Details

Route::get('/inquiries/index',['uses' => 'App\Http\Controllers\Admin\InquiryController@index'])->name('inquiries.index');
Route::get('/inquiries/delete/{id}',['uses' => 'App\Http\Controllers\Admin\InquiryController@delete'])->name('inquiries.delete');


Route::get('/pages/index',['uses' => 'App\Http\Controllers\Admin\PagesController@index'])->name('pages.index');
Route::get('/pages/edit/{type}',['uses' => 'App\Http\Controllers\Admin\PagesController@edit'])->name('pages.edit');
Route::post('/pages/update/{type}',['uses' => 'App\Http\Controllers\Admin\PagesController@update'])->name('pages.update');



Route::get('/redirection/index',['uses' => 'App\Http\Controllers\Admin\RedirectionsController@index'])->name('redirection.index');
Route::get('/redirection/add',['uses' => 'App\Http\Controllers\Admin\RedirectionsController@add'])->name('redirection.add');
Route::post('/redirection/store',['uses' => 'App\Http\Controllers\Admin\RedirectionsController@store'])->name('redirection.store');

Route::get('/redirection/edit/{id}',['uses' => 'App\Http\Controllers\Admin\RedirectionsController@edit'])->name('redirection.edit');
Route::post('/redirection/update/{id}',['uses' => 'App\Http\Controllers\Admin\RedirectionsController@update'])->name('redirection.update');

// admin routes

Route::get('/generate_sitemap',['uses' => 'App\Http\Controllers\Admin\DashboardController@generate_sitemap'])->name('generate_sitemap');
Route::get('/generate-image-sitemap',['uses' => 'App\Http\Controllers\Admin\DashboardController@generate_image_sitemap'])->name('generate_image_sitemap');
Route::get('/robots-update',['uses' => 'App\Http\Controllers\Admin\DashboardController@generate_robots'])->name('generate_robots');

Route::get('/robots/edit',[App\Http\Controllers\Admin\RobotsController::class,'edit'])->name('robots_content');
Route::put('/robots/update', 'Admin\RobotsController@update')->name('robots.update');

Route::get('/sitemap/edit',[App\Http\Controllers\Admin\SitemapController::class,'edit'])->name('sitemap_content');
Route::put('/sitemap/update', 'Admin\SitemapController@update')->name('sitemap.update');

// Blogs Messages

Route::get('/blogcomments/index',['uses' => 'App\Http\Controllers\Admin\BlogCommentsController@index'])->name('blogcomments.index');
Route::post('/blogcomments/update-info',['uses' => 'App\Http\Controllers\Admin\BlogCommentsController@updateInfo'])->name('blogcomments.update');
Route::get('/blogcomments/delete/{id}',['uses' => 'App\Http\Controllers\Admin\BlogCommentsController@delete'])->name('blogcomments.delete');
Route::get('/blogcomments/edit/{id}',['uses' => 'App\Http\Controllers\Admin\BlogCommentsController@edit'])->name('blogcomments.edit');
Route::post('/blogcomments/update/{id}',['uses' => 'App\Http\Controllers\Admin\BlogCommentsController@update'])->name('blogcomments.update_information');

// Backend_Script


Route::get('/backendscripts3/{action_name}','App\Http\Controllers\Admin\BackendScriptsController3@index')->name('backendscripts3');
});
