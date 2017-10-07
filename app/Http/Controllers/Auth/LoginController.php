<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\UserActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    
    protected function authenticated($request, $user)
    {
    	   UserActivity::create([
    	   			'user_id' => $user->id,
    	   			'activity' => 'login'
    	   		]);
    }
    
    public function logout(Request $request)
    {

    	UserActivity::create([
    			'user_id' => Auth::user()->id,
    			'activity' => 'logout'
    	]);
    	
    	Auth::logout(); 
    
    	return redirect('/');
    }
}
