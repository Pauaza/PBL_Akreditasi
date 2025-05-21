<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidatorDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard_validator');
    }
}
