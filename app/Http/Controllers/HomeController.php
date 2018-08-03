<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
    public function __construct() {

        parent::__construct();
    }

    public function news() {

        $posts = Post::orderBy('created_at', 'desc')->paginate(20);

        $admin = false;

        if(Auth::check()) {
            $admin = !is_null(Auth::user()) ? Auth::user()->hasAnyRole('Admin') : false;
        }

        return view('news', compact('posts', 'admin'));
    }

    public function post($id) {

        $post = Post::findOrFail($id);

        $admin = false;
        if(Auth::check()) {
            $admin = (Auth::user()) ? Auth::user()->hasAnyRole
            ('Admin') : false;
        }

        return view('post', compact('post', 'admin'));
    }

}