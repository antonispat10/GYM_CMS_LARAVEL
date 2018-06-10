<?php

namespace App\Http\Controllers;

use App\Day;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Traits\Glob;


class AdminPostsController extends Controller
{
    use Glob;

    public function __construct()
    {
        $this->glob();
    }

    public function index()
    {
        $posts = Post::paginate(4);

        return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {

        return view('admin.posts.create');
    }


    public function store(Request $request)
    {
        $input = $request->all();




        if($photo = $request->file('photo')){

            $name = time() . $photo->getClientOriginalName();

           $d=  $photo->move('images\posts', $name);

            $input['photo'] = $d;

        }


        $user = Auth::user();


        Auth::user()->posts()->create($input);


//        $user->posts()->create($input);

        return redirect('/admin/posts');

    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);




        return view('admin.posts.edit',compact('post'));
    }


    public function update(Request $request, $id)
    {

        $input = $request->all();

        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);


            $input['photo'] = $file;

        }

        $user = User::find(4);


        $user->posts()->whereId($id)->first()->update($input);

//        $user = Auth::user();
//
//        $user->posts()->update($input);

        return redirect('/admin/posts');

    }


    public function destroy($id)
    {

        $post = Post::findOrFail($id);

        unlink(public_path() . $post->photo);

        $post->delete();

        return redirect('/admin/posts');

    }

    public function post($slug){

        $post = Post::findBySlugOrFail($slug);

        $comments = $post->comments()->whereIsActive(1)->get();


        $categories = Category::all();





//        $comments = $post->comment;

        return view('post', compact('post','comments', 'categories','cid'));

    }




}
