<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    protected $fillable = [
        'count',
    ];

    public function user(){

        return $this->belongsTo(User::class);

    }
}
