<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
//    use Sluggable;
//
//    use SluggableScopeHelpers;
//    /**
//     * Return the sluggable configuration array for this model.
//     *
//     * @return array
//     */
//    public function sluggable()
//    {
//        return [
//            'slug' => [
//                'source' => 'title'
//            ]
//        ];
//    }



    protected $fillable = [

        'photo',
        'title',
        'body',

    ];

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function photoPlaceholder(){

        return "http://placehold.it/300X300";

    }


}
