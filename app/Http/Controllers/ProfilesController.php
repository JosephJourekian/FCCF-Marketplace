<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
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

        try {
            $card_num = Crypt::decrypt(auth()->user()->card_number); 
            $cvc = Crypt::decrypt(auth()->user()->cvc); 
            $exp_date = Crypt::decrypt(auth()->user()->exp_date); 
        } catch (DecryptException $e) {
            $card_num = 'N/A';
            $cvc = 'N/A';
            $exp_date  = 'N/A';
        }

        
        if(auth()->user()->username != $userA->username)
        {
            abort(404);
        }
        
        return view('profiles.editPayment', [
            'user' => $userA,
            'card_num' => $card_num,
            'cvc' => $cvc,
            'exp_date' => $exp_date

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
        $attributes['cvc'] = Crypt::encrypt($attributes['cvc']);
        $attributes['exp_date'] = Crypt::encrypt($attributes['exp_date']);
        $userA->update($attributes);

        
        return redirect()->back();
    }
}