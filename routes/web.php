<?php

use App\Http\Controllers\PaymentController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/users', function (Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'password' => ['required', 'confirmed'],
    ]);

    User::create($validated);

    return back()->with('success', 'User created successfully.');
});


Route::get('/payments', [PaymentController::class, 'paymentForm']);
Route::post('/payments', [PaymentController::class, 'payment']);
Route::any('/payments/verify', [PaymentController::class, 'verify']);
