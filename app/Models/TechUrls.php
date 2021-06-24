<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechUrls extends Model
{
    use HasFactory;
    protected $table = "tech_urls";
    protected $guarded = [];

    public function techUpdates(){ //Always have the name::class be the same name as the function name{
        return $this->belongsToMany(TechUpdates::class);
    } 
}
