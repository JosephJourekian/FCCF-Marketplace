<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfilesController extends Controller
{
    public function edit(User $user){

        $userA = User::find($user)->first();

        if(auth()->user()->username != $userA->username)
        {
            abort(404);
        }
        
        return view('profiles.edit', [
            'user' => $userA
        ]);

    }

    public function update(User $user){

        $userA = User::find($user)->first();

        $attributes = request()->validate([
            'address' => ['string', 'required', 'max:255'],
            'city' => ['string', 'required', 'max:255'],
            'province' => ['string', 'required', 'max:255'],
            'postalCode' => ['string', 'required', 'max:255'],
            'phone' => ['string', 'required', 'max:255'],
        ]);   

        $userA->update($attributes);
        
        return view('home')->with('message', 'Profile Updated!');
    }
}