<?php

namespace App\Http\Controllers;

use App\model\service;
use Illuminate\Http\Request;
use DB;

class ServiceController extends Controller
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
        $db = service::all();
        $count = $db->count();

        return view('admin.pages.home.service.index',compact('db','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.home.service.create');
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
            'title' => 'required|min:3|max:30',
            'description' => 'required|min:10|max:110',
            'img' => 'required',
        ]);

        $image = $request->file('img');
        $image_name = 'service-'.rand(1,100);
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'public/frontend/images/service/';
        $success = $image->move($upload_path,$image_full_name);
        
        $service = new service;
        $service->title = $request['title'];
        $service->description = $request['description'];
        $service->img = $image_full_name;
        $service->save();        
        return redirect()->to('service')->with('toast_success', 'Inserted Successfully');
             
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $db = service::findorfail($id);
        return view('admin.pages.home.service.edit',compact('db'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3|max:30',
            'description' => 'required|min:10|max:110',
        ]);

        $image = $request->file('img');
        if($image){
            $image_name = 'service-'.rand(1,100);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/frontend/images/service/';
            $success = $image->move($upload_path,$image_full_name); 
            if($request->old_img == 'public/frontend/images/service/rename'){
                $service = service::findorfail($id);
                $service->title = $request['title'];  
                $service->description = $request['description'];                   
                $service->img = $image_full_name;
                $service->save();        
                return redirect()->to('service')->with('toast_success', 'Updated Successfully');
            }   
            else{
                unlink($request->old_img);   
                $service = service::findorfail($id);
                $service->title = $request['title'];  
                $service->description = $request['description'];                   
                $service->img = $image_full_name;
                $service->save();        
                return redirect()->to('service')->with('toast_success', 'Updated Successfully');
            }               
        }else{
            $service = service::findorfail($id);
            $service->title = $request['title'];
            $service->description = $request['description'];
            $service->save();        
            return redirect()->to('service')->with('toast_success', 'Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = service::findorfail($id);        
        $image = $db->img;
        if($image == 'rename'){
            $db->delete();
            return redirect()->back()->with('toast_success', 'Deleted Successfully');
        }
        else{
            $db->delete();
            unlink("public/frontend/images/service/$image");
            return redirect()->back()->with('toast_success', 'Deleted Successfully');
        }return redirect()->back()->with('toast_success', 'Deleted Successfully');

    }
    // Custome route status==============    
    public function activeService($id)
    { 
        $service = service::findorfail($id);
        $service->status = 1;
        $service->save();
        return redirect()->to('service')->with('toast_success', 'service Active Successfully');        
    }  
    public function unactiveService($id)
    { 
        $service = service::findorfail($id);
        $service->status = 0;
        $service->save();
        return redirect()->to('service')->with('toast_success', 'service Unactive Successfully');        
    }     // data duplicate route ===============
    public function duplicate($id){
        $db = service::find($id);
        $newDb = $db->replicate(); 
        $newDb->img = 'rename';
        $newDb->save();
        return redirect()->to('service')->with('toast_success', 'Duplicate Successfully'); 
    }
}
