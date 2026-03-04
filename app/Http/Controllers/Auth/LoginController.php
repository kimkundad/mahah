<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;
use Auth;
use Illuminate\Support\Facades\DB;
use DateTime;


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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function authenticated(Request $request)
     {

      //  dd($request->user());
     // Logic that determines where to send the user
     if($request->user()->hasRole('superadmin')){
     return redirect('/admin/dashboard');
     }
     if($request->user()->hasRole('admin')){
     return redirect('/admin/dashboard');
     }
     if($request->user()->hasRole('user')){

     //   dd($request->user()->birthday);

        $today = date("Y-m-d H:i"); 
        $startdate = $request->user()->birthday; 
        $offset = strtotime("+1 day");
        $enddate = date($startdate, $offset);    
        $today_date = new DateTime($today);
        $expiry_date = new DateTime($enddate);
  
        if ($expiry_date < $today_date) { 
            $request->session()->flush();
            return redirect(url('login'))->with('expired','อายุใช้งานของคุณหมด กรุณาติดต่อเจ้าหน้าที่');

         }else{
    
            return redirect('/welcome');
         }
        
       
     }

     //return redirect('/');
     }

     

    
}
