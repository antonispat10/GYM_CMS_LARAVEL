<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostsController extends Controller {
    public function __construct() {

        parent::__construct();
    }

    public function index() {

        $posts = Post::paginate(4);

        return view('admin.posts.index', compact('posts'));
    }

    public function create() {

        //Categories don't exist

        $categories = [];

        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request) {

        $input = $request->all();

        if($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            //Doesn't exist

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }

        Auth::user()->posts()->create($input);

        return redirect('/admin/posts');
    }

    public function edit($id) {

        $post = Post::findOrFail($id);

        $categories = Category::pluck('name', 'id')->all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(PostsCreateRequest $request, $id) {

        $input = $request->all();

        if($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            //Doesn't exist

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }

        Auth::user()->posts()->whereId($id)->first()->update($input);

        return redirect('/admin/posts');
    }

    public function destroy($id) {

        $post = Post::findOrFail($id);

        unlink(public_path() . $post->photo->file);

        $post->delete();

        return redirect('/admin/posts');
    }

    public function post($slug) {

        $post = Post::findBySlugOrFail($slug);

        $comments = $post->comments()->whereIsActive(1)->get();

        //Categories don't exist

        $categories = Category::all();

        return view('post', compact('post', 'comments', 'categories', 'cid'));
    }

    public function all_posts($slug) {

        //Categories don't exist

        $categories = Category::all();

        $cat = Category::findBySlugOrFail($slug);

        $posts = $cat->posts;

        return view('all_posts', compact('posts', 'categories', 'cat'));
    }
}
