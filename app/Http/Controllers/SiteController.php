<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\model\portfolio\portfoliopage;
use App\model\portfoliocategory;
use App\model\portfolio\bgimg;
use App\model\about\about;
use App\model\about\mission;
use App\model\about\vision;
use App\model\welcome;
use App\model\service;
use App\model\footer;
use App\model\topbar;
use App\model\slider;

use DB;

class SiteController extends Controller
{
    public function index(){
        $welcome = welcome::all();
        $db = slider::where('status',1)->get();
        $dbService = service::where('status',1)->latest()->limit(8)->get();
        $dbPortfolio = portfoliopage::where('status',1)->latest()->limit(9)->get();
        $dbCategory = portfoliocategory::orderByRaw('name asc')->get();
        $a = 1;
        $b = 0;

        return view('pages.index', compact('welcome','db','dbService','dbPortfolio','dbCategory','a','b'));
    }
    public function about(){        
        $dbBgimg = bgimg::all();
        $dbAbout = about::all();
        $dbMission = mission::all();
        $dbVission = vision::all();
        return view('pages.about',compact('dbBgimg','dbAbout','dbMission','dbVission'));
    }
    public function service(){
        $dbBgimg = bgimg::all();	
        return view('pages.service',compact('dbBgimg'));
    }
    public function portfolios(){
        $dbPortfolioPage = portfoliopage::latest()->paginate(6);
        $dbBgimg = bgimg::all();	
        return view('pages.portfolios',compact('dbPortfolioPage','dbBgimg'));
    }
    public function singlePortfolio(Request $request, $id,$category_id){
        $dbSinglePortfolio = portfoliopage::findorfail($id);
        $dbBgimg = bgimg::all();  


        $dbAllPortfolio = DB::table('portfoliopages')
                        ->where('portfoliopages.id','!=',$id)
                        ->where('category_id',$category_id)
                        ->get();

        return view('pages.portfolio_single',compact('dbSinglePortfolio','dbAllPortfolio','dbBgimg'));
       
    }   
    public function contact(){
        $dbBgimg = bgimg::all();	
        $dbFooter = footer::all();	
        $dbTopbar = topbar::all();	
        return view('pages.contact',compact('dbBgimg','dbFooter','dbTopbar'));
    }        

    
}
