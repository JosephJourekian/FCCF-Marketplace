<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLinksController extends Controller
{
    public function index()
    {
        return view('adminLinks');
    }
}
