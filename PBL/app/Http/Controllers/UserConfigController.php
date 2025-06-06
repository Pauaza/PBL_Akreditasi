<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userConfigController extends Controller{
    public function index()
    {
        return view('superAdmin.userConfig.index');
    }

    public function view()
    {
        return view('superAdmin.userConfig.view_ajax');
    }

    public function edit()
    {
        return view('superAdmin.userConfig.edit_ajax');
    }
}
