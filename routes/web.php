<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Day;
use App\User;
use Illuminate\Support\Facades\Auth;



//['uses'=>'HomeController@index','middleware' => 'roles:admin']


Route::get('news','HomeController@news')
    ->name('news');

Route::get('post/{id}','HomeController@post')->name('post');

Route::get('/', ['uses'=>'HomeController@news']);


Auth::Routes();
Route::get('logout', 'Auth\LoginController@logout');



Route::group(['middleware'=>'roles:admin'], function(){


    Route::get('admin','AdminController@index')->name('admin');


    Route::get('admin/exercises/edit/{id}',
        ['uses'=>'AdminExercisesController@admin_exercises_edit_per_user'])
        ->name('admin_exercises_edit_per_user');




    Route::resource('admin/posts', 'AdminPostsController',['names'=>[

        'index'=>'admin.posts.index',
        'create'=>'admin.posts.create',
        'store'=>'admin.posts.store',
        'edit'=>'admin.posts.edit'


    ]]);


    Route::resource('admin/exercises', 'AdminExercisesController',['names'=>[


        'index'=>'admin.exercises.index',
        'create'=>'admin.exercises.create',
        'store'=>'admin.exercises.store',
        'edit'=>'admin.exercises.edit',
        'destroy'=>'admin.exercises.destroy'


    ]]);

    Route::resource('admin/exerciselist', 'AdminExerciseListController',['names'=>[


        'index'=>'admin.exerciselist.index',
        'create'=>'admin.exerciselist.create',
        'store'=>'admin.exerciselist.store',


    ]]);

Route::delete('/admin/delete/exerciselist', ['as'=>'exerciselist_delete_array', 'uses'=>'AdminExerciseListController@exerciselist_delete_array']);


Route::get('/admin/weight', ['as'=>'weight', 'uses'=>'AdminUsersController@weight']);






    Route::delete('admin/delete/exercises',
        ['uses'=>'AdminExercisesController@exercises_delete_array'])
        ->name('exercises_delete_array');






    Route::get('news','HomeController@news')
        ->name('news');

    Route::post('admin/users','AdminUsersController@store');

    Route::post('admin/user_roles','AdminUsersController@postAdminAssignRoles')->name('assign_roles');


    Route::resource('admin/users', 'AdminUsersController',['names'=>[

        'store'=>'admin.users.store',
        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'show'=>'admin.users.show',
        'edit'=>'admin.users.edit',

    ]]);

});

Route::group(['middleware'=>'roles:user'], function(){





    Route::patch('user/edit/{user}',
        ['uses'=>'UserPanelController@update_profile_per_user'])
        ->name('update_profile_per_user');
    Route::get('user/edit/{id}',
        ['uses'=>'UserPanelController@edit_profile_per_user'])
        ->name('edit_profile_per_user');


    Route::get('user/program/{id}',
        ['uses'=>'UserPanelController@program_per_user_per_day'])->name('program');

    Route::get('user',['uses'=>'UserPanelController@index'])->name('user.index');





});





