<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\KasusController;
use App\Http\Controllers\KecKelController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DataDiriController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\DataKasusController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PuskesmasController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\TestController;

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

Route::get('/', [LandController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/member', [MemberController::class, 'index']);
Route::get('/member-edit/{id}', [MemberController::class, 'edit']);
Route::get('/member-destroy/{id}', [MemberController::class, 'destroy']);
Route::get('/member-request', [MemberController::class, 'request'])->name('member-request');
Route::get('/member-update/{id}', [MemberController::class, 'update']);
Route::get('/member-broadcast', [MemberController::class, 'broadcast']);
// Route::get('/testUrl/{id}', [TestController::class, 'getAjax']);


Route::get('/alternatif', [AlternatifController::class, 'index']);
// Route::get('/alternatif-add', [AlternatifController::class, 'create']);
// Route::post('/alternatif-store', [AlternatifController::class, 'store']);
Route::get('/alternatif-edit/{id}/{table}', [AlternatifController::class, 'edit'])->name('alternatif-edit');
Route::put('/alternatif-update/{id}/{table}', [AlternatifController::class, 'update']);
Route::get('/alternatif-destroy/{id}/{table}', [AlternatifController::class, 'destroy']);

// Route::get('/bobot', [BobotController::class, 'index']);
// Route::get('/bobot-add/{table}', [BobotController::class, 'create']);
// Route::post('/bobot-store/{table}', [BobotController::class, 'store']);
// Route::get('/bobot-edit/{id}/{table}', [BobotController::class, 'edit']);
// Route::put('/bobot-update/{id}/{table}', [BobotController::class, 'update']);
// Route::get('/bobot-destroy/{id}/{tabel}', [BobotController::class, 'destroy']);

Route::get('/kriteria', [KriteriaController::class, 'index']);
Route::get('/kriteria-add/{table}', [KriteriaController::class, 'create']);
Route::post('/kriteria-store/{table}', [KriteriaController::class, 'store']);
Route::get('/kriteria-edit/{id}/{table}', [KriteriaController::class, 'edit'])->name('kriteria-edit');
Route::put('/kriteria-update/{id}/{table}', [KriteriaController::class, 'update']);
Route::get('/kriteria-destroy/{id}/{table}', [KriteriaController::class, 'destroy']);

Route::get('/akun-add', [AkunController::class, 'create']);
Route::post('/akun-store', [AkunController::class, 'store']);

Route::get('/dataDiri', [DataDiriController::class, 'index']);
Route::get('/dataDiri-edit/{id}', [DataDiriController::class, 'edit'])->name('dataDiri-edit');
Route::put('/dataDiri-update/{id}', [DataDiriController::class, 'update']);

// Route::get('/perhitungan-matriks_ternormalisasi', [PerhitunganController::class, 'matriks_ternormalisasi']);
Route::get('/perhitungan-validation', [PerhitunganController::class, 'validation']);
Route::get('/perhitungan-result', [PerhitunganController::class, 'result']);
Route::post('/perhitungan-broadcast', [PerhitunganController::class, 'broadcast']);

Route::get('/pengumuman', [PengumumanController::class, 'index']);


// Route::get('/dataKasus/{tahun}', [DataKasusController::class, 'index']);

// Route::get('/peta', [PetaController::class, 'index']);
// Route::get('/peta-request', [PetaController::class, 'request'])->name('peta-request');



// Route::get('/kasus/{tahun}', [KasusController::class, 'index'])->middleware('auth');
// Route::get('/kasus-add', [KasusController::class, 'create'])->middleware('auth');
// Route::post('/kasus-store', [KasusController::class, 'store'])->middleware('auth');
// Route::get('/kasus-edit/{id}', [KasusController::class, 'edit'])->middleware('auth');
// Route::put('/kasus-update/{id}', [KasusController::class, 'update'])->middleware('auth');
// Route::get('/kasus-destroy/{id}', [KasusController::class, 'destroy'])->middleware('auth');

// Route::get('/puskesmas', [PuskesmasController::class, 'index'])->middleware('auth');
// Route::get('/puskesmas-add', [PuskesmasController::class, 'create'])->middleware('auth');
// Route::post('/puskesmas-store', [PuskesmasController::class, 'store'])->middleware('auth');
// Route::get('/puskesmas-edit/{id}', [PuskesmasController::class, 'edit'])->middleware('auth');
// Route::put('/puskesmas-update/{id}', [PuskesmasController::class, 'update'])->middleware('auth');
// Route::get('/puskesmas-destroy/{id}', [PuskesmasController::class, 'destroy'])->middleware('auth');

// Route::get('/kecamatan', [KecamatanController::class, 'index'])->middleware('auth');
// Route::get('/kecamatan-add', [KecamatanController::class, 'create'])->middleware('auth');
// Route::post('/kecamatan-store', [KecamatanController::class, 'store'])->middleware('auth');
// Route::get('/kecamatan-edit/{id}', [KecamatanController::class, 'edit'])->middleware('auth');
// Route::put('/kecamatan-update/{id}', [KecamatanController::class, 'update'])->middleware('auth');
// Route::get('/kecamatan-destroy/{id}', [KecamatanController::class, 'destroy'])->middleware('auth');

// Route::get('/kelurahan', [KelurahanController::class, 'index'])->middleware('auth');
// Route::get('/kelurahan-add', [KelurahanController::class, 'create'])->middleware('auth');
// Route::post('/kelurahan-store', [KelurahanController::class, 'store'])->middleware('auth');
// Route::get('/kelurahan-edit/{id}', [KelurahanController::class, 'edit'])->middleware('auth');
// Route::put('/kelurahan-update/{id}', [KelurahanController::class, 'update'])->middleware('auth');
// Route::get('/kelurahan-destroy/{id}', [KelurahanController::class, 'destroy'])->middleware('auth');

// Route::get('/teachers', [TeacherController::class, 'index']);
// Route::get('/teacher/{id}', [TeacherController::class, 'show']);

// Route::get('/classrooms', [ClassroomController::class, 'index']);
// Route::get('/classroom/{id}', [ClassroomController::class, 'show']);

// Route::get('/extracurriculars', [ExtracurricularController::class, 'index']);
// Route::get('/extracurricular/{id}', [ExtracurricularController::class, 'show']);

// Route::get('/about', [AboutController::class, 'index']);