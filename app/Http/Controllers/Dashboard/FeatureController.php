<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class FeatureController extends Controller
{
    public static function maintenance($refresh_time = 15)
    {
        if (!Storage::disk('framework')->exists('maintenance')) {

            try {
                Storage::disk('framework')->put('maintenance', sha1(time()));
                return back()->withSuccess('The application has been maintained');
            } catch (Exception $e) {
                return redirect()->route('dash.index')->withSuccess('Error:' . $e);
            }
        } else {
            Storage::disk('framework')->delete('maintenance');
            return back()->withSuccess('The application has been live');
        }
    }
    public function backup(){
        try{

            Artisan::call('backup:run');
            return back()->withSuccess('Database Backup Successful');
        }
        catch(Exception $e){
            return redirect()->route('dash.index')->withSuccess('Error:' . $e);
        }
    }
}
