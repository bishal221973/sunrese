<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TrendController;
use App\Http\Controllers\TrendingController;
use App\Http\Controllers\UserCOntroller;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [FrontController::class, "index"])->name("home.web");
Route::get("sunrise/news/{id}", [FrontController::class, "postDetail"])->name("post.detail");
Route::get("news/all", [FrontController::class, "news"])->name("news");
Route::get("province/list", [FrontController::class, "province"])->name("province");
Route::get("province/all", [FrontController::class, "provinceAll"])->name("province.all");
Route::get("province/{id}", [FrontController::class, "provinceId"])->name("province.id");
Route::get("interview/all", [FrontController::class, "interview"])->name("interview");
Route::get("blog/all", [FrontController::class, "blog"])->name("blog.all");
Route::get("agriculture", [FrontController::class, "agriculture"])->name("agriculture");
Route::get("feature", [FrontController::class, "feature"])->name("feature");
Route::get("health", [FrontController::class, "health"])->name("health");
Route::get("saptaranga", [FrontController::class, "saptaranga"])->name("saptaranga");
Route::get("international", [FrontController::class, "international"])->name("international");
Route::get("sports", [FrontController::class, "sports"])->name("sports");
Route::get("rochak", [FrontController::class, "rochak"])->name("rochak");
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('settings', [SettingController::class, "index"])->name("setting");
Route::post('settings', [SettingController::class, "store"])->name("setting.store");
Route::put('settings/{webSetting}', [SettingController::class, "update"])->name("setting.update");
Route::put('image/{filename}', [SettingController::class, "getImage"])->name("image");

// Tag
Route::get('tag', [TagController::class, 'index'])->name('tag');
Route::post('tag/store', [TagController::class, 'store'])->name('tag.store');
Route::get('tag/edit/{tag}', [TagController::class, 'edit'])->name('tag.edit');
Route::put('tag/update/{tag}', [TagController::class, 'update'])->name('tag.update');
Route::delete('tag/delete/{tag}', [TagController::class, 'delete'])->name('tag.delete');
// post
Route::get('post', [PostController::class, "index"])->name('post');
Route::get('post/create', [PostController::class, "create"])->name('post.create');
Route::post('news/store', [PostController::class, "store"])->name('news.store');
Route::get('news/edit/{post}', [PostController::class, "edit"])->name('news.edit');
Route::put('news/update/{post}', [PostController::class, "update"])->name('news.update');
Route::delete('news/delete/{post}', [PostController::class, "delete"])->name('news.delete');

Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');

Route::get('video', [VideoController::class, 'index'])->name('video');
Route::post('video/store', [VideoController::class, 'store'])->name('video.store');
Route::get('video/edit/{video}', [VideoController::class, 'edit'])->name('video.edit');
Route::put('video/update/{video}', [VideoController::class, 'update'])->name('video.update');
Route::delete('video/delete/{video}', [VideoController::class, 'delete'])->name('video.delete');

Route::post('image-upload', [ImageController::class, 'store'])->name('image.upload');

Route::post('/upload-image', 'ImageController@upload')->name('upload.image');


Route::get('user', [UserCOntroller::class, 'index'])->name('user');
Route::get('user/create', [UserCOntroller::class, 'create'])->name('user.create');
Route::post('user/store', [UserCOntroller::class, 'store'])->name('user.store');
Route::get('user/edit/{user}', [UserCOntroller::class, 'edit'])->name('user.edit');
Route::put('user/edit/{user}', [UserCOntroller::class, 'update'])->name('user.update');
Route::delete('user/destroy/{user}', [UserCOntroller::class, 'destroy'])->name('user.destroy');
Route::get('user/profile/{user}', [UserCOntroller::class, 'editProfile'])->name('user.changeProfile');
Route::get('user/password/change/{user}', [UserCOntroller::class, 'editPassword'])->name('user.editPassword');
Route::put('user/password/change/{user}', [UserCOntroller::class, 'updatePassword'])->name('user.updatePassword');


Route::get('ads',[AdController::class,'index'])->name('ads');
Route::post('ads/store',[AdController::class,'store'])->name('ads.store');
Route::get('ads/edit/{ad}',[AdController::class,'editHome'])->name('ads.edit.home');
Route::put('ads/update/{ad}',[AdController::class,'update'])->name('ads.update');
Route::delete('ads/delete/{ad}',[AdController::class,'delete'])->name('ads.delete');

Route::get('header/ads',[AdController::class,'header'])->name('header.ads');
Route::get('body/ads',[AdController::class,'body'])->name('body.ads');
Route::get('allPage/ads',[AdController::class,'all'])->name('all.ads');
Route::get('allPage/ads/edit/{ad}',[AdController::class,'alleditHome'])->name('all.ads.edit');
Route::get('detailPage/ads',[AdController::class,'detail'])->name('detail.ads');

Route::post('trending',[TrendingController::class,'store'])->name('trending.store');
Route::post('trendingDelete',[TrendingController::class,'delete'])->name('trending.delete');



Route::get('sub-category',[SubCategoryController::class,'index'])->name('subcategory');
Route::post('sub-category',[SubCategoryController::class,'store'])->name('subcategory.store');
Route::get('sub-category/{id}',[SubCategoryController::class,'edit'])->name('subcategory.edit');
Route::put('sub-category/{id}',[SubCategoryController::class,'update'])->name('subcategory.update');
Route::delete('sub-category/{id}',[SubCategoryController::class,'delete'])->name('subcategory.delete');
Route::get('getCategory/{id}',[SubCategoryController::class,'get'])->name('subcategory.get');


Route::get('profile',[ProfileController::class,'index'])->name('profile');
Route::post('profile',[ProfileController::class,'store'])->name('profile.store');
Route::get('profile/{profile}',[ProfileController::class,'edit'])->name('profile.edit');
Route::put('profile/{profile}',[ProfileController::class,'update'])->name('profile.update');
Route::delete('profile/{profile}',[ProfileController::class,'delete'])->name('profile.delete');


Route::get('blog',[BlogController::class,'index'])->name('blog');
Route::get('blog/create',[BlogController::class,'create'])->name('create.blog');
Route::post('blog',[BlogController::class,'store'])->name('blog.store');
Route::get('blog/{blog}',[BlogController::class,'edit'])->name('blog.edit');
Route::put('blog/{blog}',[BlogController::class,'update'])->name('blog.update');
Route::delete('blog/{blog}',[BlogController::class,'delete'])->name('blog.delete');


Route::get("blog/detail/{id}", [FrontController::class, "blogDetail"])->name("blog.detail");


Route::get('trend/{id}',[TrendController::class,'trend'])->name('trend');
Route::get('/foo', function () {
    Artisan::call('storage:link');
});



Route::get('/migrate',function(){
    $exitCode=Artisan::call('migrate');
});

Route::get('/migrate-refresh',function(){
    $exitCode=Artisan::call('migrate:refresh');
});

Route::get('/seed',function(){
    $exitCode=Artisan::call('db:seed');
    return $exitCode;
});

Route::get('/update-composer', function () {
    chdir('../../A');
   exec('pwd /usr/local/bin/composer update',$output);
print_r ($output);
});


Route::get('/update-dependencies', 'App\Http\Controllers\FrontController@updateDependencies');
