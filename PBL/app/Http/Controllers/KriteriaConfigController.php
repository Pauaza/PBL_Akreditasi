<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KriteriaConfigController extends Controller{
    public function index()
    {
        return view('superAdmin.kriteriaConfig.index');
    }

    public function view()
    {
        return view('superAdmin.kriteriaConfig.view_ajax');
    }

    public function edit()
    {
        return view('superAdmin.kriteriaConfig.edit_ajax');
    }
}
