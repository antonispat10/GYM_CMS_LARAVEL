<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','surname', 'email', 'password', 'age', 'telephone', 'address', 'height','photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $uploads = '/';




    public function getPhotoAttribute($photo){
        return $this->uploads . $photo;
    }
    public function posts(){

        return $this->hasMany(Post::class);

    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function weight(){

        return $this->hasOne(Weight::class);

    }

    public function roles(){

        return $this->belongsToMany(Role::class, 'role_users');

    }

    public function exercises(){

        return $this->hasMany(Exercise::class);

    }

    public function hasAnyRole($roles) {
        if (!is_array($roles)) {
            $roles = [$roles]; //instead of create another query, this will let you change query just in one place if needed in future
        }
        if ($this->roles()->whereIn('name', $roles)->first()) {
            return true;
        }
        return false;
    }


}
