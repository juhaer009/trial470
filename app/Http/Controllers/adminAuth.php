<?php

namespace App\Http\Controllers;

use App\Models\menu;

class adminAuth extends Controller
{
    //show menu
    public function showMenus()
    {
        $menus = menu::all();
        return view('menu', compact('menus'));
    }

     //log in form
     public function login(){
        return view("adminlog");

    }

    //registration form
    public function registration(){
        return view("adminreg");
        
    }

    // discount form
    public function discount(){
        return view("discount");
        
    }

    //book form
    public function bookform(){
        return view("bookreq");
    }

    //update menu form
    public function updateMenu(){
        return view("updatemenu");
    }

    //order form
    public function handleorder(){
        return view("handleorder");
    }

    //order
    public function uorder(){
        return view("uorder");
    }

    // register
    public function regAdmin(Request $request){

        $formFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admin',
            'password' => 'required|min:6',
        ]);
        

        // Create User
        $admin = admin::create($formFields);

        // Login
        auth()->login($admin);

        return redirect('/welcomelogadmin')->with('message', 'Admin created and logged in');
    }

    //authenticate
    public function authenticateAdmin(Request $request){        
        
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Find the user by email
        $admin_e = admin::where('Email', $formFields['email'])->first();
        // Check if the user exists and the passwords match
        if ($admin_e && $admin_e->Password === $formFields['password']) {
            // Authentication successful
            $request->session()->regenerate();
            return redirect('/welcomelogadmin')->with('message', 'Admin created and logged in');
        }
    
        // Authentication failed
        return back()->with("invalid", "Invalid Credentials")->onlyInput("email");
    }

    //booking request
    public function showReservations()
    {
        $reservations = Reserve::all();
        return view('adminreservations', compact('reservations'));
    }

    //delete reservation request
    public function deletereq($id){
        Reserve::find($id)->delete();
        return redirect('/adminreservations');
    }

    //accept reservation request
    public function acceptreq($id){
        Reserve::where('id',$id)->update(['accept' => 'yes']);
        return redirect('/adminreservations');
    }

    //show order
    public function showOrders()
    {
        $orders = onlineorder::all();
        return view('handleorder', compact('orders'));
    }
}