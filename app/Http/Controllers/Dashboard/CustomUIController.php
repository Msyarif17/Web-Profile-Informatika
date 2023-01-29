<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\CustomUserInterface;
use App\Http\Controllers\Controller;

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
                    if ($cui->deleted_at) {
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
            'theme_name' => 'required',
        ]);
        $file = ['logo','favicon'];
        $input = $request->all();
        foreach($file as $f){
            $img = $request->file($f);
            if($img){
                $img->storeAs('public/theme/'.$f.'/', $f.'-' . $img->hashName());
                $input[$f] = '/theme/'.$f.'/'.$f.'-' . $img->hashName();
            }
        }
        CustomUserInterface::create($input);
        return redirect()->route('dash.post.index')->with('success', 'Post Created successfully');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
