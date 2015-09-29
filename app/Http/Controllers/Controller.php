<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;

abstract class Controller extends BaseController
{

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function isUserAdmin()
    {
        $this->checkAuth();
        return (Auth::user()->type == "ADMIN") ? true : false;
    }

    public function checkAuth()
    {
        if (!Auth::check()) {
            return redirect('/auth/login');
        }
    }

}
