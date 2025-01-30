<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\EskulController;
use App\Http\Controllers\admin\JurusanController;
use App\Http\Controllers\admin\PendaftaranController;
use App\Http\Controllers\admin\UserController;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route::get('/template', function(){
    return view('template');
});

route::prefix('admin')->name('admin.')->group(function () {
    route::get('/index',[DashboardController::class,'index'])->name('index');
    route::get('/users',[UserController::class,'index'])->name('users');
    route::get('/user/create',[UserController::class,'create'])->name('createUser');
    route::post('user/store',[UserController::class, 'store'])->name('storeUser');
    route::get('/user/{id}/edit',[UserController::class,'edit'])->name('editUser');
    route::put('/user/{id}/update',[UserController::class,'update'])->name('updateUser');
    route::delete('user/{id}/',[UserController::class,'destroy'])->name('deleteUser');
    //jurusan
    route::get('/jurusan',[JurusanController::class,'index'])->name('jurusanIndex');
    route::get('/jurusan/create',[JurusanController::class,'create'])->name('jurusanCreate');
    route::post('jurusan/store',[JurusanController::class,'store'])->name('jurusanStore');
    route::get('/jurusan/{id}/edit',[JurusanController::class,'edit'])->name('jurusanEdit');
    route::put('/jurusan/{id}/update',[JurusanController::class,'update'])->name('jurusanUpdate');
    route::delete('/jurusan/{id}/destory',[JurusanController::class,'destroy'])->name('jurusanDelete');
    //eskul
    route::get('/eskul',[EskulController::class,'index'])->name('eskulIndex');
    route::get('/eskul/create',[EskulController::class,'create'])->name('createEskul');
    route::post('eskul/store',[EskulController::class,'store'])->name('storeEskul');
    route::get('/eskul/{id}/edit',[EskulController::class,'edit'])->name('editEskul');
    route::put('/eskul/{id}/update',[EskulController::class,'update'])->name('updateEskul');
    route::delete('/eskul/{id}/destroy',[EskulController::class,'destroy'])->name('deleteEskul');
    //pendaftaran
    route::get('/pendaftaran',[PendaftaranController::class,'index'])->name('pendaftaranIndex');
    route::get('/pendaftaran/create',[PendaftaranController::class,'create'])->name('pendaftaranCreate');
    route::post('/pendaftaran/store',[PendaftaranController::class,'store'])->name('pendaftaranStore');
}); 