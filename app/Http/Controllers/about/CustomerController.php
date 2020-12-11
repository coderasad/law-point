<?php

namespace App\Http\Controllers\about;

use App\model\about\customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
        $db = customer::all();
        $count = $db->count();
        return view('admin.pages.about.customer.index',compact('db','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.about.customer.create');
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
            'img' => 'required',
        ]);

        $image = $request->file('img');
        $image_name = 'customer-'.rand(1,100);
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'public/frontend/images/about/';
        $success = $image->move($upload_path,$image_full_name);

        $customer = new customer;
        $customer->img = $image_full_name;
        $customer->save();        
        return redirect()->to('customer')->with('toast_success', 'Inserted Successfully');
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
        $db = customer::findorfail($id);
        return view('admin.pages.about.customer.edit',compact('db'));
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

        $image = $request->file('img');
        if($image){
            $image_name = 'customer-'.rand(1,100);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/frontend/images/about/';
            $success = $image->move($upload_path,$image_full_name); 
            if($request->old_img == 'public/frontend/images/about/rename'){
                $customer = customer::findorfail($id);                 
                $customer->img = $image_full_name;
                $customer->save();        
                return redirect()->to('customer')->with('toast_success', 'Updated Successfully');
            }   
            else{
                unlink($request->old_img);   
                $customer = customer::findorfail($id);                 
                $customer->img = $image_full_name;
                $customer->save();        
                return redirect()->to('customer')->with('toast_success', 'Updated Successfully');
            }               
        }else{
            $customer = customer::findorfail($id);
            $customer->save();        
            return redirect()->to('customer')->with('toast_success', 'Updated Successfully');
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
        $db = customer::findorfail($id);        
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
    public function activeCustomer($id)
    { 
        $customer = customer::findorfail($id);
        $customer->status = 1;
        $customer->save();
        return redirect()->to('customer')->with('toast_success', 'Customer Active Successfully');        
    }  
    public function unactiveCustomer($id)
    { 
        $customer = customer::findorfail($id);
        $customer->status = 0;
        $customer->save();
        return redirect()->to('customer')->with('toast_success', 'Customer Unactive Successfully');        
    } 
    // data duplicate route ===============
    public function duplicate($id){
        $db = customer::find($id);
        $newDb = $db->replicate(); 
        $newDb->img = 'rename';
        $newDb->save();
        return redirect()->to('customer')->with('toast_success', 'Duplicate Successfully'); 
    }
}
