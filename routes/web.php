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
    Route::get('category/list',\App\Livewire\Admin\Categories\Index::class)->name('category.list');
    Route::get('create/category',\App\Livewire\Admin\Categories\Create::class)->name('category.create');
    Route::get('trash/category',\App\Livewire\Admin\Categories\Trash::class)->name('category.trash');
    Route::get('update/category/{id}',\App\Livewire\Admin\Categories\Update::class)->name('category.update');
});
