<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Fronted Route
Route::get('/', [FrontendController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');




// Admin Route 
Route::get('/admin/login', [AdminController::class, 'showAdminLogin'])->name('admin.showLogin');
Route::post('/admin-login', [AdminController::class, 'adminLogin'])->name('admin.login');


Route::group(['middleware'=> 'admin'], function(){
    Route::get('/admin/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
    // ======== Category Route ======== 
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::post('/admin/store-category', [CategoryController::class, 'store'])->name('store.category');
    Route::get('/admin/categories/edit/{cat_id}', [CategoryController::class, 'edit']);
    Route::post('/admin/update-category', [CategoryController::class, 'update'])->name('update.category');
    Route::get('/admin/categories/delete/{cat_id}', [CategoryController::class, 'delete']);



});
require __DIR__.'/auth.php';