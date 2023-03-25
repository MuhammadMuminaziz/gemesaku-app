<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Models\School;
use App\Models\Student;
use App\Models\User;
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

Route::middleware('guest')->group(function () {
    Route::get('/', [MainController::class, 'index']);
    Route::get('/karya/{student}', [MainController::class, 'student'])->name('student');
    Route::get('/search', [MainController::class, 'search'])->name('search');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $schools = School::all();
        $pembimbing = User::where('role_id', 2)->get();
        $siswa = Student::all();
        return view('dashboard', compact('schools', 'pembimbing', 'siswa'));
    })->name('dashboard');

    Route::get('profile/{username}', [ProfileController::class, 'index'])->name('pembimbing-sekolah');
    Route::put('profile/{username}/edit', [ProfileController::class, 'update'])->name('pembimbing-sekolah.update');
    Route::get('pembimbing/modal', [UserController::class, 'modal']);
    Route::put('pembimbing/{username}', [UserController::class, 'update']);
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('siswa/modal', [StudentController::class, 'modal']);
    Route::resource('siswa', StudentController::class);
    Route::get('buku/modal', [BookController::class, 'modal']);
    Route::resource('buku', BookController::class);
    Route::get('video/modal', [VideoController::class, 'modal']);
    Route::resource('video', VideoController::class);
});

Route::middleware(['auth', 'super_admin'])->group(function () {
    Route::resource('pembimbing', UserController::class);
    Route::resource('sekolah', SchoolController::class);
    Route::get('kegiatan/modal', [KegiatanController::class, 'modal']);
    Route::delete('kegiatan/destroy/judul', [KegiatanController::class, 'hapusJudul']);
    Route::resource('kegiatan', KegiatanController::class);
});



require __DIR__ . '/auth.php';
