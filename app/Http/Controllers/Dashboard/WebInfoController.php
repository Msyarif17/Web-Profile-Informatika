<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\WebInfo;
use App\Models\SocialMedia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class WebInfoController extends Controller
{
    public function index(Request $request)
    {
        // dd(1);
        if(WebInfo::latest()->count() == 0){
            return redirect()->route('dash.webinfo.create');
        }else{
            $webinfo = WebInfo::latest()->first();
            return redirect()->route('dash.webinfo.edit',compact('webinfo'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.webinfo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'social.*.name' => 'required',
            'social.*.url' => 'required',
            'major_name' => 'required',
            'address' => 'required',
            'short_address' => 'required',
            'phone_number' => 'required',
            'logo' => 'required|image',
        ]);
        $input = $request->all();
        $image = $request->file('logo');
        if ($image) {
            $image->storeAs('public/banner/image/', 'banner-' . $image->hashName());
            $input['image'] = '/banner/image/banner-' . $image->hashName();
        }
        $webinfo = WebInfo::create($input);
        // dd($request);

        foreach ($request->social as $key => $value) {
            $value['web_info_id'] = $webinfo->id;
            SocialMedia::create($value);
        }
        
        return redirect()->route('dash.webinfo.index')->with('success', 'Post tag Created successfully');
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
        $webinfo = WebInfo::find($id);
        $socials = SocialMedia::where('web_info_id',$webinfo->id)->get();
        // dd($webinfo);
        return view('backend.webinfo.edit', compact('webinfo','socials'));
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

        $input = $request->all();
        

            $image = $request->file('logo');
        
        if ($image) {
            $image->storeAs('public/banner/image/', 'banner-' . $image->hashName());
            $input['image'] = '/banner/image/banner-' . $image->hashName();
        }
        SocialMedia::truncate();
        dd($request->social);
        $webinfo = WebInfo::find($id);
        foreach ($request->social as $key => $value) {
            $value['web_info_id'] = $webinfo->id;
            SocialMedia::create($value);
        }
        $webinfo->update($input);
        return back()->with('success', 'Web Information Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function destroy($id)
    {
        WebInfo::find($id)->delete();
        return redirect()->route('dash.partner.index')->with('success', 'Partner deleted successfully');
    }
}
