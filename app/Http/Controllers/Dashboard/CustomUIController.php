<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\CustomUserInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CustomUIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DataTables $datatables,Request $request)
    {
        if ($request->ajax()) {
            return $datatables->of(CustomUserInterface::withTrashed())
                ->addColumn('name', function (CustomUserInterface $cui) {
                    return $cui->name;
                })
                
                ->addColumn('action', function (CustomUserInterface $cui) {
                    return \view('backend.cui.button_action', compact('cui'));
                })
                ->addColumn('status', function (CustomUserInterface $cui) {
                    if (!$cui->isActive) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {
            
            return view('backend.cui.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.cui.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);
        try{
            $file = ['logo','favicon','video_thumbnail'];
            $input = $request->all();
            foreach($file as $f){
                $img = $request->file($f);
                if($img){
                    $img->storeAs('public/theme/'.$f.'/', $f.'-' . $img->hashName());
                    $input[$f] = '/theme/'.$f.'/'.$f.'-' . $img->hashName();
                }
            }
            CustomUserInterface::create($input);

            return redirect()->route('dash.cui.index')->with('success', 'Theme Created successfully');
        }catch(Exception $e){
            return dd($e);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cui = CustomUserInterface::find($id);
        return view('backend.cui.edit',compact('cui'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $cui = CustomUserInterface::withTrashed()->find($id);
        try {
            $file = ['logo', 'favicon'];
            $input = $request->all();
            
            $input['isActive'] = $cui->isActive;
            
            foreach ($file as $f) {
                $img = $request->file($f);
                if ($img) {
                    $img->storeAs('public/theme/' . $f . '/', $f . '-' . $img->hashName());
                    $input[$f] = '/theme/' . $f . '/' . $f . '-' . $img->hashName();
                }
            }
            $a = CustomUserInterface::withTrashed()->find($id)->update($input);
            
            return redirect()->route('dash.cui.index')->with('success', 'Theme Created successfully');
        } catch (Exception $e) {
            return dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find other theme
        CustomUserInterface::where('isActive', false)->latest()->update([
            'isActive' => true
        ]);
        // target off
        CustomUserInterface::find($id)->update([
            'isActive' => false
        ]);
        // soft delete target
        CustomUserInterface::find($id)->delete();
        
        return redirect()->route('dash.cui.index')->with('success', 'Theme deleted successfully');
    }
    public function forceDestroy($id)
    {
        $cui = CustomUserInterface::withTrashed()->find($id);
        $file = ['logo', 'favicon', 'video_thumbnail'];
        foreach($file as $f){
            $a = 'public'.$cui->toArray()[$f];
            if (Storage::exists($a) ) {
                Storage::delete($a);
            }
        }
        $cui->forceDelete();
        return redirect()->route('dash.cui.index')->with('success', 'Theme Permanently Deleted successfully');
    }
    public function restore($id)
    {
        CustomUserInterface::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('dash.cui.index')->with('success', 'Theme restored successfully');
    }
    public function activationTheme($id){
        // find active theme
        CustomUserInterface::where('isActive',true)->update([
            'isActive' => false
        ]);
        // find target 
        CustomUserInterface::find($id)->update([
            'isActive' => true
        ]);
        return redirect()->route('dash.cui.index')->with('success', 'Activation successfully');
    }
}
