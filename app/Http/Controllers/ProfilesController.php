<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
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

    public function editPayment(User $user){

        $userA = User::find($user)->first();
        //$decrypted = Crypt::decrypt($user->card_number); Decrypt card number
        
        if(auth()->user()->username != $userA->username)
        {
            abort(404);
        }
        
        return view('profiles.editPayment', [
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
        $attributes['password'] = Hash::make($attributes['password']);
        $userA->update($attributes);
        
        return redirect()->back();
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

    public function updatePayment(User $user){

        $userA = User::find($user)->first();
        $attributes = request()->validate([
            'card_number' => ['string','required','max:255',],
            'cvc' => ['string','required','min:3','max:255',],
            'exp_date' => ['string','required','min:3','max:255',],
        ]);   
        $attributes['card_number'] = Crypt::encrypt($attributes['card_number']);
        $userA->update($attributes);

        
        return redirect()->back();
    }
}