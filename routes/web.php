<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EventsDashboardController;

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

// routes/web.php

Route::get('/', function () {
    return view('home');
})->name('home');

// routes/web.php

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');


// routes/web.php

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');


// routes/web.php

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/transactions/{transaction}', [ProfileController::class, 'cancelTransaction'])->name('transactions.cancel');
    // Route::delete('/transactions/{transactionId}', [ProfileController::class, 'cancel'])->name('profile.cancel');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/events', [EventsDashboardController::class, 'index'])->name('admin.events');
    Route::post('/events', [EventsDashboardController::class, 'store'])->name('admin.events.store');
    Route::get('/ticketboard', [AdminDashboardController::class, 'ticketboard'])->name('admin.ticketboard');
    Route::post('/ticketboard', [AdminDashboardController::class, 'store'])->name('admin.ticketboard.store');
    Route::get('/ticketboard/edit/{id}', [AdminDashboardController::class, 'edit'])->name('admin.ticketboard.edit');
    Route::put('/ticketboard/{ticket}', [AdminDashboardController::class, 'update'])->name('admin.ticketboard.update');
    Route::delete('/ticketboard/{ticket}', [AdminDashboardController::class, 'destroy'])->name('admin.ticketboard.destroy');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/home', [AdminDashboardController::class, 'home'])->name('admin.home');
});

// Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/ticket', [TicketController::class, 'index'])->name('ticket.index');
Route::get('/ticket/{id}', [TicketController::class, 'show'])->name('ticket.show');
Route::post('/calculateTotalAmount', [TicketController::class, 'calculateTotalAmount'])->name('ticket.calculateTotalAmount');
Route::post('/transactions/purchase', [TransactionController::class, 'purchaseTicket'])->name('transactions.purchase');
Route::get('/receipt/{transactionId}', [TransactionController::class, 'show'])->name('receipt.show');
Route::get('/download/pdf/{transactionId}', [TransactionController::class, 'downloadPDF'])->name('download.pdf');
Route::get('/download-pdf/{id}', [TransactionController::class, 'downloadPDF'])->name('download.pdf');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('event', EventController::class);
