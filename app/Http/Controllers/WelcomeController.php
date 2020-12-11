<?php

namespace App\Http\Controllers;

use App\model\welcome;
use Illuminate\Http\Request;

class WelcomeController extends Controller
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
        $db = welcome::all();
        $count = $db->count();
        return view('admin.pages.home.welcome.index',compact('db','count'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.home.welcome.create');
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
            'title' => 'required|min:10|max:50',
            'sub_title' => 'required|min:10|max:50',
            'description' => 'required|min:10|max:350',
            'p1' => 'required|min:10|max:70',
            'p2' => 'required|min:10|max:70',
            'p3' => 'required|min:10|max:70',
            'img' => 'required',
        ]);

        $image = $request->file('img');
        $image_name = 'welcome-'.rand(1,100);
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'public/frontend/images/welcome/';
        $success = $image->move($upload_path,$image_full_name);
        
        $welcome = new welcome;
        $welcome->title = $request['title'];
        $welcome->sub_title = $request['sub_title'];
        $welcome->p1 = $request['p1'];
        $welcome->p2 = $request['p2'];
        $welcome->p3 = $request['p3'];
        $welcome->description = $request['description'];
        $welcome->img = $image_full_name;
        $welcome->save();        
        return redirect()->to('welcome')->with('toast_success', 'Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function show(welcome $welcome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $db = welcome::findorfail($id);
        return view('admin.pages.home.welcome.edit',compact('db'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:10|max:50',
            'sub_title' => 'required|min:10|max:50',
            'description' => 'required|min:10|max:350',
            'p1' => 'required|min:10|max:70',
            'p2' => 'required|min:10|max:70',
            'p3' => 'required|min:10|max:70',
        ]);

        $image = $request->file('img');
        if($image){
            $image_name = 'welcome-'.rand(1,100);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/frontend/images/welcome/';
            $success = $image->move($upload_path,$image_full_name);        
            unlink($request->old_img);   
            $welcome = welcome::findorfail($id);
            $welcome->title = $request['title'];
            $welcome->sub_title = $request['sub_title'];
            $welcome->p1 = $request['p1'];
            $welcome->p2 = $request['p2'];
            $welcome->p3 = $request['p3'];
            $welcome->description = $request['description'];                      
            $welcome->img = $image_full_name;
            $welcome->save();        
            return redirect()->to('welcome')->with('toast_success', 'Updated Successfully');
        }     
        $welcome = welcome::findorfail($id);
        $welcome->title = $request['title'];
        $welcome->sub_title = $request['sub_title'];
        $welcome->p1 = $request['p1'];
        $welcome->p2 = $request['p2'];
        $welcome->p3 = $request['p3'];
        $welcome->description = $request['description'];
        $welcome->save();        
        return redirect()->to('welcome')->with('toast_success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = welcome::findorfail($id);        
        $image = $db->img;
        $db->delete();
        unlink("public/frontend/images/welcome/$image");
        return redirect()->back()->with('toast_success', 'Deleted Successfully');
    }
}
