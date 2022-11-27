<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Carbon\Carbon;

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
    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    public function authenticated($request, $user)
    {

        if($user->status == 0)
        {
            Auth::logout();
            $request->session()->flash('error_message', 'Your Account is disabled please contact us for more details।');
            return redirect('/login');
        }

        $office = $user->office()->first();
        $now = Carbon::now();
        if($office && $office->status == 0)
        {
            Auth::logout();
            $request->session()->flash('error_message', 'Your Office Account is disabled please contact us for more details।');
            return redirect('/login');
        }

        if($office && $office->expiration_date && $office->expiration_date < $now)
        {
            Auth::logout();
            $request->session()->flash('error_message', 'Your Office Account is expired please contact us for more details।');
            return redirect('/login');
        }

        $user->where('id', Auth::user()->id)->update(['last_login' => $now]);
        
        if($user->last_password_change == null)
        {
            $request->session()->flash('error_message', 'पासवर्ड परिवर्तन गर्नुहोस् ।');
            return redirect()->route('profile.index');
        }

        return redirect()->intended($this->redirectPath());
    }
}
