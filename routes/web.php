<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomePageController::class, 'index'])->name('homepage.index');

// Route::get('/register', [App\Http\Controllers\RegisterController::class, 'register'])->name('register');
// Route::post('/register', [App\Http\Controllers\RegisterController::class, 'signup'])->name('signup');

// Route::get('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
// Route::post('/authenticate', [App\Http\Controllers\LoginController::class, 'authenticate'])->name('authenticate');

Route::get('/admin/login', [App\Http\Controllers\LoginController::class, 'admin_login'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\LoginController::class, 'admin_authenticate'])->name('admin.authenticate');

Route::post('/admin/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('admin.logout');
Route::post('/product/{slug}/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');



Route::get('/','App\Http\Controllers\HomePageController@index')->name('homepage.index');

Route::get('/appointment', 'App\Http\Controllers\AppointmentController@index');
Route::post('/appointment', 'App\Http\Controllers\AppointmentController@store');


Route::get('/products','App\Http\Controllers\ProductController@all_products')->name('all_products');
Route::get('/product-category/{slug}','App\Http\Controllers\ProductController@category_products')->name('category_products');


Route::get('/blogs','App\Http\ControllersBlogs\Controller@index')->name('blogs.index');
Route::get('/blogs/{slug}','App\Http\Controllers\BlogsController@view')->name('blogs.view');


Route::post('/save_contact/{id}','App\Http\Controllers\ContactFormController@save_contact')->name('save_contact');
Route::post('/subscribe-newsletter','App\Http\Controllers\ContactFormController@emailSubscribe')->name('email_subscribe');
Route::post('/save-appointment', 'App\Http\Controllers\ContactFormController@saveAppointment')->name('save-appointment');


// List all reviews
Route::get('/reviews', 'App\Http\Controllers\ReviewsController@index')->name('reviews.index');

// Show the form for creating a new review
Route::get('/reviews/create', 'App\Http\Controllers\ReviewsController@create')->name('reviews.create');

// Store a new review
Route::post('/reviews', 'App\Http\Controllers\ReviewsController@store')->name('reviews.store');

// Show a specific review
Route::get('/reviews/{review}', 'App\Http\Controllers\ReviewsController@show')->name('reviews.show');

// Show the form for editing a review
Route::get('/reviews/{review}/edit', 'App\Http\Controllers\ReviewsController@edit')->name('reviews.edit');

// Update a specific review
Route::put('/reviews/{review}', 'App\Http\Controllers\ReviewsController@update')->name('reviews.update');

// Delete a specific review
Route::delete('/reviews/{review}', 'App\Http\Controllers\ReviewsController@destroy')->name('reviews.destroy');







Route::get('/product/{slug}/{id}','App\Http\Controllers\ProductController@show')->name('product.show');
Route::get('/about-us','App\Http\Controllers\StaticPageController@about_us')->name('homepage.about_us');
Route::get('/introduction','App\Http\Controllers\StaticPageController@introduction')->name('homepage.introduction');
Route::get('/contact-us','App\Http\Controllers\StaticPageController@contact_us')->name('homepage.contact_us');
Route::get('/video','App\Http\Controllers\StaticPageController@video')->name('homepage.video');
Route::get('/project_case','App\Http\Controllers\StaticPageController@project_case')->name('homepage.project_case');
Route::get('/banner','App\Http\Controllers\StaticPageController@banner')->name('homepage.banner');

Route::get('/certificate','StaticPageController@certificate')->name('homepage.certificate');
Route::get('/catalog','StaticPageController@catalog')->name('homepage.catalog');
Route::get('/blogs','App\Http\Controllers\BlogsController@index')->name('blogs.index');
Route::get('/blogs/{slug}','App\Http\Controllers\BlogsController@view')->name('blogs.view');

Route::post('/save-comment','ContactFormController@saveComments')->name('save_comments');

