<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::view('/', 'index');
Route::get('/getIndexFileData', [MainController::class,'getIndexFileData']);
Route::view('/manageData',"allData");
Route::get('/getTableData',[MainController::class,'getTableData'])->name('getTableData');
Route::get('/showSourceData',[MainController::class,'showSourceData']);
Route::get('/getSourceDataForGrid/{sourceName}',[MainController::class,'getSourceDataForGrid']);

