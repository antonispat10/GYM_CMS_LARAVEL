<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [

        'name',
        'set',
        'reps',
        'exercise',
        'exerciselist_id',
        'user_id',
    ];



    public function user (){

        return $this->belongsTo('App\User');

    }

    public function days (){

            return $this->belongsToMany('App\Day');

    }

    public function exerciselists (){

        return $this->belongsTo('App\Exerciselist','exerciselist_id');

    }


}
