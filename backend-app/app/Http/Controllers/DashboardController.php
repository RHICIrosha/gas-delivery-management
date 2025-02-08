<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function customerDashboard()
    {
        return view('customer.dashboard');
    }
    public function adminDashboard()
    {
        return view('admin.dashboard');
    }
    public function outletDashboard()
    {
        return view('outlet.dashboard');
    }
    public function businessDashbord()
    {
        return view('business.dashbord');
    }


}
