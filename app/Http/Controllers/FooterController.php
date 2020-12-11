<?php

namespace App\Http\Controllers;

use App\model\footer;
use Illuminate\Http\Request;

class FooterController extends Controller
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
        $db = footer::all();
        $count = $db->count();
        return view('admin.pages.home.footer.index', compact('db', 'count'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.home.footer.create'); 
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
            'title1' => 'required|min:3|max:20',
            'title2' => 'required|min:3|max:20',
            'title3' => 'required|min:3|max:20',
            'description' => 'required|min:20|max:200',
            'office' => 'required|min:10|max:60',
            'email' => 'required|min:10|max:30',
            'hours' => 'required|min:10|max:100',
            'img' => 'required',
        ]);
        
        $image = $request->file('img');
        $image_name = 'bg-'.rand(1,100);
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'public/frontend/images/bg/';
        $success = $image->move($upload_path,$image_full_name);

        $footer = new footer;
        $footer->title1= $request['title1'];
        $footer->title2= $request['title2'];
        $footer->title3= $request['title3'];
        $footer->description= $request['description']; 
        $footer->office= $request['office'];
        $footer->email= $request['email'];
        $footer->hours= $request['hours'];
        $footer->img= $image_full_name;
        $footer->save();        
        return redirect()->to('footer')->with('toast_success', 'Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function show(footer $footer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $db = footer::findorfail($id);
        return view('admin.pages.home.footer.edit',compact('db'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title1' => 'required|min:3|max:20',
            'title2' => 'required|min:3|max:20',
            'title3' => 'required|min:3|max:20',
            'description' => 'required|min:20|max:200',
            'office' => 'required|min:10|max:60',
            'email' => 'required|min:10|max:30',
            'hours' => 'required|min:10|max:100',
        ]);

        $image = $request->file('img');
        if($image){
            $image_name = 'footer-bg-'.rand(1,100);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/frontend/images/bg/';
            $success = $image->move($upload_path,$image_full_name);
            unlink($request->old_img);
            $footer = footer::findorfail($id);
            $footer->title1= $request['title1'];
            $footer->title2= $request['title2'];
            $footer->title3= $request['title3'];
            $footer->description= $request['description']; 
            $footer->office= $request['office'];
            $footer->email= $request['email'];
            $footer->hours= $request['hours'];
            $footer->img= $image_full_name;
            $footer->save();        
            return redirect()->to('footer')->with('toast_success', 'Updated Successfully');
        }
        else{
            $footer = footer::findorfail($id);
            $footer->title1= $request['title1'];
            $footer->title2= $request['title2'];
            $footer->title3= $request['title3'];
            $footer->description= $request['description']; 
            $footer->office= $request['office'];
            $footer->email= $request['email'];
            $footer->hours= $request['hours'];
            $footer->save();        
            return redirect()->to('footer')->with('toast_success', 'Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = footer::findorfail($id);        
        $image = $db->img;
        $db->delete();
        unlink("public/frontend/images/bg/$image");
        return redirect()->back()->with('toast_success', 'Deleted Successfully');        
    }
}
