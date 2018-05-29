<?php

namespace App\Http\Controllers;

use App\Day;
use App\Post;
use App\User;
use App\Weight;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $days = Day::all();

        $post_count = Post::count();

        $user_count = User::count();

        $current_month  = Carbon::now()->format('F');
        $last_month  = Carbon::now()->subMonth()->format('F');

        $count_last_m = User::where('created_at', '>=', Carbon::now()->subMonth()->startOfMonth())->count();
        $count_last_m2 = User::where('created_at', '>=', Carbon::now()->subMonth()->endOfMonth())->count();
        $count_last_month = $count_last_m - $count_last_m2;
        $count_current_m = User::where('created_at', '>=',  Carbon::now()->startOfMonth())->count();
        $count_current_m2 = User::where('created_at', '>=',  Carbon::now()->endofMonth())->count();
        $count_current_month = $count_current_m - $count_current_m2;
        $total_count = User::count();



        $weights = Weight::where('user_id','4')->orderBy('id',
            'desc')->take(3)->get();


        return view('Admin.index',compact('days','weights','post_count','user_count','current_month','last_month','count_last_month','count_current_month','total_count'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
