<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutsController extends Controller
{
    public function index(){
        return view('about');
    }
}
