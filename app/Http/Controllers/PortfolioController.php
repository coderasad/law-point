<?php

namespace App\Http\Controllers;

use App\model\portfolio;
use App\model\portfoliocategory;
use Illuminate\Http\Request;
use DB;

class PortfolioController extends Controller
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
        $db = portfolio::all();
        $count = $db->count();
        return view('admin.pages.home.portfolio.index',compact('db','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $db = portfoliocategory::all();
        return view('admin.pages.home.portfolio.create',compact('db'));
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
            'portfoliocategory_id' => 'required',
            'img' => 'required',
        ]);

        $image = $request->file('img');
        $image_name = 'portfolio-'.rand(1,100);
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'public/frontend/images/portfolio/';
        $success = $image->move($upload_path,$image_full_name);
        
        $portfolio = new portfolio;
        $portfolio->title = $request['title'];
        $portfolio->portfoliocategory_id = $request['portfoliocategory_id'];
        $portfolio->img = $image_full_name;
        $portfolio->save();        
        return redirect()->to('portfolio')->with('toast_success', 'Inserted Successfully');
             
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $db = portfolio::findorfail($id);
        $dbCategory = portfoliocategory::all();
        return view('admin.pages.home.portfolio.edit',compact('db','dbCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3|max:30',
            'portfoliocategory_id' => 'required',
        ]);
        $image = $request->file('img');
        if($image){
            $image_name = 'portfolio-'.rand(1,100);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/frontend/images/portfolio/';
            $success = $image->move($upload_path,$image_full_name);
            if($request->old_img == 'public/frontend/images/portfolio/rename'){
                $portfolio = portfolio::findorfail($id);
                $portfolio->title = $request['title'];                     
                $portfolio->portfoliocategory_id = $request['portfoliocategory_id'];                     
                $portfolio->img = $image_full_name;
                $portfolio->save();        
                return redirect()->to('portfolio')->with('toast_success', 'Updated Successfully');
            }   
            else{
                unlink($request->old_img);   
                $portfolio = portfolio::findorfail($id);
                $portfolio->title = $request['title'];                     
                $portfolio->portfoliocategory_id = $request['portfoliocategory_id'];                     
                $portfolio->img = $image_full_name;
                $portfolio->save();        
                return redirect()->to('portfolio')->with('toast_success', 'Updated Successfully');
            }              
        }    
        else{
            $portfolio = portfolio::findorfail($id);
            $portfolio->title = $request['title'];
            $portfolio->portfoliocategory_id = $request['portfoliocategory_id'];
            $portfolio->save();        
            return redirect()->to('portfolio')->with('toast_success', 'Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = portfolio::findorfail($id);        
        $image = $db->img;
        if($image == 'rename'){
            $db->delete();
            return redirect()->back()->with('toast_success', 'Deleted Successfully');
        }
        else{
            $db->delete();
            unlink("public/frontend/images/portfolio/$image");
            return redirect()->back()->with('toast_success', 'Deleted Successfully');
        }        

    }
    // Custome route status==============    
    public function activePortfolio($id)
    { 
        $portfolio = portfolio::findorfail($id);
        $portfolio->status = 1;
        $portfolio->save();
        return redirect()->to('portfolio')->with('toast_success', 'portfolio Active Successfully');        
    }  
    public function unactivePortfolio($id)
    { 
        $portfolio = portfolio::findorfail($id);
        $portfolio->status = 0;
        $portfolio->save();
        return redirect()->to('portfolio')->with('toast_success', 'portfolio Unactive Successfully');        
    } 
    // data duplicate route ===============
    public function duplicate($id){
        $db = portfolio::find($id);
        $newDb = $db->replicate(); 
        $newDb->img = 'rename';
        $newDb->save();
        return redirect()->to('portfolio')->with('toast_success', 'Duplicate Successfully'); 
    }
}
