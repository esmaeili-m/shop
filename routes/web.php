<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard;
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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->group(function (){
    Route::get('dashboard',Dashboard::class)->name('dashboard');

//    <------------------- {{ Categories }} ----------------------->
    Route::get('list/category',\App\Livewire\Admin\Categories\Index::class)->name('category.list');
    Route::get('create/category',\App\Livewire\Admin\Categories\Create::class)->name('category.create');
    Route::get('trash/category',\App\Livewire\Admin\Categories\Trash::class)->name('category.trash');
    Route::get('update/category/{id}',\App\Livewire\Admin\Categories\Update::class)->name('category.update');
    Route::get('price/category/{id}',\App\Livewire\Admin\Categories\Price::class)->name('category.price');
    Route::get('seo/category/{id}',\App\Livewire\Admin\Categories\Seo::class)->name('category.seo');
    Route::get('seo/update/category/{id}',\App\Livewire\Admin\Categories\SeoUpdate::class)->name('category.seo.update');
    Route::get('list/category/attributes/{id}',\App\Livewire\Admin\Categories\Attributes::class)->name('category.attributes.index');

//    <------------------- {{ Posts }} ----------------------->
    Route::get('list/post',\App\Livewire\Admin\Post\Index::class)->name('post.list');
    Route::get('create/post',\App\Livewire\Admin\Post\Create::class)->name('post.create');
    Route::get('trash/post',\App\Livewire\Admin\Post\Trash::class)->name('post.trash');
    Route::get('update/post/{id}',\App\Livewire\Admin\Post\Update::class)->name('post.update');
    Route::get('price/post/{id}',\App\Livewire\Admin\Post\Price::class)->name('post.price');
    Route::get('seo/post/{id}',\App\Livewire\Admin\Post\Seo::class)->name('post.seo');
    Route::get('seo/update/post/{id}',\App\Livewire\Admin\Post\SeoUpdate::class)->name('post.seo.update');
    Route::get('list/attributes/{id}',\App\Livewire\Admin\Post\Attributes\Index::class)->name('post.attributes.index');
//    <------------------- {{ Articles }} ----------------------->
    Route::get('list/article',\App\Livewire\Admin\Articles\Index::class)->name('article.list');
    Route::get('create/article',\App\Livewire\Admin\Articles\Create::class)->name('article.create');
    Route::get('trash/article',\App\Livewire\Admin\Articles\Trash::class)->name('article.trash');
    Route::get('update/article/{id}',\App\Livewire\Admin\Articles\Update::class)->name('article.update');
//    <------------------- {{ SocialMedia }} ----------------------->
    Route::get('list/social',\App\Livewire\Admin\SocialMedia\Index::class)->name('social.list');
    Route::get('update/social/{id}',\App\Livewire\Admin\SocialMedia\Update::class)->name('social.update');
//    <------------------- {{ Brands }} ----------------------->
    Route::get('list/brand',\App\Livewire\Admin\Post\Brand\Index::class)->name('brand.list');
    Route::get('update/brand/{id}',\App\Livewire\Admin\Post\Brand\Update::class)->name('brand.update');
//    <------------------- {{ Store }} ----------------------->
    Route::get('list/store/{id}',\App\Livewire\Admin\Post\Store::class)->name('store.list');



});
