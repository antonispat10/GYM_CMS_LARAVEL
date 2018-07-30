<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model {

    protected $fillable = [
        'name'
    ];

    protected $casts = [
        'name' => 'array'
    ];

    public function exercises() {

        return $this->belongsToMany(Exercise::class, 'day_exercises');
    }

}
