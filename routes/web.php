<?php

use Illuminate\Support\Facades\Route;
use App\Models\menu;
use App\Models\Onlineorder;
use App\Http\Controllers\UserController;
use App\Http\Controllers\adminAuth;

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
    return view('welcome');
});

//show user end
Route::get('/welcomeuser', [UserController::class, 'userend']);

// Show Login Form
Route::get('/login', [UserController::class, 'login']);

//show admin end
Route::get('/welcomeadmin', [UserController::class, 'adminend']);

//show login admin end
Route::get('/welcomelogadmin', [UserController::class, 'adminlogend']);

//show admin reg form
Route::get('/adminreg', [adminAuth::class, 'registration']);

//create admin
Route::post('/regAdmin', [adminAuth::class, 'regAdmin'])->name('regAdmin');

//show admin login form
Route::get('/adminlog', [adminAuth::class, 'login']);

//login admin
Route::post('/authenticateAdmin', [adminAuth::class, 'authenticateAdmin'])->name('authenticateAdmin');

//admin logout
Route::post('/adminlogout', [UserController::class, 'adminlogout']);

//Show Register/Create Form
Route::get('/register', [UserController::class, 'create']);

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout']);

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//Menu
Route::get('/menu', function () {
    return view('menu',[
        'listings' => menu::all()
    ]);
});

//see menu
Route::get('menu', [adminAuth::class, 'showMenus'])->name('menu');

// Show Reservation Form
Route::get('/reserve', function(){
    return view('bookings.tableBook');
});

// Create reservation
Route::post('/reserve', function(){
    Reserve::create([
        'name' => request('name'),
        'email' => request('email'),
        'date' => request('date'),
        'phone' => request('phone'),
        'guests' => request('guests'),
        'time' => request('time'),
        'description' => request('description')
    ]);
    return redirect('/welcomeuser')->with('message', 'Booking request send successfully');
});

//Online Order

Route::get('/onlineorder', function () {
    return view('homedel',[
        'listingsall' => Menu::all()
    ]);
});

Route::post('/onlineorder', function(){
    Onlineorder::create([
        'name' => request('name'),
        'email' => request('email'),
        'address' => request('address'),
        'menu' => request('menu')
    ]);
    return redirect('/welcomeuser')->with('message', 'Online order request send successfully');
});

Route::get('/manageorder', function () {
    return view('list',[
        'listingsall' => Reserve::all()
    ]);
});

Route::get('/managehomeorder', function () {
    return view('managehomeorder',[
        'listingsall' => Onlineorder::all()
    ]);
});

//Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

//Update form
Route::put('/listings/{listing}/edit', [ListingController::class, 'update']);

//Delete form
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);