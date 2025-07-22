<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Public Routes
Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::get('/contact', [UserController::class, 'contact'])->name('user.contact');
Route::get('/blog-detail', [UserController::class, 'blog_detail'])->name('user.blog_detail');
Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
Route::get('/appointment', [AppointmentController::class, 'appointment'])->name('user.appointment');
Route::post('/appointment/book', [AppointmentController::class, 'appointmentStore'])->name('user.appointment.store');
Route::get('/user/profile/{id}/edit', [UserController::class, 'edit'])->name('user.profile_edit');
Route::put('/user/profile/{id}', [UserController::class, 'profile_update'])->name('user.profile_update');

// Auth Routes
Route::get('/login', [AuthController::class,'login'])->name('auth.login');
Route::get('/register', [AuthController::class,'register'])->name('auth.register');
Route::post('/LoginUser', [AuthController::class, 'LoginUser'])->name('auth.loginUser');
Route::post('/RegisterUser', [AuthController::class, 'RegisterUser'])->name('auth.registerUser');
Route::post('/logout', [AuthController::class, 'LogoutUser'])->name('auth.logoutUser');

// Doctor Public Routes
Route::get('/doctors', [DoctorController::class,'index'])->name('user.doctors');
Route::get('/doctorslist', [DoctorController::class,'listDoctors'])->name('doctors.list');

// Admin Dashboard Routes (using admin guard)
Route::prefix('/admin')->middleware(['auth:web', \App\Http\Middleware\CheckRole::class . ':admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/lists', [AdminController::class, 'lists'])->name('admin.lists');
    Route::get('/userlist', [AdminController::class, 'UserList'])->name('admin.users_list');
    Route::get('/doctorlist', [AdminController::class, 'DoctorList'])->name('admin.doctors_list');
    Route::get('/appointment', [AdminController::class, 'Appointment'])->name('admin.appointment');
    Route::get('/users/{id}', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/users/{id}/edit', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    Route::get('/doctors/{id}/edit', [AdminController::class, 'editDoctor'])->name('admin.doctors.edit');
    Route::put('/doctors/{id}', [AdminController::class, 'updateDoctor'])->name('admin.doctors.update');
    Route::delete('/doctors/{id}', [AdminController::class, 'deleteDoctor'])->name('admin.doctors.delete');
    // Admin Appointment Routes
    Route::get('/appointments/{appointment}/show', [AppointmentController::class, 'show'])->name('appointments.show');
    Route::post('/appointments/{appointment}/update-status', [AppointmentController::class, 'updateStatus'])
        ->name('appointments.updateStatus');
});

// Doctor Dashboard Routes (using doctor guard)
Route::prefix('/doctor')->middleware(['auth:doctor', \App\Http\Middleware\CheckRole::class . ':doctor'])->group(function () {
    Route::get('/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');
    Route::get('/appointments', [DoctorController::class, 'appointments'])->name('doctor.appointments');
    Route::get('/patients', [DoctorController::class, 'patients'])->name('doctor.patients');
    Route::get('/profile', [DoctorController::class, 'profile'])->name('doctor.profile');
});

// // Test email route (can be removed in production)
// Route::get('/test-email', function() {
//     try {
//         \Illuminate\Support\Facades\Mail::raw('Test email', function($message) {
//             $message->to('test@example.com')
//                    ->subject('Test Email');
//         });
//         return 'Email sent successfully';
//     } catch (\Exception $e) {
//         return 'Error: ' . $e->getMessage();
//     }
// });

Route::get('/test-log', function() {
    $message = 'Test log entry at ' . now();
    
    // Try multiple logging methods
    \Illuminate\Support\Facades\Log::error($message);
    
    // Also try direct file writing
    $logPath = storage_path('logs/laravel.log');
    file_put_contents($logPath, $message . "\n", FILE_APPEND);
    
    return "Log test attempted. Message: " . $message;
});