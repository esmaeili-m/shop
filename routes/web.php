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
    Route::get('list/category/attributes/{id}',\App\Livewire\Admin\Categories\Attributes::class)->name('category.attributes.index');

//    <------------------- {{ Posts }} ----------------------->
    Route::get('list/post',\App\Livewire\Admin\Post\Index::class)->name('post.list');
    Route::get('create/post',\App\Livewire\Admin\Post\Create::class)->name('post.create');
    Route::get('trash/post',\App\Livewire\Admin\Post\Trash::class)->name('post.trash');
    Route::get('update/post/{id}',\App\Livewire\Admin\Post\Update::class)->name('post.update');
    Route::get('list/attributes/{id}',\App\Livewire\Admin\Post\Attributes\Index::class)->name('post.attributes.index');
});
