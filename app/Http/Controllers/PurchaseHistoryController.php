<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PurchaseHistoryController extends Controller
{
    public function index($id){

        $user = User::find($id);

        /*if($user->isNot(auth()->user()) && $user->isNot(auth()->user()->isAdmin()))
        {
            abort(404);
        }*/
        if(auth()->user()->isAdmin()){
            return view('purchaseHistory.index', [
                'orders' => $user->purchaseHistory($user->id)
            ]);
        }
        elseif(auth()->user()->id != $user->id){
            abort(404);
        }
        else{
            return view('purchaseHistory.index', [
                'orders' => $user->purchaseHistory(auth()->user()->id)
            ]);
        }
    }
}