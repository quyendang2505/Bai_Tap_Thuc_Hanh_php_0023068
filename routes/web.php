<?php

use App\Http\Controllers\LopHocController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SinhVienController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

// Sinh viên
Route::get('/sinhvien', [SinhVienController::class, 'index'])
    ->name('sinhvien.index');
Route::get('/sinhvien/add', [SinhVienController::class, 'add'])
    ->name('sinhvien.create');
Route::post('/sinhvien', [SinhVienController::class, 'store'])
    ->name('sinhvien.store');
Route::get('/sinhvien/show/{hoten?}/{tuoi?}', [SinhVienController::class, 'show'])
    ->whereNumber('tuoi')
    ->name('sinhvien.show');
Route::get('/sinhvien/get-id/{id?}', [SinhVienController::class, 'getID'])
    ->whereNumber('id')
    ->name('sinhvien.get-id');
Route::get('/sinhvien/{id}/edit', [SinhVienController::class, 'edit'])
    ->whereNumber('id')
    ->name('sinhvien.edit');
Route::put('/sinhvien/{id}', [SinhVienController::class, 'update'])
    ->whereNumber('id')
    ->name('sinhvien.update');
Route::delete('/sinhvien/{id}', [SinhVienController::class, 'destroy'])
    ->whereNumber('id')
    ->name('sinhvien.destroy');

// Lớp học
Route::get('/lophoc', [LopHocController::class, 'index'])
    ->name('lophoc.index');
Route::get('/lophoc/create', [LopHocController::class, 'create'])
    ->name('lophoc.create');
Route::post('/lophoc', [LopHocController::class, 'store'])
    ->name('lophoc.store');
Route::get('/lophoc/{lopHoc}/edit', [LopHocController::class, 'edit'])
    ->name('lophoc.edit');
Route::put('/lophoc/{lopHoc}', [LopHocController::class, 'update'])
    ->name('lophoc.update');
Route::delete('/lophoc/{lopHoc}', [LopHocController::class, 'destroy'])
    ->name('lophoc.destroy');

// Menu
Route::get('/menu', [MenuController::class, 'index'])
    ->name('menu.index');
Route::get('/menu/create', [MenuController::class, 'create'])
    ->name('menu.create');
Route::post('/menu', [MenuController::class, 'store'])
    ->name('menu.store');
Route::get('/menu/{menu}/edit', [MenuController::class, 'edit'])
    ->name('menu.edit');
Route::put('/menu/{menu}', [MenuController::class, 'update'])
    ->name('menu.update');
Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])
    ->name('menu.destroy');
