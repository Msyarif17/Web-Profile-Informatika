<?php

namespace App\Http\Controllers;

use App\Models\CustomUserInterface;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $cui = CustomUserInterface::where('isActive',true)->first();
        return view('frontend.index',compact('cui'));
    }
}
