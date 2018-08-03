<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Post;
use App\Models\User;
use App\Models\Weight;
use Carbon\Carbon;

class AdminController extends Controller {

    public function index() {

        $days = Day::all();

        $post_count = Post::count();

        $user_count = User::count();

        $current_month = Carbon::now()->format('F');
        $last_month = Carbon::now()->subMonth()->format('F');

        $count_last_m = User::where('created_at', '>=', Carbon::now()->subMonth()->startOfMonth())->count();
        $count_last_m2 = User::where('created_at', '>=', Carbon::now()->subMonth()->endOfMonth())->count();
        $count_last_month = $count_last_m - $count_last_m2;
        $count_current_m = User::where('created_at', '>=', Carbon::now()->startOfMonth())->count();
        $count_current_m2 = User::where('created_at', '>=', Carbon::now()->endofMonth())->count();
        $count_current_month = $count_current_m - $count_current_m2;
        $total_count = User::count();

        $weights = Weight::where('user_id', '4')->orderBy('id',
            'desc')->take(3)->get();

        return view('admin.index', compact('days', 'weights', 'post_count', 'user_count', 'current_month', 'last_month', 'count_last_month', 'count_current_month', 'total_count'));
    }

}
