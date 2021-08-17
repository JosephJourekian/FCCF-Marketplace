<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class ProfilesController extends Controller
{
    public function index(){
        return view('profiles.index');
    }
    
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

    public function editAddress(User $user){

        $userA = User::find($user)->first();

        if(auth()->user()->username != $userA->username)
        {
            abort(404);
        }
        
        return view('profiles.editAddress', [
            'user' => $userA
        ]);

    }

    public function update(User $user){

        $userA = User::find($user)->first();

        $attributes = request()->validate([
            'email' => ['string','required','email','max:255',
                Rule::unique('users')->ignore($userA),
            ],
            'password' => ['string','required','min:8','max:255','confirmed',],
        ]);   

        $userA->update($attributes);
        
        return view('home')->with('message', 'Profile Updated!');
    }

    public function updateAddress(User $user){

        
        $userA = User::find($user)->first();

        $attributes = request()->validate([
            'address' => ['string', 'required', 'max:255'],
            'city' => ['string', 'required', 'max:255'],
            'province' => ['string', 'required', 'max:255'],
            'postalCode' => ['string', 'required', 'max:255'],
            'phone' => ['string', 'required', 'max:255'],
        ]);   

        $userA->update($attributes);
        
        return redirect()->back();
    }
}