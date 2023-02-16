<?php

namespace App\Http\Controllers;

use App\Models\CategoryMenu;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public static function nav(){
        return CategoryMenu::with(['menu','menu.subMenu'])->get()->all();
        
    }
}
