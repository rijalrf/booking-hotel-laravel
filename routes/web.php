<?php

use App\Http\Controllers\AmenityController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\RoomAmenityController;
use App\Http\Controllers\RoomServicesController;
use App\Http\Controllers\RoomServiceTypeController;


//route auth 
Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::middleware('auth')->group(function () {
    //route home
    Route::get('/', [HomepageController::class, 'index'])->name('home.index');

    //route booking
    Route::prefix('bookings')->name('booking.')->group(function () {
        Route::get('/search', [BookingController::class, 'search'])->name('search');
        Route::post('/updateStatus', [BookingController::class, 'updateStatus'])->name('setStatus');
        Route::get('/', [BookingController::class, 'index'])->name('index');
        Route::get('/new', [BookingController::class, 'new'])->name('new');
        Route::get('/detail/{id}', [BookingController::class, 'detail'])->name('detail');
        Route::post('/roomavailable', [BookingController::class, 'handleRoomBooking'])->name('available');
        Route::post('/create', [BookingController::class, 'create'])->name('create');
        Route::post('/edit/{id}', [BookingController::class, 'edit'])->name('edit');
        Route::delete('/delete/{id}', [BookingController::class, 'delete'])->name('delete');
    });

    //route room
    Route::prefix('rooms')->name('room.')->group(function () {
        Route::get('/search', [RoomController::class, 'searchRoomBooking'])->name('searchBooking');
        Route::get('/', [RoomController::class, 'index'])->name('index');
        Route::get('/show/{id}', [RoomController::class, 'show'])->name('show');
        Route::get('/add', [RoomController::class, 'add'])->name('add');
        Route::get('/detail/{id}', [RoomController::class, 'detail'])->name('detail');
        Route::post('/create', [RoomController::class, 'create'])->name('create');
        Route::delete('/delete/{id}', [RoomController::class, 'delete'])->name('delete');
    });

    //route employee
    Route::prefix('employees')->name('employee.')->group(function () {
        Route::get('/search', [EmployeeController::class, 'search'])->name('search');
        Route::post('/updateStatus/{id}', [EmployeeController::class, 'status'])->name('setStatus');
        Route::get('/', [EmployeeController::class, 'index'])->name('index');
        Route::get('/new', [EmployeeController::class, 'new'])->name('new');
        Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('edit');
        Route::post('/create', [EmployeeController::class, 'create'])->name('create');
        Route::post('/update/{id}', [EmployeeController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');
    });

    //route room amenity
    Route::prefix('roomAmenities')->name('roomAmenity.')->group(function () {
        Route::post('/create', [RoomAmenityController::class, 'create'])->name('create');
        Route::delete('/delete/{id}', [RoomAmenityController::class, 'delete'])->name('delete');
    });

    //room services
    Route::prefix('roomServices')->name('roomService.')->group(function () {
        Route::post('/create', [RoomServicesController::class, 'create'])->name('create');
    });

    //room service type
    Route::prefix('roomServiceType')->name('roomServiceType.')->group(function () {
        Route::get('/', [RoomServiceTypeController::class, 'index'])->name('index');
        Route::post('/create', [RoomServiceTypeController::class, 'create'])->name('create');
        Route::post('/edit/{id}', [RoomServiceTypeController::class, 'edit'])->name('edit');
        Route::delete('/delete/{id}', [RoomServiceTypeController::class, 'delete'])->name('delete');
    });

    //amenity
    Route::prefix('amenity')->name('amenity.')->group(function () {
        Route::get('/', [AmenityController::class, 'index'])->name('index');
        Route::post('/create', [AmenityController::class, 'create'])->name('create');
        Route::post('/edit/{id}', [AmenityController::class, 'edit'])->name('edit');
        Route::delete('/delete/{id}', [AmenityController::class, 'delete'])->name('delete');
    });

    //chart booking
    Route::get('/chart', [ChartController::class, 'chart'])->name('booking.chart');
});

