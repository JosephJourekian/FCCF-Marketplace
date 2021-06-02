<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductsAttributes extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function products(){ //Always have the name::class be the same name as the function name{
        return $this->belongsToMany(Products::class);
    } 
}
