<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminSubscriptionReportController;
use App\Http\Controllers\SubscriptionController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/plans', [SubscriptionController::class, 'plans'])
    ->name('subscriptions.plans');

    Route::post('/plans/{plan}/checkout', [SubscriptionController::class, 'checkout'])
        ->name('subscriptions.checkout');
    
    Route::get('/subscriptions/{subscription}/payment', [SubscriptionController::class, 'payment'])
        ->name('subscriptions.payment');
    
    Route::post('/subscriptions/{subscription}/pay', [SubscriptionController::class, 'pay'])
        ->name('subscriptions.pay');

    Route::get('/my-subscriptions', [SubscriptionController::class, 'my'])
        ->name('subscriptions.my');

});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', UserController::class)->except(['show']);

    Route::get('/admin/subscription-report', [AdminSubscriptionReportController::class, 'index'])
        ->name('admin.subscription-report');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
})->middleware('auth')->name('logout');

require __DIR__ . '/auth.php';
