<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TechUrls;


class TechUpdates extends Model
{
    use HasFactory;
    protected $table = "tech_updates";
    protected $guarded = [];

    public function getImageAttribute($value)
    {
        
        return asset('storage/'.$value);  //path to the image
    }

    public function getRouteKeyName()
    {
        //This is used to search for the name instead of the id\
        return 'techname';
    }

    public function url(){
        return $this->hasMany(TechUrls::class);
    }   
}
