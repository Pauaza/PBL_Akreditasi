<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        // Redirect ke halaman dashboard dengan anchor #contact
        return redirect('/#contact');
    }
}
