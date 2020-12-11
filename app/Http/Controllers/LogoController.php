<?php

namespace App\Http\Controllers;

use App\model\logo;
use Illuminate\Http\Request;
use DB;

class LogoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $db = logo::all();
        $count = $db->count();
        return view('admin.pages.home.logo.index',compact('db','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.pages.home.logo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('logo');
        if($image){
            $image_name = 'logo-'.rand(1,100);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/frontend/images/logo/';
            $success = $image->move($upload_path,$image_full_name);
            
            $logo = new logo;
            $logo->logo = $image_full_name;
            $logo->seo_des = $request->seo_des;
            $logo->save();        
            return redirect()->to('logo')->with('toast_success', 'Inserted Successfully');
        }
        else{
            return redirect()->back()->with('toast_warning', 'Image Required'); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\logo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $db = logo::findorfail($id);
        return view('admin.pages.home.logo.edit',compact('db'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = $request->file('logo');
        if($image){
            $image_name = 'logo-'.rand(1,100);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/frontend/images/logo/';
            $success = $image->move($upload_path,$image_full_name);
            unlink($request->old_img);            
            $logo = logo::findorfail($id);
            $logo->logo = $image_full_name;
            $logo->seo_des = $request->seo_des;
            $logo->save();        
            return redirect()->to('logo')->with('toast_success', 'Update Successfully');
        }
        else{
            $logo = logo::findorfail($id);
            $logo->seo_des = $request->seo_des;
            $logo->save();
            return redirect()->to('logo')->with('toast_success', 'Nothing to Update!');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = logo::findorfail($id);        
        $image = $db->logo;
        $db->delete();
        unlink("public/frontend/images/logo/$image");
        return redirect()->back()->with('toast_success', 'Deleted Successfully');
    } 
}
