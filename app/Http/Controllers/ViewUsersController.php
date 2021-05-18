<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ViewUsersController extends Controller
{
    //public function index()
    public function index()
    {
        return view('viewUsers', [
            'users' => User::paginate(50)
        ]);
    }

    public function edit(User $user){

        if(request('num') != NULL && request('add') != NULL){
            User::where('name', request('name'))->increment('points', request('num')); 

            return redirect()->back()->with('message', 'Points Added!');
        }
        elseif(request('num') != NULL && request('sub') != NULL){
            User::where('name', request('name'))->where('points','>',request('num'))->decrement('points', request('num')); 

            return redirect('/viewUsers')->with('message', 'Points removed!');
        }
        if(request('type') != NULL && request('name') != auth()->user()->name){
            User::where('name', request('name'))->update(['type'=> request('type')]);

            return redirect('/viewUsers')->with('message', 'Account type changed!');
        }
        else{
            return redirect('/viewUsers')->with('message', 'Error! Current account type cannot be changed!');
        }
    }
}
