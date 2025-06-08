<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KriteriaModel;

class KriteriaConfigController extends Controller{
    public function index()
    {
        $kriterias = KriteriaModel::all();
        return view('superAdmin.kriteriaConfig.index', compact('kriterias'));
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
