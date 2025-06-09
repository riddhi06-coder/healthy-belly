<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:staffmember')->except('logout');
        session(['url.intended' => url()->previous()]);
        $this->redirectTo = session()->get('url.intended');
    }

    public function showAdminLoginForm(){
        
        return view('auth.login',['url'=>'admin']);

    }

    public function showUserLoginForm(){

        $urlPrevious = url()->previous();
        $urlBase = url()->to('/');

        if(($urlPrevious != $urlBase . '/login') && (substr($urlPrevious, 0, strlen($urlBase)) === $urlBase)) {
            session()->put('url.intended', $urlPrevious);
        }

        return view('user-login',['url'=>'user']);
        // return redirect()->route('user_login');

    }


    public function adminLogin(Request $req){

        // dd($req);
        $this->validate($req,[
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('admin')->attempt(['email' => $req->email, 'password' => $req->password], $req->get('remember'))) {

            // return redirect()->intended('/admin');
            return redirect()->route('admin_dashboard');
        }
        return back()->withInput($req->only('email', 'remember'));
    }


    public function userLogin(Request $req){

        $this->validate($req,[
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('web')->attempt(['email' => $req->email, 'password' => $req->password])) {

            // return redirect()->intended('/');
            // return redirect()->back();
            return Redirect::intended();
        }
        return back()->withInput($req->only('email', 'remember'));
    }

    public function showStaffmemberLoginForm(){
        return view('auth.login',['url'=>'staffmember']);

    }
    public function staffmemberLogin(Request $req){

        $this->validate($req,[
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('staffmember')->attempt(['email' => $req->email, 'password' => $req->password])) {
            
            return redirect()->intended('/staffmember');
        }
        return back()->withInput($req->only('email', 'remember'));
    }


    public function logout(Request $request)
    {
        $guard = null;

        if (Auth::guard('admin')->check()) {
            $guard = 'admin';
        } elseif (Auth::guard('staffmember')->check()) {
            $guard = 'staffmember';
        } else {
            $guard = 'web';
        }

        Auth::guard($guard)->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        switch ($guard) {
            case 'admin':
                return redirect('/login/admin');
            case 'staffmember':
                return redirect('/staffmember/login');
            default:
                return redirect('/login/admin'); 
        }
    }
}
