<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TechUpdates;
use App\Models\TechUrls;
use DB;
use Carbon\Carbon;

class TechUpdatesController extends Controller
{
    public function index(){

        return view('techUpdates.index', [
            'updates' => TechUpdates::latest()->get()
        ]);
    }

    public function show(TechUpdates $techname){

        return view('techUpdates.show', [ 
            'update' => TechUpdates::find($techname)->first(),
            'url' => TechUrls::all(),
        ]);

    }
    public function edit(TechUpdates $techname){

        return view('techUpdates.edit', [
            'update' => TechUpdates::find($techname)->first(),
        ]);

    }

    public function update(TechUpdates $techname, Request $request){

        $update = TechUpdates::find($techname)->first();
        
        $attributes = ([
            'techname' => str_replace(' ', '-', strtolower(request('name'))),
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
    
        return redirect('/techUpdates')->with('message', 'Update Modified!');
    }

    public function delete(Request $request){

        $id = $request->input('id');
        TechUpdates::where('id', $id)->delete();
        return view('techUpdates.index', [
            'updates' => TechUpdates::latest()->get()
        ])->with('message', 'Update Removed!');
    }

    public function add(){
        return view('techUpdates.add');
    }

    public function store(Request $request){

        $array = explode(', ',request('url'));
        $attributes = ([
            'techname' => str_replace(' ', '-', strtolower(request('name'))),
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
        
        DB::table('tech_updates')->insert($attributes);
        
        foreach ($array as $item){
            $techname =  str_replace(' ', '-', strtolower(request('name')));
            $techUpdates = TechUpdates::where('techname', $techname)->first();
            $val = [
                'tech_updates_id' => $techUpdates->id,
                'url' => $item,
            ];
            DB::table('tech_urls')->insert($val);
        }

        return redirect()->back()->with('message', 'Update Added!');

    }
}
