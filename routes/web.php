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
        'users' => User::paginate(10)->through(fn($user) => [
                'id' => $user->id,
                'name' => $user->name
            ])
        // 'users' => User::paginate(10)->map(fn($user) => [
        //     'id' => $user->id,
        //     'name' => $user->name
        // ])
    ]);
});



Route::get('/settings', function() {
    return Inertia::render('Settings', [
        'name' => 'Sandor'
    ]);
});




// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


