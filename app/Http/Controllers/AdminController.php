<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show()
    {
        return view('adminHome');
    }
    public function check(){
        if(auth()->user()->IsAdmin()){
            return view('admin');
        }
        else{
            return view('home');
        }
    }
}