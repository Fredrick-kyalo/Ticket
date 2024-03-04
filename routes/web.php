<?php

use App\Models\Event;
use App\Http\Middleware;
use Illuminate\Support\Facades\Route;









//TODO SETUP VIEWS ROUTES
//TODO SETUP FETCH API FOR ADMIN DASHBOARD

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

//default page
Route::get('/', function () {
    return view('homepage');})->name('homepage');

//admin dashboard 
Route::get('/dashboard', function () {
    return  view ('admin.dashboard');
})->name('dashboard');

Route::get('/create/event', function () {
    return  view ('admin.createvent');
})->name('create.event');















   


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

