<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FccfUrls;

class FccfUpdates extends Model
{
    use HasFactory;
    protected $table = "fccf_updates";
    protected $guarded = [];


    public function getImageAttribute($value)
    {
        
        return asset('storage/'.$value);  //path to the image
    }

    public function getRouteKeyName()
    {
        //This is used to search for the name instead of the id\
        return 'updatename';
    }
    public function url(){
        return $this->hasMany(FccfUrls::class);
    }   
}
