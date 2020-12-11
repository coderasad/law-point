<?php

namespace App\Http\Controllers\portfolio;

use App\Http\Controllers\Controller;
use App\model\portfolio\portfoliopage;
use App\model\portfoliocategory;
use Illuminate\Http\Request;

class PortfoliopageController extends Controller
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
        $db = portfoliopage::all();
        $count = $db->count();
        return view('admin.pages.portfolio.portfolio.index',compact('db','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $db = portfoliocategory::all();
        return view('admin.pages.portfolio.portfolio.create',compact('db')); 
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
            'long_title' => 'required|min:3|max:90',
            'short_title' => 'required|min:3|max:30',
            'category_id' => 'required',
            'website' => 'required|min:5|max:30',
            'client' => 'required|min:5|max:30',
            'short_description' => 'required|min:50|max:260',
            'description1' => 'required|min:100|max:900',
            'description2' => 'required|min:100|max:900',
        ]);
        
        $image = $request->file('img');
        $image_name = 'portfoliopage-'.rand(1,100);
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'public/frontend/images/portfoliopage/';
        $success = $image->move($upload_path,$image_full_name);
        
        $portfoliopage = new portfoliopage;
        $portfoliopage->long_title = $request['long_title'];
        $portfoliopage->short_title = $request['short_title'];
        $portfoliopage->category_id = $request['category_id'];
        $portfoliopage->website = $request['website'];
        $portfoliopage->client = $request['client'];
        $portfoliopage->short_description = $request['short_description'];
        $portfoliopage->description1 = $request['description1'];
        $portfoliopage->description2 = $request['description2'];
        $portfoliopage->img = $image_full_name;
        $portfoliopage->save();        
        return redirect()->to('portfoliopage')->with('toast_success', 'Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = portfoliopage::findorfail($id);
        $dbCategory = portfoliocategory::all();
        return view('admin.pages.portfolio.portfolio.show',compact('db','dbCategory')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $db = portfoliopage::findorfail($id);
        $dbCategory = portfoliocategory::all();
        return view('admin.pages.portfolio.portfolio.edit',compact('db','dbCategory'));
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
            'long_title' => 'required|min:3|max:90',
            'short_title' => 'required|min:3|max:30',
            'category_id' => 'required',
            'website' => 'required|min:5|max:30',
            'client' => 'required|min:5|max:30',
            'short_description' => 'required|min:50|max:260',
            'description1' => 'required|min:100|max:900',
            'description2' => 'required|min:100|max:900',
        ]);

        $image = $request->file('img');
        if($image){
            $image_name = 'portfoliopage-'.rand(1,100);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/frontend/images/portfoliopage/';
            $success = $image->move($upload_path,$image_full_name); 
            if($request->old_img == 'public/frontend/images/portfoliopage/rename'){
                $portfoliopage = portfoliopage::findorfail($id);
                $portfoliopage->long_title = $request['long_title'];
                $portfoliopage->short_title = $request['short_title'];
                $portfoliopage->category_id = $request['category_id'];
                $portfoliopage->website = $request['website'];
                $portfoliopage->client = $request['client'];
                $portfoliopage->short_description = $request['short_description'];
                $portfoliopage->description1 = $request['description1'];
                $portfoliopage->description2 = $request['description2'];                  
                $portfoliopage->img = $image_full_name;
                $portfoliopage->save();        
                return redirect()->to('portfoliopage')->with('toast_success', 'Updated Successfully');
            }   
            else{
                unlink($request->old_img);   
                $portfoliopage = portfoliopage::findorfail($id);
                $portfoliopage->long_title = $request['long_title'];
                $portfoliopage->short_title = $request['short_title'];
                $portfoliopage->category_id = $request['category_id'];
                $portfoliopage->website = $request['website'];
                $portfoliopage->client = $request['client'];
                $portfoliopage->short_description = $request['short_description'];
                $portfoliopage->description1 = $request['description1'];
                $portfoliopage->description2 = $request['description2'];                  
                $portfoliopage->img = $image_full_name;
                $portfoliopage->save();        
                return redirect()->to('portfoliopage')->with('toast_success', 'Updated Successfully');
            }               
        }else{
            $portfoliopage = portfoliopage::findorfail($id);
            $portfoliopage->long_title = $request['long_title'];
            $portfoliopage->short_title = $request['short_title'];
            $portfoliopage->category_id = $request['category_id'];
            $portfoliopage->website = $request['website'];
            $portfoliopage->client = $request['client'];
            $portfoliopage->short_description = $request['short_description'];
            $portfoliopage->description1 = $request['description1'];
            $portfoliopage->description2 = $request['description2'];
            $portfoliopage->save();        
            return redirect()->to('portfoliopage')->with('toast_success', 'Updated Successfully');
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
        $db = portfoliopage::findorfail($id);        
        $image = $db->img;
        if($image == 'rename'){
            $db->delete();
            return redirect()->back()->with('toast_success', 'Deleted Successfully');
        }
        else{
            $db->delete();
            unlink("public/frontend/images/portfoliopage/$image");
            return redirect()->back()->with('toast_success', 'Deleted Successfully');
        }
    }
     // Custome route status==============    
     public function activePortfoliopage($id)
     { 
         $portfoliopage = portfoliopage::findorfail($id);
         $portfoliopage->status = 1;
         $portfoliopage->save();
         return redirect()->to('portfoliopage')->with('toast_success', 'Portfolio Active Successfully');        
     }  
     public function unactivePortfoliopage($id)
     { 
         $portfoliopage = portfoliopage::findorfail($id);
         $portfoliopage->status = 0;
         $portfoliopage->save();
         return redirect()->to('portfoliopage')->with('toast_success', 'Portfolio Unactive Successfully');        
     } 
     // data duplicate route ===============
     public function duplicate($id){
         $db = portfoliopage::find($id);
         $newDb = $db->replicate(); 
         $newDb->img = 'rename';
         $newDb->save();
         return redirect()->to('portfoliopage')->with('toast_success', 'Duplicate Successfully'); 
     }
}
