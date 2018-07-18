<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model {
    protected $fillable = [

        'name',
        'set',
        'reps',
        'exercise',
        'exercise_list_id',
        'user_id',
    ];

    public function user() {

        return $this->belongsTo(User::class);
    }

    public function days() {

        return $this->belongsToMany(Day::class, 'day_exercises');
    }

    public function exerciselists() {

        return $this->belongsTo(ExerciseList::class, 'exercise_list_id');
    }

}
