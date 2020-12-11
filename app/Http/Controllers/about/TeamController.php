<?php

namespace App\Http\Controllers\about;

use App\model\about\team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
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
        $db = team::all();
        $count = $db->count();
        return view('admin.pages.about.team.index',compact('db','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.about.team.create');
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
            'name' => 'required|min:3|max:50',
            'title' => 'required|min:3|max:50',
            'fb_link' => 'required|min:10|max:50',
            'tw_link' => 'required|min:10|max:50',
            'in_link' => 'required|min:10|max:50',
            'img' => 'required',
        ]);

        $image = $request->file('img');
        $image_name = 'team-'.rand(1,100);
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'public/frontend/images/about/';
        $success = $image->move($upload_path,$image_full_name);

        $team = new team;
        $team->name = $request['name'];
        $team->title = $request['title'];
        $team->fb_link = $request['fb_link'];
        $team->tw_link = $request['tw_link'];
        $team->in_link = $request['in_link'];
        $team->img = $image_full_name;
        $team->save();        
        return redirect()->to('team')->with('toast_success', 'Inserted Successfully');
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
        $db = team::findorfail($id);
        return view('admin.pages.about.team.edit',compact('db'));
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
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:50',
            'title' => 'required|min:3|max:50',
            'fb_link' => 'required|min:10|max:50',
            'tw_link' => 'required|min:10|max:50',
            'in_link' => 'required|min:10|max:50',
        ]);

        $image = $request->file('img');
        if($image){
            $image_name = 'team-'.rand(1,100);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/frontend/images/about/';
            $success = $image->move($upload_path,$image_full_name); 
            if($request->old_img == 'public/frontend/images/about/rename'){
                $team = team::findorfail($id);
                $team->name = $request['name'];
                $team->title = $request['title'];
                $team->fb_link = $request['fb_link'];
                $team->tw_link = $request['tw_link'];
                $team->in_link = $request['in_link'];                  
                $team->img = $image_full_name;
                $team->save();        
                return redirect()->to('team')->with('toast_success', 'Updated Successfully');
            }   
            else{
                unlink($request->old_img);   
                $team = team::findorfail($id);
                $team->name = $request['name'];
                $team->title = $request['title'];
                $team->fb_link = $request['fb_link'];
                $team->tw_link = $request['tw_link'];
                $team->in_link = $request['in_link'];                 
                $team->img = $image_full_name;
                $team->save();        
                return redirect()->to('team')->with('toast_success', 'Updated Successfully');
            }               
        }else{
            $team = team::findorfail($id);
            $team->name = $request['name'];
            $team->title = $request['title'];
            $team->fb_link = $request['fb_link'];
            $team->tw_link = $request['tw_link'];
            $team->in_link = $request['in_link']; 
            $team->save();        
            return redirect()->to('team')->with('toast_success', 'Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = team::findorfail($id);        
        $image = $db->img;
        if($image == 'rename'){
            $db->delete();
            return redirect()->back()->with('toast_success', 'Deleted Successfully');
        }
        else{
            $db->delete();
            unlink("public/frontend/images/about/$image");
            return redirect()->back()->with('toast_success', 'Deleted Successfully');
        }
    }    
    // Custome route status==============    
    public function activeTeam($id)
    { 
        $team = team::findorfail($id);
        $team->status = 1;
        $team->save();
        return redirect()->to('team')->with('toast_success', 'Team Active Successfully');        
    }  
    public function unactiveTeam($id)
    { 
        $team = team::findorfail($id);
        $team->status = 0;
        $team->save();
        return redirect()->to('team')->with('toast_success', 'Team Unactive Successfully');        
    } 
    // data duplicate route ===============
    public function duplicate($id){
        $db = team::find($id);
        $newDb = $db->replicate(); 
        $newDb->img = 'rename';
        $newDb->save();
        return redirect()->to('team')->with('toast_success', 'Duplicate Successfully'); 
    }
}
