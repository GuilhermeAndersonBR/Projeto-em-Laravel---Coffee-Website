<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/', [EventController::class, 'index']);

Route::get('/menu', [EventController::class, 'menu']);

Route::get('/criar', [EventController::class, 'create'])->middleware('auth');

Route::get('/produto/{id}', [EventController::class, 'show']);

Route::post('/events', [EventController::class, 'store']);

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

Route::delete('/produto/{id}', [EventController::class, 'destroy'])->middleware('auth');

Route::get('/produto/editar/{id}', [EventController::class, 'edit'])->middleware('auth');

Route::put('/produto/update/{id}', [EventController::class, 'update'])->middleware('auth');

Route::post('/produto/comprar/{id}', [EventController::class, 'joinProduct'])->middleware('auth');

Route::delete('/produto/deletar/{id}', [EventController::class, 'leaveProduct'])->middleware('auth');

Route::get('/compras', [EventController::class, 'shop'])->middleware('auth');

/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});*/
