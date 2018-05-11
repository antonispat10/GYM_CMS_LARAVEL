<?php

namespace App\Http\Controllers;

use App\Day;
use App\Post;
use App\User;
use App\Weight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $days = Day::all();

        View::share( 'days', $days);

        $us1 = User::all();
        View::share( 'us1', $us1);


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


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