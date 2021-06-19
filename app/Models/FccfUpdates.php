<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FccfUpdates extends Model
{
    use HasFactory;
    protected $table = "fccf_updates";
    protected $guarded = [];


    public function getRouteKeyName()
    {
        //This is used to search for the name instead of the id\
        return 'name';
    }
}
