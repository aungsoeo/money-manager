<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;

class UsersController extends Controller
{

    public function __construct()
    {
        
    }

    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect('/auth/login');
        }
//        $lists = DB::table('lists')->get();
        return view('site.users.dashboard', array(
        ));
    }

}
