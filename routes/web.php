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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::post('/emp-profile', [App\Http\Controllers\EmployeeController::class, 'store'])->middleware('auth')->name('emp_profile');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/create-branch', [App\Http\Controllers\TrainBranchController::class, 'index'])->middleware('auth')->name('create_branch');
Route::post('/create-branch', [App\Http\Controllers\TrainBranchController::class, 'store'])->middleware('auth')->name('create_branch_post');

Route::get('/assign-training', [App\Http\Controllers\TrainController::class, 'index'])->middleware('auth')->name('assign_train');
Route::post('/assign-training', [App\Http\Controllers\TrainController::class, 'store'])->middleware('auth')->name('assign_train_post');

Route::get('/demand', [App\Http\Controllers\DemandController::class, 'index'])->middleware('auth')->name('demand');
Route::post('/demand', [App\Http\Controllers\DemandController::class, 'store'])->middleware('auth')->name('demand_post');

Route::post('/client-pay/{amount}/{type}', [App\Http\Controllers\TransactionController::class, 'store'])->middleware('auth')->name('client_pay');
Route::post('/salary-pay', [App\Http\Controllers\TransactionController::class, 'pay_salary'])->middleware('auth')->name('salary_pay');

Route::get('/demnads', [App\Http\Controllers\DemandController::class, 'views'])->middleware('auth')->name('demands');
Route::view('/give-salary', 'salary')->middleware('auth')->name('salary');

Route::post('/par-profile', [App\Http\Controllers\PerticipatorController::class, 'store'])->middleware('auth')->name('par-profile');