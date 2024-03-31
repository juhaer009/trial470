<?php

namespace App\Http\Controllers;
use App\Models\menu;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class UserController extends Controller
{
    //show user end
    public function userend(){
        return view('user/welcomeuser');
    }

    //show menu
    public function showMenus()
    {
        $menus = menu::all();
        return view('user/menu', compact('menus'));
    }
}
