<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\TelegramBotController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\GroupAttendanceDateController;

Route::get('/', function () {
    return view('welcome');
});

//Route::post('/telegram/webhook', [TelegramBotController::class, 'handleWebhook']);
//Route::get('/telegram/webhook', [TelegramBotController::class, 'handleWebhook']);



Route::get('/webapp', [DashboardController::class, 'index']);
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/groups', [GroupsController::class, 'index'])->name('groups.index');
Route::get('/groups/{id}', [GroupsController::class, 'show'])->name('group.show');
Route::get('/students/{id}', [StudentController::class, 'index'])->name('students.index');
Route::get('/attendance/create/{group}', [AttendanceController::class, 'create'])->name('attendance.create');
Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');
Route::get('/debts', [DebtController::class, 'index'])->name('debts.index');
Route::get('/group-attendance-dates', [GroupAttendanceDateController::class, 'index'])->name('groupAttendanceDates.index');

Route::get('/settings', function () {
    return view('settings');
});

