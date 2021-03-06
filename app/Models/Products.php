<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\ProductsAttribute;
use App\Models\ProductsImage;

class Products extends Model
{
    use HasFactory;

    //protected $fillable = ['name', 'description', 'price', 'image', 'stock'];
    protected $guarded = [];
    public $timestamps = false;

    public function getImageAttribute($value)
    {
        
        return asset('storage/'.$value);  //path to the image
    }

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
    public function getRouteKeyName()
    {
        //This is used to search for the name instead of the id\
        return 'name';
    }
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
    public function attributes(){
        return $this->hasMany(ProductsAttribute::class);
    }
    public function images(){
        return $this->hasMany(ProductsImage::class);
    }   
}