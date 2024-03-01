<?php

use App\Models\Event;
use App\Http\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\reservationcontroller;
use App\Http\Controllers\Admin\DashboardController;







/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('homepage');
});

Route::get('/register', function () {
    return view('register');
})->name('register');



Route::get('/role-register', [DashboardController::class, 'registered']);





Route::post('create/event', [DashboardController::class, 'store'])->name('events.store');


Route::get('/', [DashboardController::class, 'index'])->name('home');



Route::post('create/{id}/tickets', [DashboardController::class, 'createTickets'])->name('create.tickets');

   


    Route::get('/dashboard', function () {
        $events = Event::get();
        return view('admin.dashboard')->with('events', $events);
        
    })->name('admin.dashboard');


// Route for the book ticket page
Route::get('/book-ticket/{id}', [DashboardController::class, 'bookTicket'])->name('book.ticket');

Route::post('/reservation/store', [reservationcontroller::class, 'store'])
    ->name('reservation.store');



// Default Laravel authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



// Inside your routes/web.php or routes/admin.php file
Route::get('events/{id}/edit', [DashboardController::class, 'edit'])->name('events.edit');














Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
