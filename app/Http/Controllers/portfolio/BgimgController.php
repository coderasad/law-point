<?php

namespace App\Http\Controllers\portfolio;

use App\Http\Controllers\Controller;
use App\model\portfolio\bgimg;
use Illuminate\Http\Request;

class BgimgController extends Controller
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
        $db = bgimg::all();
        $count = $db->count();
        return view('admin.pages.portfolio.bgimg.index',compact('db','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.portfolio.bgimg.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'about_img' => 'required',
            'service_img' => 'required',
            'portfolio_img' => 'required',
            'contact_img' => 'required',
        ]);

        $about_img = $request->file('about_img');
        $service_img = $request->file('service_img');
        $portfolio_img = $request->file('portfolio_img');
        $contact_img = $request->file('contact_img');

        $image_name_about = 'about-bg';
        $image_name_service = 'service-bg';
        $image_name_portfolio = 'portfolio-bg';
        $image_name_contact = 'contact-bg';

        $ext_about = strtolower($about_img->getClientOriginalExtension());
        $ext_service = strtolower($service_img->getClientOriginalExtension());
        $ext_portfolio = strtolower($portfolio_img->getClientOriginalExtension());
        $ext_contact = strtolower($contact_img->getClientOriginalExtension());

        $image_full_name_about = $image_name_about.'.'.$ext_about;
        $image_full_name_service = $image_name_service.'.'.$ext_service;
        $image_full_name_portfolio = $image_name_portfolio.'.'.$ext_portfolio;
        $image_full_name_contact = $image_name_contact.'.'.$ext_contact;

        $upload_path = 'public/frontend/images/bg/';

        $success = $about_img->move($upload_path,$image_full_name_about);
        $success = $service_img->move($upload_path,$image_full_name_service);
        $success = $portfolio_img->move($upload_path,$image_full_name_portfolio);
        $success = $contact_img->move($upload_path,$image_full_name_contact);
        
        $bgimg = new bgimg;
        $bgimg->about_img = $image_full_name_about;
        $bgimg->service_img = $image_full_name_service;
        $bgimg->portfolio_img = $image_full_name_portfolio;
        $bgimg->contact_img = $image_full_name_contact;
        $bgimg->save();        
        return redirect()->to('bgimg')->with('toast_success', 'Inserted Successfully');
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
        $db = bgimg::findorfail($id);
        return view('admin.pages.portfolio.bgimg.edit',compact('db'));
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

        $about_img = $request->file('about_img');
        $service_img = $request->file('service_img');
        $portfolio_img = $request->file('portfolio_img');
        $contact_img = $request->file('contact_img');

        if($about_img){
            $image_name_about = 'about-bg';
            $ext_about = strtolower($about_img->getClientOriginalExtension());
            $image_full_name_about = $image_name_about.'.'.$ext_about;
            $upload_path = 'public/frontend/images/bg/';
            $success = $about_img->move($upload_path,$image_full_name_about);
            unlink($request->old_about_img);   
            $bgimg = bgimg::findorfail($id);                     
            $bgimg->about_img = $image_full_name_about;
            $bgimg->save();        
            return redirect()->to('bgimg')->with('toast_success', 'Updated Successfully');
        }
        if($service_img){
            $image_name_service = 'service-bg';
            $ext_service = strtolower($service_img->getClientOriginalExtension());
            $image_full_name_service = $image_name_service.'.'.$ext_service;
            $upload_path = 'public/frontend/images/bg/';
            $success = $service_img->move($upload_path,$image_full_name_service);
            unlink($request->old_service_img);   
            $bgimg = bgimg::findorfail($id);   
            $bgimg->service_img = $image_full_name_service;
            $bgimg->save();        
            return redirect()->to('bgimg')->with('toast_success', 'Updated Successfully');
        }
        if($portfolio_img){
            $image_name_portfolio = 'portfolio-bg';
            $ext_portfolio = strtolower($portfolio_img->getClientOriginalExtension());
            $image_full_name_portfolio = $image_name_portfolio.'.'.$ext_portfolio;
            $upload_path = 'public/frontend/images/bg/';
            $success = $portfolio_img->move($upload_path,$image_full_name_portfolio);
            unlink($request->old_portfolio_img);  
            $bgimg = bgimg::findorfail($id);           
            $bgimg->portfolio_img = $image_full_name_portfolio;
            $bgimg->save();        
            return redirect()->to('bgimg')->with('toast_success', 'Updated Successfully');
        }
        if($contact_img){
            $image_name_contact = 'contact-bg';
            $ext_contact = strtolower($contact_img->getClientOriginalExtension());
            $image_full_name_contact = $image_name_contact.'.'.$ext_contact;
            $upload_path = 'public/frontend/images/bg/';
            $success = $contact_img->move($upload_path,$image_full_name_contact); 
            unlink($request->old_contact_img);   
            $bgimg = bgimg::findorfail($id);     
            $bgimg->contact_img = $image_full_name_contact;
            $bgimg->portfolio_img = $image_full_name_portfolio;
            $bgimg->save();        
            return redirect()->to('bgimg')->with('toast_success', 'Updated Successfully');
        } 
                
        $bgimg = bgimg::findorfail($id);
        $bgimg->save();        
        return redirect()->to('bgimg')->with('toast_success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = bgimg::findorfail($id);        
        $about_img = $db->about_img;
        $service_img = $db->service_img;
        $portfolio_img = $db->portfolio_img;
        $contact_img = $db->contact_img;
        $db->delete();
        unlink("public/frontend/images/bg/$about_img");
        unlink("public/frontend/images/bg/$service_img");
        unlink("public/frontend/images/bg/$portfolio_img");
        unlink("public/frontend/images/bg/$contact_img");
        return redirect()->back()->with('toast_success', 'Deleted Successfully');
    }
}
