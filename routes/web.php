<?php

use Illuminate\Support\Facades\Route;


// frontend route===========
Route::get('/','SiteController@index')->name('index');
Route::get('about_us','SiteController@about')->name('aboutUs');
Route::get('services','SiteController@service')->name('services');
Route::get('portfolios','SiteController@portfolios')->name('portfolios');
Route::get('single_portfolio/{id}/{category_id}','SiteController@singlePortfolio');
Route::get('contact','SiteController@contact')->name('contact');


// auth here ============
Auth::routes();
Route::get('admin', 'HomeController@index')->name('home');


// Admin===========
Route::get('admin/login','adminController@login')->name('admin.login');

// change password===========
Route::get('change_password', 'Auth\ChangePasswordController@changePassword')->name('changePassword');
Route::post('update_password', 'Auth\ChangePasswordController@updatePassword')->name('updatePassword');

// home page route are here====================
// logo---------
Route::resource('logo', 'LogoController');
Route::get('logo/{id}/destroy', 'LogoController@destroy');
Route::get('activeLogo/{id}', 'LogoController@activeLogo');
// topbar---------
Route::resource('topbar', 'TopbarController');
Route::get('topbar/{id}/destroy', 'TopbarController@destroy');
// slider---------
Route::resource('slider', 'SliderController');
Route::get('slider/{id}/destroy', 'SliderController@destroy');
Route::get('activeSlider/{id}', 'SliderController@activeSlider');
Route::get('unactiveSlider/{id}', 'SliderController@unactiveSlider');
Route::get('duplicateSlider/{id}', 'SliderController@duplicate');
// welcome---------
Route::resource('welcome', 'WelcomeController');
Route::get('welcome/{id}/destroy', 'WelcomeController@destroy');
// service---------
Route::resource('service', 'ServiceController');
Route::get('service/{id}/destroy', 'ServiceController@destroy');
Route::get('activeService/{id}', 'ServiceController@activeService');
Route::get('unactiveService/{id}', 'ServiceController@unactiveService');
Route::get('duplicateService/{id}', 'ServiceController@duplicate');
// portfolio---------
Route::resource('portfolio', 'PortfolioController');
Route::get('portfolio/{id}/destroy', 'PortfolioController@destroy');
Route::get('activePortfolio/{id}', 'PortfolioController@activePortfolio');
Route::get('unactivePortfolio/{id}', 'PortfolioController@unactivePortfolio');
Route::get('duplicatePortfolio/{id}', 'PortfolioController@duplicate');
// portfolio_category---------
Route::resource('portfoliocategory', 'portfoliocategoryController');
Route::get('portfoliocategory/{id}/destroy', 'portfoliocategoryController@destroy');
Route::get('duplicatePortCat/{id}', 'PortfoliocategoryController@duplicate');
// footer---------
Route::resource('footer', 'FooterController');
Route::get('footer/{id}/destroy', 'FooterController@destroy');


// about page route are here====================
// about---------
Route::resource('about', 'about\AboutController');
Route::get('about/{id}/destroy', 'about\AboutController@destroy');
// mission---------
Route::resource('mission', 'about\MissionController');
Route::get('mission/{id}/destroy', 'about\MissionController@destroy');
// vision---------
Route::resource('vision', 'about\VisionController');
Route::get('vision/{id}/destroy', 'about\VisionController@destroy');
// team member---------
Route::resource('team', 'about\TeamController');
Route::get('team/{id}/destroy', 'about\TeamController@destroy');
Route::get('activeTeam/{id}', 'about\TeamController@activeTeam');
Route::get('unactiveTeam/{id}', 'about\TeamController@unactiveTeam');
Route::get('duplicateTeam/{id}', 'about\TeamController@duplicate');
// Customer member---------
Route::resource('customer', 'about\CustomerController');
Route::get('customer/{id}/destroy', 'about\CustomerController@destroy');
Route::get('activeCustomer/{id}', 'about\CustomerController@activeCustomer');
Route::get('unactiveCustomer/{id}', 'about\CustomerController@unactiveCustomer');
Route::get('duplicateCustomer/{id}', 'about\CustomerController@duplicate');


// portfolio page route are here====================
// portfolio---------
Route::resource('portfoliopage', 'portfolio\PortfoliopageController');
Route::get('portfoliopage/{id}/destroy', 'portfolio\PortfoliopageController@destroy');
Route::get('activePortfoliopage/{id}', 'portfolio\PortfoliopageController@activePortfoliopage');
Route::get('unactivePortfoliopage/{id}', 'portfolio\PortfoliopageController@unactivePortfoliopage');
Route::get('duplicatePortfoliopage/{id}', 'portfolio\PortfoliopageController@duplicate');
// background image---------
Route::resource('bgimg', 'portfolio\BgimgController');
Route::get('bgimg/{id}/destroy', 'portfolio\BgimgController@destroy');