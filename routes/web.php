<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});



Route::get('/webapp', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/groups', [GroupsController::class, 'groups']);
Route::get('/group/{id}', [GroupsController::class, 'show'])->name('group.show');
Route::get('/groups/{group}/attendance/create', [AttendanceController::class, 'create'])->name('attendance.create');
Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');



Route::get('/settings', function () {
    return view('settings');
});

