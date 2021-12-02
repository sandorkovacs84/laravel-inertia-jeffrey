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

Route::middleware(['auth:sanctum', 'verified'])->group(function() {

    Route::get('/', function() {
        return Inertia::render('Home', [
            'name' => 'Sandor'
        ]);
    });
    
    
    Route::get('/users', function() {
        return Inertia::render('Users/Index', [
            'users' => User::query()
                ->when(Request::input('search'), function($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->through(function($user) {
                    return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'can' => [
                        'edit' => Auth::user()->can('edit' , $user)
                    ]
                    ];
                })
                ->withQueryString(),
    
            'filters' => Request::only('search'),

            'can' => [
                // 'createUser' => Auth::user()->email === 'sandorkovacs84@gmail.com'
                'createUser' => Auth::user()->can('create' , User::class)
            ]
        ]);
    });
    
    Route::get('/users/create', function() {
        return Inertia::render('Users/Create');
    })->can('create, App\Models\User');
    // ->middleware('can:create,App\Models\User');
    
    Route::post('/users', function() {
        #validate
        $attributes = Request::validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
    
        # create
        User::create($attributes);
    
        # redirect
        return redirect('/users');
    
    });
    
    Route::get('/settings', function() {
        return Inertia::render('Settings', [
            'name' => 'Sandor'
        ]);
    });
    
    
});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


