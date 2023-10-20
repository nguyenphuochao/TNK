<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\DVVCController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('backend.login');
});

Route::get('/login', [DVVCController::class, 'login'])->name('login');
Route::post('/login', [DVVCController::class, 'post_login'])->name('post_login');

Route::get('logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth.backend'], function () {
    Route::get('/dvvc', [DVVCController::class, 'create'])->name('dvvc-create');
    Route::post('/dvvc', [DVVCController::class, 'store'])->name('dvvc-store');
    // Route cho view list
    Route::get('/dvvc-danhsach', [DVVCController::class, 'index'])->name('dvvc-index');
    // Route cho ajax list
    Route::get('/dvvc-danhsach/data', [DVVCController::class, 'anyData'])->name('dvvc-index.data');
    Route::get('/dvvc-sua/{id}', [DVVCController::class, 'edit'])->name('dvvc-edit');
    Route::post('/dvvc-sua/{id}', [DVVCController::class, 'update'])->name('dvvc-update');
    Route::get('/dvvc-xoa/{id}', [DVVCController::class, 'destroy'])->name('dvvc.destroy');
    // Route add user
    Route::post('/dvvc-add-user', [DVVCController::class, 'add_user'])->name('dvvc.add_user');
    // Danh sách user
    Route::get('/dvvc-danhsach-user', [DVVCController::class, 'anyDataUser'])->name('dvvc.danhsach_user');
    // Xóa user
    Route::get('/dvvc-danhsach-user-xoa/{id}', [DVVCController::class, 'destroyUser'])->name('dvvc.destroy_user');
    // Edit user
    Route::get('/dvvc-edit-user/{id}', [DVVCController::class, 'edit_user'])->name('dvvc.edit_user');
    Route::post('/dvvc-edit-user', [DVVCController::class, 'update_user'])->name('dvvc.update_user');
    // Route cho nhóm điều xe
    Route::resource('cars', CarController::class);
    Route::get('/car/list/anyData',[CarController::class,'anyData'])->name('car.anyData');
});




// Tạo password
Route::get('render-pass', function () {
    echo bcrypt(123456);
});
