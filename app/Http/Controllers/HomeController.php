<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserActivity;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$id = Auth::user()->id;
    	$loginCount = UserActivity::where('user_id',$id)->where('activity','login')->count();
    	$logoutCount = UserActivity::where('user_id',$id)->where('activity','logout')->count();

    	$activities = UserActivity::where('user_id',$id)->get();
    	
        return view('home',compact('loginCount','logoutCount','activities'));
    }
}
