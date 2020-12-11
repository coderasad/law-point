<?php

namespace App\Http\Controllers\about;

use App\Http\Controllers\Controller;
use App\model\about\about;
use Illuminate\Http\Request;

class AboutController extends Controller
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
        $db = about::all();
        $count = $db->count();
        return view('admin.pages.about.about.index',compact('db','count'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.about.about.create');
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
            'title' => 'required|min:10|max:30',
            'description' => 'required|min:10|max:700',
        ]);

        $image = $request->file('img');
        $image_name = 'about-'.rand(1,100);
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'public/frontend/images/about/';
        $success = $image->move($upload_path,$image_full_name);
        
        $about = new about;
        $about->title = $request['title'];
        $about->description = $request['description'];
        $about->img = $image_full_name;
        $about->save();        
        return redirect()->to('about')->with('toast_success', 'Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\about  $about
     * @return \Illuminate\Http\Response
     */
    public function show(about $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\about  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $db = about::findorfail($id);
        return view('admin.pages.about.about.edit',compact('db'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\about  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:10|max:30',
            'description' => 'required|min:10|max:700',
        ]);

        $image = $request->file('img');
        if($image){
            $image_name = 'about-'.rand(1,100);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/frontend/images/about/';
            $success = $image->move($upload_path,$image_full_name);        
            unlink($request->old_img);   
            $about = about::findorfail($id);
            $about->title = $request['title'];
            $about->description = $request['description'];                      
            $about->img = $image_full_name;
            $about->save();        
            return redirect()->to('about')->with('toast_success', 'Updated Successfully');
        }     
        $about = about::findorfail($id);
        $about->title = $request['title'];
        $about->description = $request['description'];
        $about->save();        
        return redirect()->to('about')->with('toast_success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\about  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = about::findorfail($id);        
        $image = $db->img;
        $db->delete();
        unlink("public/frontend/images/about/$image");
        return redirect()->back()->with('toast_success', 'Deleted Successfully');
    }
}
