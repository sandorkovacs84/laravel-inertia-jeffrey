<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

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

Route::get('/', function() {
    return Inertia::render('Home', [
        'name' => 'Sandor'
    ]);
});


Route::get('/users', function() {
    return Inertia::render('Users', [
        'users' => User::query()
            ->when(Request::input('search'), function($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->through(fn($user) => [
                'id' => $user->id,
                'name' => $user->name
            ])
            ->withQueryString(),
            
        'filters' => Request::only('search')
    ]);
});



Route::get('/settings', function() {
    return Inertia::render('Settings', [
        'name' => 'Sandor'
    ]);
});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


