<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use Session;

class AuthController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Registration & Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users, as well as the
      | authentication of existing users. By default, this controller uses
      | a simple trait to add these behaviors. Why don't you explore it?
      |
     */

use AuthenticatesAndRegistersUsers,
    ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
        ]);
    }

    public function getLogin()
    {
        return view('site.auth.login');
    }

    public function getRegister()
    {
        return view('site.auth.register');
    }

    /**
     * 
     * @param \Illuminate\Http\Request $request
     */
    public function postLogin(Request $request)
    {
        $data = $request->input();

        $rules = array(
            'email' => 'required|email',
            'password' => 'required|min:6'
        );

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return \Redirect::to('/auth/login')->withInput()->withErrors($validator);
        }

        $userData = array(
            'email' => $data['email'],
            'password' => $data['password'],
            'is_deleted' => 0,
            'is_blocked' => 0,
            'type' => $data['type']
        );

        if (Auth::validate($userData)) {
            if (Auth::attempt($userData)) {
                Session::flash('success', 'You are logged in.');
                return Redirect::intended("/home");
            }
        } else {
            Session::flash('error', 'Wrong username or password.');
            return redirect('/auth/login');
        }
    }

    /**
     * 
     * @param \Illuminate\Http\Request $request
     */
    public function postRegister(Request $request)
    {
        $data = $request->input();

        $rules = array(
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password'
        );

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return \Redirect::to('/auth/register')->withInput()->withErrors($validator);
        }

        $userData = array(
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'is_deleted' => 0,
            'is_blocked' => 0,
            'type' => 'USER'
        );

        $this->create($userData);
        if (Auth::validate($userData)) {
            if (Auth::attempt($userData)) {
                Session::flash('success', 'You are logged in.');
                return redirect("/home");
            }
        } else {
            Session::flash('error', 'Something went wrong.');
            return redirect('/auth/register');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        Session::flash('success', 'You are successfully logged out.');
        return redirect('/auth/login');
    }

}
