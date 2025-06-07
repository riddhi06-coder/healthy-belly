<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Admin;
use App\Models\Staffmember;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
        protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:staffmember');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'first_name' => ['required', 'string', 'max:255'],
    //         'last_name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'contact' => ['required', 'min:10'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //         'password_confirmation' => ['required', 'min:8'],
    //     ],[
    //         'first_name.required' => __('First Name is required.'),
    //         'last_name.required' => __('Last Name is required.'),
    //         'email.required' => __('Email is required.'),
    //         'contact.required' => __('Contact is required.'),
    //         'password.required' => __('Password is required.'),
    //         'password_confirmation.required' => __('Confirm Password is required.'),
    //     ]);
    // }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contact' => ['required', 'digits:10'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'first_name.required' => 'First Name is required.',
            'last_name.required' => 'Last Name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be a valid email address.',
            'email.unique' => 'This email is already registered.',
            'contact.required' => 'Contact number is required.',
            'contact.digits' => 'Contact number must be exactly 10 digits.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Passwords do not match.',
        ]);
    }





    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */


    // protected function create(array $data)
    // {
    //     return Validator::make($data, [
    //         'first_name' => ['required', 'string', 'max:255'],
    //         'last_name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'contact' => ['required', 'min:10'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //         'password_confirmation' => ['required', 'min:8'],
    //     ],[
    //         'first_name.required' => __('First Name is required.'),
    //         'last_name.required' => __('Last Name is required.'),
    //         'email.required' => __('Email is required.'),
    //         'contact.required' => __('Contact is required.'),
    //         'password.required' => __('Password is required.'),
    //         'password_confirmation.required' => __('Confirm Password is required.'),
    //     ]);
    // }


    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'contact' => $data['contact'],
            'password' => Hash::make($data['password']),
        ]);
    }


    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }
    public function showStaffmemberRegisterForm()
    {
        return view('auth.register', ['url' => 'staffmember']);
    }

    protected function createAdmin(Request $request)
    {
        
        $this->validator($request->all())->validate();
        $admin = Admin::create([
            'name' => $request['first_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/admin');
    }

    protected function createStaffmember(Request $request)
    {
        $this->validator($request->all())->validate();
        $writer = Staffmember::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'contact' =>$request['contact'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/staffmember');
    }
}
