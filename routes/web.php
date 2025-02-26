<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Backend\PageTwoManagmentController;
use App\Http\Controllers\Backend\PageOneManagmentController;
use Illuminate\Support\Facades\Route; 
use App\Http\Middleware\AdminMiddleware;
use App\Exports\PageOneExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DataTableController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Apply middleware to admin routes
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/view/page/one', [PageOneManagmentController::class, 'ViewPageOne'])->name('view.pageone');
    Route::get('/view/page/two', [PageTwoManagmentController::class, 'ViewPageTwo'])->name('view.pagetwo');
    Route::get('/admin/index', [AdminController::class, 'AdminIndex'])->name('admin.index');
    Route::get('/admin/export-page-two', [PageTwoManagmentController::class, 'exportToExcel'])->name('export.page.two');
    Route::get('/export-pageone', function () {
        return Excel::download(new PageOneExport, 'pageone.xlsx');});
        
});

Route::get('/admin/login', [LoginController::class, 'AdminLogin'])->name('admin.login');


// Public routes (accessible to all users)
Route::get('/yassin/data', [DataTableController::class, 'getUsers'])->name('users.data');
Route::get('/users', function () {
    return view('users');
});