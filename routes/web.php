<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomAmenityController;
use App\Http\Middleware\AuthMiddleware;

Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::delete('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/', [HomepageController::class, 'index'])->name('home.index');
Route::get('/bookings', [BookingController::class, 'index'])->name('booking.index');

Route::get('/rooms', [RoomController::class, 'index'])->name('room.index')->middleware(AuthMiddleware::class);
Route::get('/rooms/add', [RoomController::class, 'add'])->name('room.add');
Route::get('/rooms/detail/{id}', [RoomController::class, 'detail'])->name('room.detail');
Route::post('/rooms/create', [RoomController::class, 'create'])->name('room.create');
Route::delete('/rooms/delete/{id}', [RoomController::class, 'delete'])->name('room.delete');

Route::post('/roomAmenities/create', [RoomAmenityController::class, 'create'])->name('roomAmenity.create');
Route::delete('/roomAmenities/delete/{id}', [RoomAmenityController::class, 'delete'])->name('roomAmenity.delete');
