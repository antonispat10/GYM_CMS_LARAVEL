<?php

namespace App\Http\Controllers;

use App\Day;
use App\Post;
use App\User;
use App\Weight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Traits\Glob;


class HomeController extends Controller
{
    use Glob;

    public function __construct()
    {
        $this->glob();
    }


    public function news(){

        $posts = Post::paginate(6);

        $admin = false;
        if(Auth::check()){
        $user_id = (Auth::user()) ? Auth::user()->id : 'null';

        $admin = (Auth::user()) ? Auth::user()->hasAnyRole
        ('Admin') : false;


    }

        return view('news', compact( 'posts','admin'));

    }



public function post($id)
{
    $post = Post::findOrFail($id);

    $admin = false;
    if(Auth::check()) {
        $user_id = (Auth::user()) ? Auth::user()->id : 'null';
        $admin = (Auth::user()) ? Auth::user()->hasAnyRole
        ('Admin') : false;


    }

    return view('post', compact( 'post','admin'));



}


}