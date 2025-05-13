<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KriteriaAdminController extends Controller
{
    public function index()
    {
        return view('kriteria.kriteria_admin');
    }
}
