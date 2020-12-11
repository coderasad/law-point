<?php

namespace App\Http\Controllers\about;

use App\Http\Controllers\Controller;
use App\model\about\vision;
use Illuminate\Http\Request;

class visionController extends Controller
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
        $db = vision::all();
        $count = $db->count();
        return view('admin.pages.about.vision.index',compact('db','count'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.about.vision.create');
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
            'description' => 'required|min:10|max:460',
            'p1' => 'required|min:10|max:70',
            'p2' => 'required|min:10|max:70',
            'p3' => 'required|min:10|max:70',
            'p4' => 'required|min:10|max:70',
            'p5' => 'required|min:10|max:70',
            'img' => 'required',
        ]);

        $image = $request->file('img');
        $image_name = 'vision-'.rand(1,100);
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'public/frontend/images/about/';
        $success = $image->move($upload_path,$image_full_name);
        
        $vision = new vision;
        $vision->title = $request['title'];
        $vision->p1 = $request['p1'];
        $vision->p2 = $request['p2'];
        $vision->p3 = $request['p3'];
        $vision->p4 = $request['p4'];
        $vision->p5 = $request['p5'];
        $vision->description = $request['description'];
        $vision->img = $image_full_name;
        $vision->save();        
        return redirect()->to('vision')->with('toast_success', 'Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\vision  $vision
     * @return \Illuminate\Http\Response
     */
    public function show(vision $vision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\vision  $vision
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $db = vision::findorfail($id);
        return view('admin.pages.about.vision.edit',compact('db'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\vision  $vision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:10|max:30',
            'description' => 'required|min:10|max:460',
            'p1' => 'required|min:10|max:70',
            'p2' => 'required|min:10|max:70',
            'p3' => 'required|min:10|max:70',
            'p4' => 'required|min:10|max:70',
            'p5' => 'required|min:10|max:70',
        ]);

        $image = $request->file('img');
        if($image){
            $image_name = 'vision-'.rand(1,100);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/frontend/images/about/';
            $success = $image->move($upload_path,$image_full_name);        
            unlink($request->old_img);   
            $vision = vision::findorfail($id);
            $vision->title = $request['title'];
            $vision->p1 = $request['p1'];
            $vision->p2 = $request['p2'];
            $vision->p3 = $request['p3'];
            $vision->p4 = $request['p4'];
            $vision->p5 = $request['p5'];
            $vision->description = $request['description'];                      
            $vision->img = $image_full_name;
            $vision->save();        
            return redirect()->to('vision')->with('toast_success', 'Updated Successfully');
        }     
        $vision = vision::findorfail($id);
        $vision->title = $request['title'];
        $vision->p1 = $request['p1'];
        $vision->p2 = $request['p2'];
        $vision->p3 = $request['p3'];
        $vision->p4 = $request['p4'];
        $vision->p5 = $request['p5'];
        $vision->description = $request['description'];
        $vision->save();        
        return redirect()->to('vision')->with('toast_success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\vision  $vision
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = vision::findorfail($id);        
        $image = $db->img;
        $db->delete();
        unlink("public/frontend/images/about/$image");
        return redirect()->back()->with('toast_success', 'Deleted Successfully');
    }
}
