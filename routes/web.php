<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KoperasiController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\PenjadwalanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\MultipleStepsFormController;

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

//Route::resource('koperasi', KoperasiController::class);
Route::resource('datalowongan', LowonganController::class);
Route::resource('berkas', BerkasController::class);
Route::resource('user', UserController::class);
//Route::resource('arsip', ArsipController::class);
//Route::get('arsips/create', [ArsipController::class, 'create'])->name('arsips.create');

//Multiple Step Form Route
Route::get('/create-step-one', [MultipleStepsFormController::class, 'createStepOne'])->name('pages.user.create');
Route::post('/create-step-one', [MultipleStepsFormController::class, 'postCreateStepOne'])->name('pages.user.postCreateStepOne');

// Route for the second step
Route::get('/create-step-two', [MultipleStepsFormController::class, 'createStepTwo'])->name('pages.berkas.create');
Route::post('/create-step-two', [MultipleStepsFormController::class, 'postCreateStepTwo'])->name('pages.berkas.postCreateStepTwo');

// Route for the third step
Route::get('/review', [MultipleStepsFormController::class, 'createStepThree'])->name('pages.review');
Route::post('/review', [MultipleStepsFormController::class, 'postCreateStepThree'])->name('pages.postCreateStepThree');

// Route to view the list of lowongan
Route::get('/datalowongan', [MultipleStepsFormController::class, 'index'])->name('pages.datalowongan.data-lowongan');

//Route Penjadwalan
/*Route::get('/penjadwalan', [PenjadwalanController::class, 'index'])->name('penjadwalans');
Route::get('/create', [PenjadwalanController::class, 'create'])->name('createJadwal');
Route::post('/saveJadwal', [PenjadwalanController::class, 'saveJadwal'])->name('saveJadwal');
Route::get('/Delete/{id}', [PenjadwalanController::class, 'Delete'])->name('Delete');
Route::get('/edit/{id}', [PenjadwalanController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [PenjadwalanController::class, 'update'])->name('update');
*/



Route::get('/', function () {return redirect('sign-in');})->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('guest')->name('dashboard');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify');
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('guest')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('guest')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('guest');
Route::group(['middleware' => 'guest'], function () {
	Route::get('billing', function () {
		return view('pages.billing');
	})->name('billing');
	Route::get('tables', function () {
		return view('pages.tables');
	})->name('tables');
	Route::get('rtl', function () {
		return view('pages.rtl');
	})->name('rtl');
	Route::get('virtual-reality', function () {
		return view('pages.virtual-reality');
	})->name('virtual-reality');
	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
	Route::get('user-management', function () {
		return view('pages.laravel-examples.user-management');
	})->name('user-management');
	Route::get('user-profile', function () {
		return view('pages.laravel-examples.user-profile');
	})->name('user-profile');







//Default dari Template
// Route::get('/', function () {return redirect('sign-in');})->middleware('guest');
// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
// Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
// Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
// Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
// Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
// Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
// Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
// Route::get('verify', function () {
// 	return view('sessions.password.verify');
// })->middleware('guest')->name('verify');
// Route::get('/reset-password/{token}', function ($token) {
// 	return view('sessions.password.reset', ['token' => $token]);
// })->middleware('guest')->name('password.reset');

// Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
// Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
// Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
// Route::group(['middleware' => 'auth'], function () {
// 	Route::get('billing', function () {
// 		return view('pages.billing');
// 	})->name('billing');
// 	Route::get('tables', function () {
// 		return view('pages.tables');
// 	})->name('tables');
// 	Route::get('rtl', function () {
// 		return view('pages.rtl');
// 	})->name('rtl');
// 	Route::get('virtual-reality', function () {
// 		return view('pages.virtual-reality');
// 	})->name('virtual-reality');
// 	Route::get('notifications', function () {
// 		return view('pages.notifications');
// 	})->name('notifications');
// 	Route::get('static-sign-in', function () {
// 		return view('pages.static-sign-in');
// 	})->name('static-sign-in');
// 	Route::get('static-sign-up', function () {
// 		return view('pages.static-sign-up');
// 	})->name('static-sign-up');
// 	Route::get('user-management', function () {
// 		return view('pages.laravel-examples.user-management');
// 	})->name('user-management');
// 	Route::get('user-profile', function () {
// 		return view('pages.laravel-examples.user-profile');
// 	})->name('user-profile');
});
