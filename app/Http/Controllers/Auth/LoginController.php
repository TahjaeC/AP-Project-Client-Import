<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
<<<<<<< HEAD

class LoginController extends Controller
{
=======
Use ThrottlesLogins;

class LoginController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $maxLoginAttempts = 3; // Amount of bad attempts user can make
    protected $lockoutTime = 300; // Time for which user is going to be blocked in seconds
>>>>>>> feature/api-integration
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
<<<<<<< HEAD
=======

    protected function sendLockoutResponse(Request $request)
    {
        return redirect('/products');
    }
>>>>>>> feature/api-integration
}
