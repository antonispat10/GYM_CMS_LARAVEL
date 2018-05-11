<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Day extends Model
{

    protected $fillable = [

        'name'

    ];

    protected $casts = [
        'name' => 'array'
    ];

    public function exercises ()
    {
        return $this->belongsToMany('App\Exercise');
    }

    public function user()
    {
        return $this->exercise->user;
    }





}
