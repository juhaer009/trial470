<?php

use Illuminate\Support\Facades\Route;
use App\Models\Reserve;
use App\Models\menu;
use App\Models\Listing;
use App\Models\Onlineorder;

use App\Http\Controllers\UserController;
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
Route::get('/user/welcomeuser', [UserController::class, 'userend']);


// Show Table reservation Form
Route::get('/reserve', function(){
    return view('bookings.tableBook');
});

//reserve table
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
    return redirect('user/welcomeuser')->with('message', 'Booking request send successfully');
});

//Show online order form
Route::get('/onlineorder', function () {
    return view('bookings/homedel',[
        'listingsall' => menu::all()
    ]);
});

//oder online
Route::post('/onlineorder', function(){
    Onlineorder::create([
        'name' => request('name'),
        'email' => request('email'),
        'address' => request('address'),
        'menu' => request('menu')
    ]);
    return redirect('user/welcomeuser')->with('message', 'Online order request send successfully');
});

//show menu
Route::get('menu', [UserController::class, 'showMenus'])->name('menu');
