<?php

namespace App;

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

    protected $uploads = '/images/posts/';


    protected $fillable = [

        'photo',
        'title',
        'body',

    ];


    public function user(){

        return $this->belongsTo('App\User');

    }

    public function photo(){

        return $this->belongsTo('App\Photo');

    }


    public function photoPlaceholder(){

        return "http://placehold.it/300X300";

    }

    public function getPhotoAttribute($photo){
        return $this->uploads . $photo;
    }

}
