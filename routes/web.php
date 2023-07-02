<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\FormEntryController;

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




// Form Entry Routes
Route::get('/form-entry/create', [FormEntryController::class, 'create'])->name('form-entry.create');

Route::post('/form-entry/store', [FormEntryController::class, 'store'])->name('form-entry.store');


Route::get('/admin/form-entries', [AdminDashboardController::class, 'getFormEntries'])->name('admin.form-entries');


// Admin Dashboard Routes
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    // Route::get('/admin/form-entries', [AdminDashboardController::class, 'getFormEntries'])->name('admin.form-entries');
    Route::get('/admin/form-entry/{id}', [AdminDashboardController::class, 'showFormEntry'])->name('admin.form-entry.show');
    Route::get('/admin/form-entry/{id}/edit', [AdminDashboardController::class, 'edit'])->name('admin.form-entry.edit');
    Route::put('/admin/form-entry/{id}', [AdminDashboardController::class, 'update'])->name('admin.form-entry.update');
    Route::delete('/admin/form-entry/{id}', [AdminDashboardController::class, 'delete'])->name('admin.form-entry.delete');
});








Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', UserController::class, ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => [ProfileController::class , 'edit']]);
	Route::put('profile', ['as' => 'profile.update', 'uses' => [ProfileController::class , 'update']]);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => [ProfileController::class , 'password']]);
});

