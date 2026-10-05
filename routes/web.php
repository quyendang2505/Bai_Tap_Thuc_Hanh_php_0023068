<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\SinhVienController;
use App\http\Controllers\LopHocController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/sinhvien', [SinhVienController::class, 'index']);

// Route::get('/sinhvien/layout1   ', function () {
//     return view('sinhvien.layout1',[
//         'title' => 'Trang chủ',
//         'content' => '<script>console.log(123)</script>'
//     ]);
// });

// Route::get('/sinhvien/show/{hoten?}/{tuoi?}', [SinhVienController::class, 'show'])->where('tuoi', '[0-9]+');

// Route::get('/sinhvien/getID/{id?}', [SinhVienController::class, 'getID'])->where('id', '[0-9]+');
// Route::get('sinhvien/add', [SinhVienController::class, 'add']);

// Route::prefix('sinhvien')->group(function () {
//     Route::get('add', [SinhVienController::class, 'add']);
//     Route::post('store', [SinhVienController::class, 'store']);
// });

Route::resource('sinhvien', SinhVienController::class);

Route::resource('lophoc', \App\Http\Controllers\LopHocController::class)
    ->parameters(['lophoc' => 'lopHoc']);