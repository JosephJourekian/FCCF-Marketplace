<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfilesController extends Controller
{
    public function edit($id){

        $user = User::find($id);
        if($user->isNot(auth()->user()))
        {
            abort(404);
        }

        return view('profiles.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user, $id){

        $user = User::find($id);

        $attributes = request()->validate([
            'address' => ['string', 'required', 'max:255'],
            'city' => ['string', 'required', 'max:255'],
            'province' => ['string', 'required', 'max:255'],
            'postalCode' => ['string', 'required', 'max:255'],
            'phone' => ['string', 'required', 'max:255'],
        ]);   

        $user->update($attributes);
        
        return view('home', [
            'user' => auth()->user()->id])
            ->with('message', 'Profile Updated!');
    }
}