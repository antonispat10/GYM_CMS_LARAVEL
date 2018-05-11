<?php

namespace App\Http\Controllers;

use App\Day;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PostsController extends Controller
{

    public function __construct()
    {
        $days = Day::all();

        View::share( 'days', $days);

        $us1 = User::all();
        View::share( 'us1', $us1);
    }

    public function index()
    {
        $posts = Post::paginate(4);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id')->all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        $input = $request->all();



//        $user = Auth::user();

        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;

        }


        Auth::user()->posts()->create($input);


//        $user->posts()->create($input);

        return redirect('/admin/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $categories = Category::pluck('name','id')->all();



        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsCreateRequest $request, $id)
    {

        $input = $request->all();

        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;

        }

        Auth::user()->posts()->whereId($id)->first()->update($input);

//        $user = Auth::user();
//
//        $user->posts()->update($input);

        return redirect('/admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::findOrFail($id);

        unlink(public_path() . $post->photo->file);

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


    public function all_posts($slug){

        $categories = Category::all();

        $cat = Category::findBySlugOrFail($slug);


        $posts = $cat->posts;





//        $comments = $post->comment;

        return view('all_posts', compact( 'posts','categories', 'cat'));

    }
}
