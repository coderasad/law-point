<?php

namespace App\Http\Controllers\about;

use App\Http\Controllers\Controller;
use App\model\about\mission;
use Illuminate\Http\Request;

class MissionController extends Controller
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
        $db = mission::all();
        $count = $db->count();
        return view('admin.pages.about.mission.index',compact('db','count'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.about.mission.create');
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
        $image_name = 'mission-'.rand(1,100);
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'public/frontend/images/about/';
        $success = $image->move($upload_path,$image_full_name);
        
        $mission = new mission;
        $mission->title = $request['title'];
        $mission->p1 = $request['p1'];
        $mission->p2 = $request['p2'];
        $mission->p3 = $request['p3'];
        $mission->p4 = $request['p4'];
        $mission->p5 = $request['p5'];
        $mission->description = $request['description'];
        $mission->img = $image_full_name;
        $mission->save();        
        return redirect()->to('mission')->with('toast_success', 'Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function show(mission $mission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $db = mission::findorfail($id);
        return view('admin.pages.about.mission.edit',compact('db'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\mission  $mission
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
            $image_name = 'mission-'.rand(1,100);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/frontend/images/about/';
            $success = $image->move($upload_path,$image_full_name);        
            unlink($request->old_img);   
            $mission = mission::findorfail($id);
            $mission->title = $request['title'];
            $mission->p1 = $request['p1'];
            $mission->p2 = $request['p2'];
            $mission->p3 = $request['p3'];
            $mission->p4 = $request['p4'];
            $mission->p5 = $request['p5'];
            $mission->description = $request['description'];                      
            $mission->img = $image_full_name;
            $mission->save();        
            return redirect()->to('mission')->with('toast_success', 'Updated Successfully');
        }     
        $mission = mission::findorfail($id);
        $mission->title = $request['title'];
        $mission->p1 = $request['p1'];
        $mission->p2 = $request['p2'];
        $mission->p3 = $request['p3'];
        $mission->p4 = $request['p4'];
        $mission->p5 = $request['p5'];
        $mission->description = $request['description'];
        $mission->save();        
        return redirect()->to('mission')->with('toast_success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = mission::findorfail($id);        
        $image = $db->img;
        $db->delete();
        unlink("public/frontend/images/about/$image");
        return redirect()->back()->with('toast_success', 'Deleted Successfully');
    }
}
