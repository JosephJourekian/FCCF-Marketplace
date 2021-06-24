<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FccfUrls extends Model
{
    use HasFactory;
    protected $table = "fccf_urls";
    protected $guarded = [];

    public function fccfupdates(){ //Always have the name::class be the same name as the function name{
        return $this->belongsToMany(FccfUpdates::class);
    } 
}
