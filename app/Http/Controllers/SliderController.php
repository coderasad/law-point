<?php

namespace App\Http\Controllers;

use App\model\slider;
use Illuminate\Http\Request;
use DB;

class SliderController extends Controller
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
        $db = slider::all();
        $count = $db->count();
        return view('admin.pages.home.slider.index',compact('db','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.home.slider.create');
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
            'description' => 'required|min:10|max:50',
            'img' => 'required',
        ]);

        $image = $request->file('img');
        $image_name = 'slider-'.rand(1,100);
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'public/frontend/images/slider/';
        $success = $image->move($upload_path,$image_full_name);
        
        $slider = new slider;
        $slider->title = $request['title'];
        $slider->description = $request['description'];
        $slider->img = $image_full_name;
        $slider->save();        
        return redirect()->to('slider')->with('toast_success', 'Inserted Successfully');
             
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $db = slider::findorfail($id);
        return view('admin.pages.home.slider.edit',compact('db'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:10|max:50',
            'description' => 'required|min:10|max:50',
        ]);

        $image = $request->file('img');
        if($image){
            $image_name = 'slider-'.rand(1,100);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/frontend/images/slider/';
            $success = $image->move($upload_path,$image_full_name); 
            if($request->old_img == 'public/frontend/images/slider/rename'){
                $slider = slider::findorfail($id);
                $slider->title = $request['title'];  
                $slider->description = $request['description'];                   
                $slider->img = $image_full_name;
                $slider->save();        
                return redirect()->to('slider')->with('toast_success', 'Updated Successfully');
            }   
            else{
                unlink($request->old_img);   
                $slider = slider::findorfail($id);
                $slider->title = $request['title'];  
                $slider->description = $request['description'];                   
                $slider->img = $image_full_name;
                $slider->save();        
                return redirect()->to('slider')->with('toast_success', 'Updated Successfully');
            }               
        }else{
            $slider = slider::findorfail($id);
            $slider->title = $request['title'];
            $slider->description = $request['description'];
            $slider->save();        
            return redirect()->to('slider')->with('toast_success', 'Updated Successfully');
        }        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = slider::findorfail($id);        
        $image = $db->img;
        if($image == 'rename'){
            $db->delete();
            return redirect()->back()->with('toast_success', 'Deleted Successfully');
        }
        else{
            $db->delete();
            unlink("public/frontend/images/slider/$image");
            return redirect()->back()->with('toast_success', 'Deleted Successfully');
        }

    }
    // Custome route status==============    
    public function activeSlider($id)
    { 
        $slider = slider::findorfail($id);
        $slider->status = 1;
        $slider->save();
        return redirect()->to('slider')->with('toast_success', 'Slider Active Successfully');        
    }  
    public function unactiveSlider($id)
    { 
        $slider = slider::findorfail($id);
        $slider->status = 0;
        $slider->save();
        return redirect()->to('slider')->with('toast_success', 'Slider Unactive Successfully');        
    } 
    // data duplicate route ===============
    public function duplicate($id){
        $db = slider::find($id);
        $newDb = $db->replicate(); 
        $newDb->img = 'rename';
        $newDb->save();
        return redirect()->to('slider')->with('toast_success', 'Duplicate Successfully'); 
    }

}
