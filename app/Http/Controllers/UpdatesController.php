<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdatesController extends Controller
{
    public function index(){
        return view('updates');
    }
}
