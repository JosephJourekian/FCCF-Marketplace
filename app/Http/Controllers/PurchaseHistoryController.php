<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PurchaseHistoryController extends Controller
{
    public function index(User $user){

        $userA = User::find($user)->first();

        
        if(auth()->user()->isAdmin()){
            return view('purchaseHistory.index', [
                'orders' => $userA->purchaseHistory($userA->id)
            ]);
        }
        elseif(auth()->user()->id != $userA->id){
            abort(404);
        }
        else{
            return view('purchaseHistory.index', [
                'orders' => $userA->purchaseHistory(auth()->user()->id)
            ]);
        }
    }
    public function indexTest(User $user){

        $userA = User::find($user)->first();

        
        if(auth()->user()->isAdmin()){
            return view('purchaseHistory.indexTest', [
                'orders' => $userA->purchaseHistory($userA->id)
            ]);
        }
        elseif(auth()->user()->id != $userA->id){
            abort(404);
        }
        else{
            return view('purchaseHistory.indexTest', [
                'orders' => $userA->purchaseHistory(auth()->user()->id)
            ]);
        }
    }
}