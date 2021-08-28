<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FccfUpdates;
use App\Models\FccfUrls;
use DB;
use Carbon\Carbon;


class FccfUpdatesController extends Controller
{
    public function index(){

        return view('fccfUpdates.index', [
            'updates' => FccfUpdates::latest()->get()
        ]);
    }
    public function test(){

        return view('fccfUpdatesTest', [
            'updates' => FccfUpdates::latest()->get()
        ]);
    }

    public function show(FccfUpdates $updatename){

        return view('fccfUpdates.show', [ 
            'update' => FccfUpdates::find($updatename)->first(),
            'url' => FccfUrls::all(),
        ]);

    }

    public function showTest(FccfUpdates $updatename){

        return view('fccfUpdates.showTest', [ 
            'update' => FccfUpdates::find($updatename)->first(),
            'url' => FccfUrls::all(),
        ]);

    }
    public function edit(FccfUpdates $updatename){

        return view('fccfUpdates.edit', [
            'update' => FccfUpdates::find($updatename)->first(),
        ]);

    }

    public function update(FccfUpdates $updatename, Request $request){

        $update = FccfUpdates::find($updatename)->first();
        
        $attributes = ([
            'updatename' => str_replace(' ', '-', strtolower(request('name'))),
            'author' => auth()->user()->name,
            'title' => request('name'),
            'excerpt' => request('excerpt'),
            'body' => request('body'),           
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        if(request('image'))
        {
            $attributes['image'] = request('image')->store('pics', 'public');
        }
        
        $update->update($attributes);
    
        return redirect('/fccfUpdates')->with('message', 'Update Modified!');
    }

    public function delete(Request $request){

        $id = $request->input('id');
        FccfUpdates::where('id', $id)->delete();
        return view('fccfUpdates.index', [
            'updates' => FccfUpdates::latest()->get()
        ])->with('message', 'Update Removed!');
    }

    public function add(){
        return view('fccfUpdates.add');
    }

    public function store(Request $request){

        $array = explode(', ',request('url'));
        $attributes = ([
            'updatename' => str_replace(' ', '-', strtolower(request('name'))),
            'author' => auth()->user()->name,
            'title' => request('name'),
            'excerpt' => request('excerpt'),
            'body' => request('body'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        if(request('image'))
        {
            $attributes['image'] = request('image')->store('pics', 'public');
        }
        
        DB::table('fccf_updates')->insert($attributes);
        foreach ($array as $item){
            $updatename =  str_replace(' ', '-', strtolower(request('name')));
            $fccfUpdates = FccfUpdates::where('updatename', $updatename)->first();
            $val = [
                'fccf_updates_id' => $fccfUpdates->id,
                'url' => $item,
            ];
            DB::table('fccf_urls')->insert($val);
        }

        return redirect()->back()->with('message', 'Update Added!');

    }
}
