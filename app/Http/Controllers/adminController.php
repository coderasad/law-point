<?php

namespace App\Http\Controllers;

use App\model\logo;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function login(){
        $db = logo::get();
        return view('admin.auth.login',compact('db'));
    }
}
