<?php

namespace App\Http\Controllers\Admin;

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

    public function index()
    {
        $this->isUserAdmin();
        $users = DB::table('users')
                ->where('type', 'USER')
                ->get();
        return view('admin.users.index', array(
            'users' => $users
        ));
    }

}
