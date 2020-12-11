<?php

namespace App\Http\Controllers;

use App\model\topbar;
use Illuminate\Http\Request;

class TopbarController extends Controller
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
        $db = topbar::all();
        $count = $db->count();
        // $dbtrash = topbar::onlyTrashed()->latest()->get();
        return view('admin.pages.home.topbar.index', compact('db', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.home.topbar.create'); 
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
            'fb_link' => 'required|min:10|max:50',
            'tw_link' => 'required|min:10|max:50',
            'in_link' => 'required|min:10|max:50',
            'phone' => 'required|min:11|max:16',
            'news' => 'required',
            'footer_des' => 'required',
        ]);

        $topbar = new topbar;
        $topbar->fb_link = $request['fb_link'];
        $topbar->tw_link = $request['tw_link'];
        $topbar->in_link = $request['in_link'];
        $topbar->phone = $request['phone']; 
        $topbar->news = $request['news'];
        $topbar->footer_des = $request['footer_des'];
        $topbar->save();        
        return redirect()->to('topbar')->with('toast_success', 'Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\topbar  $topbar
     * @return \Illuminate\Http\Response
     */
    public function show(topbar $topbar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\topbar  $topbar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $db = topbar::findorfail($id);
        return view('admin.pages.home.topbar.edit',compact('db'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\topbar  $topbar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'fb_link' => 'required|min:10|max:50',
            'tw_link' => 'required|min:10|max:50',
            'in_link' => 'required|min:10|max:50',
            'phone' => 'required|min:11|max:16',
            'news' => 'required',
            'footer_des' => 'required',
        ]);

        $topbar = topbar::findorfail($id);
        $topbar->fb_link = $request['fb_link'];
        $topbar->tw_link = $request['tw_link'];
        $topbar->in_link = $request['in_link'];
        $topbar->phone = $request['phone']; 
        $topbar->news = $request['news'];
        $topbar->footer_des = $request['footer_des'];
        $topbar->save();        
        return redirect()->to('topbar')->with('toast_success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\topbar  $topbar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = topbar::findorfail($id);
        $db->delete();
        return redirect()->back()->with('toast_success', 'Deleted Successfully');
    }
}
