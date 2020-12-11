<?php

namespace App\Http\Controllers;

use App\model\portfoliocategory;
use Illuminate\Http\Request;
use DB;

class PortfoliocategoryController extends Controller
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
        $db = portfoliocategory::all();
        $count = $db->count();

        return view('admin.pages.home.portfoliocategory.index',compact('db','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.home.portfoliocategory.create');
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
            'name' => 'required|min:3|max:30',
        ]);        
        $portfoliocategory = new portfoliocategory;
        $portfoliocategory->name = $request['name'];
        $portfoliocategory->save();        
        return redirect()->to('portfoliocategory')->with('toast_success', 'Inserted Successfully');
             
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\portfoliocategory  $portfoliocategory
     * @return \Illuminate\Http\Response
     */
    public function show(portfoliocategory $portfoliocategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\portfoliocategory  $portfoliocategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $db = portfoliocategory::findorfail($id);
        return view('admin.pages.home.portfoliocategory.edit',compact('db'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\portfoliocategory  $portfoliocategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:30',
        ]);   
        $portfoliocategory = portfoliocategory::findorfail($id);
        $portfoliocategory->name = $request['name'];
        $portfoliocategory->save();        
        return redirect()->to('portfoliocategory')->with('toast_success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\portfoliocategory  $portfoliocategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = portfoliocategory::findorfail($id);  
        $db->delete();
        return redirect()->back()->with('toast_success', 'Deleted Successfully');
    } 
    // data duplicate route ===============
    public function duplicate($id){
        $db = portfoliocategory::find($id);
        $db->replicate()->save();
        return redirect()->to('portfoliocategory')->with('toast_success', 'Duplicate Successfully'); 
    }
}
