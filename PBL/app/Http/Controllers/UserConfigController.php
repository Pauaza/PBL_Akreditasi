<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class userConfigController extends Controller{
    public function index()
    {
        $users = UserModel::with('level')->get();
        return view('superAdmin.userConfig.index', compact('users'));
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
