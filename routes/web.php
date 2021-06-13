<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenceController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\ExpenceCategoryController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\RecycleController;

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

Route::get('/', function () {
    return view('welcome');
});

//admin route
Route::get('/admin', [AdminController::class, 'index']);
//user route
Route::get('/admin/user', [UserController::class, 'alluser']);
Route::get('/admin/user/add', [UserController::class, 'adduser']);
Route::get('/admin/user/edit/{slug}', [UserController::class, 'edit']);
Route::get('/admin/user/view/{slug}', [UserController::class, 'view']);
Route::get('/admin/user/softdelete/{slug}', [UserController::class, 'softdelete']);
Route::post('/admin/user/add/submit', [UserController::class, 'insert']);
Route::post('/admin/user/edit/submit', [UserController::class, 'update']);
Route::get('/admin/user/pdf', [UserController::class, 'pdf']);
Route::get('/admin/user/excel', [UserController::class, 'excel']);

//income route
Route::get('/admin/income', [IncomeController::class, 'allincome']);
Route::get('/admin/income/add', [IncomeController::class, 'addincome']);
Route::get('/admin/income/edit/{slug}', [IncomeController::class, 'edit']);
Route::get('/admin/income/view/{slug}', [IncomeController::class, 'view']);
Route::post('/admin/income/add/submit', [IncomeController::class, 'insert']);
Route::post('/admin/income/softdelete', [IncomeController::class, 'softdelete']);
Route::post('/admin/income/edit/submit', [IncomeController::class, 'update']);
Route::get('/admin/income/recycle', [IncomeController::class, 'recycle']);
Route::get('/admin/income/restore/{slug}', [IncomeController::class, 'restore']);
Route::get('/admin/income/delete/{id}', [IncomeController::class, 'delete']);

//expence route
Route::get('/admin/expence', [ExpenceController::class, 'index']);
Route::get('/admin/expence/add', [ExpenceController::class, 'add']);
Route::post('/admin/expence/add/submit', [ExpenceController::class, 'insert']);
Route::get('/admin/expence/edit/{slug}', [ExpenceController::class, 'edit']);
Route::get('/admin/expence/view/{slug}', [ExpenceController::class, 'view']);
Route::post('/admin/expence/edit/update', [ExpenceController::class, 'update']);
Route::post('/admin/expence/softdelete', [ExpenceController::class, 'softdelete']);
Route::get('/admin/expence/recycle', [ExpenceController::class, 'recycle']);
Route::get('/admin/expence/restore/{slug}', [ExpenceController::class, 'restore']);
Route::get('/admin/expence/delete/{id}', [ExpenceController::class, 'delete']);

//expence category route
Route::get('/admin/expence/category', [ExpenceCategoryController::class, 'index']);
Route::get('/admin/expence/category/add', [ExpenceCategoryController::class, 'add']);
Route::get('/admin/expence/category/view/{id}', [ExpenceCategoryController::class, 'view']);
Route::get('/admin/expence/category/edit/{id}', [ExpenceCategoryController::class, 'edit']);
Route::post('/admin/expence/category/edit/submit', [ExpenceCategoryController::class, 'update']);
Route::post('/admin/expence/category/add/submit', [ExpenceCategoryController::class, 'insert']);
Route::post('/admin/expence/category/softdelete', [ExpenceController::class, 'softdelete']);

//income category route
Route::get('/admin/income/category', [IncomeCategoryController::class, 'index']);
Route::get('/admin/income/category/add', [IncomeCategoryController::class, 'add']);
Route::get('/admin/income/category/view/{id}', [IncomeCategoryController::class, 'view']);
Route::get('/admin/income/category/edit/{id}', [IncomeCategoryController::class, 'edit']);
Route::post('/admin/income/category/add/submit', [IncomeCategoryController::class, 'insert']);
Route::post('/admin/income/category/edit/submit', [IncomeCategoryController::class, 'update']);
Route::get('/admin/income/category/softdelete/{id}', [IncomeCategoryController::class, 'softdelete']);

//Manage route
Route::get('/admin/manage', [ManageController::class, 'index']);
//Summary route
Route::get('/admin/summary', [SummaryController::class, 'index']);
Route::get('/admin/summary/search/{form}/{to}', [SummaryController::class, 'search']);
//Recycle route
Route::get('/admin/recycle', [RecycleController::class, 'index']);

// laravel route
Route::get('/dashboard', function () {
    return redirect('admin');
    
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
