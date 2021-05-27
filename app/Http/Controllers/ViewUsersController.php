<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ViewUsersController extends Controller
{
    public function index()
    {
        return view('viewUsers', [
            'users' => User::paginate(50)
        ]);
    }

    public function edit(User $users, Request $request)
    {
            $users = $request->users;
            foreach($users as $user){
                if($user['type'] != null && $user['id'] != auth()->user()->id){
                    $userObj = User::find($user['id']);
                    $userObj->update(['type'=> $user['type']]);
                }
                if($user['points'] != null){
                    $userObj = User::find($user['id']);
                    if(($userObj->points + $user['points']) < 0){
                        $userObj->update(['points'=> 0]);
                    }
                    else{
                        $userObj->update(['points'=> $userObj['points'] + $user['points']]);
                    }
                }
            }
    
            return view('viewUsers', [
                'users' => User::paginate(50)
            ]);
    }
}
