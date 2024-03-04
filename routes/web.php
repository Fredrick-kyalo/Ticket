<?php

use App\Models\Event;
use App\Http\Middleware;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\reservationcontroller;








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

Route::get('/create/event', function () {
    return  view ('admin.createvent');
});







// Route::post('create/event', [::class, 'store'])->name('events.store');


// Route::get('/', [DashboardController::class, 'index'])->name('home');



// Route::post('create/{id}/tickets', [DashboardController::class, 'createTickets'])->name('create.tickets');

   


//     Route::get('/dashboard', function () {
//         $events = Event::get();
//         return view('admin.dashboard')->with('events', $events);
        
//     })->name('admin.dashboard');


// // Route for the book ticket page
// Route::get('/book-ticket/{id}', [DashboardController::class, 'bookTicket'])->name('book.ticket');

// Route::post('/reservation/store', [reservationcontroller::class, 'store'])
//     ->name('reservation.store');







// // Inside your routes/web.php or routes/admin.php file
// Route::get('events/{id}/edit', [DashboardController::class, 'edit'])->name('events.edit');

