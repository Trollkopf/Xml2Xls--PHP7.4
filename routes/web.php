<?php

use App\Http\Controllers\ExcelUploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\XmlToExcelController;

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

Route::post('/convert', [XmlToExcelController::class, 'convert'])->name('convert.xml.to.excel');
Route::post('/upload-excel', [ExcelUploadController::class, 'uploadExcel'])->name('upload.excel');
Route::get('/upload', [ExcelUploadController::class, 'showUploadForm'])->name('upload.view');
