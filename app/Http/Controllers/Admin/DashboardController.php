<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $this->isUserAdmin();
        return view('admin.dashboard.dashboard', array(
            
        ));
    }

}
