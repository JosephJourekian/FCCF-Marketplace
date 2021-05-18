<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'image', 'stock'];
    //protected $guarded = [];
    public $timestamps = false;

    public function getImageAttribute($value)
    {
        
        return asset('storage/'.$value);  //path to the image
    }

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
}
