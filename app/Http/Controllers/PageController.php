<?php

namespace App\Http\Controllers;

use App\Models\CategoryMenu;
use App\Models\Menu;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function pageFinder($slug){
        
        CategoryMenu::where('slug',$slug)->firstOrFail();

    }
}
