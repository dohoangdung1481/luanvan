<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminFunction\Dangkymonhoc;
use App\Http\Controllers\AdminFunction\Hocphi;
use App\Http\Controllers\AdminFunction\Diemmonhoc;

use App\Http\Controllers\Controller as BaseController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('users.welcome');
});

Route::get('/thoi-khoa-bieu', [BaseController::class, 'timetable'])->name('thoikhoabieu');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dang-ky-mon-hoc', [Dangkymonhoc::class, 'create'])->name('dangky.create');
Route::post('/dang-ky-mon-hoc', [Dangkymonhoc::class, 'store'])->name('dangky.store');
Route::get('/mon-hoc-da-dang-ky', [Dangkymonhoc::class, 'show'])->name('dangky.show');

Route::get('/hoc-phi', [Hocphi::class, 'index'])->name('hocphi.index');
Route::get('/xem-diem', [Diemmonhoc::class, 'show'])->name('diem.show');
Route::delete('/dangky/{id}', [Dangkymonhoc::class, 'destroy'])->name('dangky.destroy');



require __DIR__.'/auth.php';
