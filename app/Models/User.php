<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*protected $fillable = [
        'name',
        'email',
        'password',
    ];*/
    protected $guarded =[];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';

    public function isAdmin(){

        return $this->type === self::ADMIN_TYPE;
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
    public function setPasswordAttribute($value)//To hash the password being stored in the database
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function purchaseHistory($id){

        $user = User::find($id);
        

        return Orders::where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->paginate(50);
            
    }
    
}