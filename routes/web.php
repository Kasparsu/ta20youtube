<?php

use App\Http\Controllers\LikeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\VideoController;
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

Route::get('/', [PublicController::class, 'index'])->name('public.index');

Route::get('/tag/{tag}', [PublicController::class, 'tag'])->name('public.tag');

Route::get('/video/{video}', [PublicController::class, 'video'])->name('public.video');


Route::middleware('auth')->group(function(){
    Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
    Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create');
    Route::post('/videos', [VideoController::class, 'store'])->name('videos.store');
    Route::get('/videos/{video}', [VideoController::class, 'show'])->name('videos.show');
    Route::get('/videos/{video}/edit', [VideoController::class, 'edit'])->name('videos.edit');
    Route::post('/videos/{video}', [VideoController::class, 'update'])->name('videos.update');
    Route::get('/videos/{video}/delete', [VideoController::class, 'destroy'])->name('videos.destroy');

    Route::get('/video/{video}/like', [LikeController::class, 'like'])->name('video.like');

});

Route::get('/pages/page1', [PublicController::class, 'page1'])->name('public.page1');
Route::get('/pages/page2', [PublicController::class, 'page2'])->name('public.page2');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
