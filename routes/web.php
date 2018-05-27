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

Route::get('/',['uses'=>'IndexController@index','as'=>'home']);
Route::get('/guests_book',['uses'=>'GuestsBookController@index','as'=>'guests']);
Route::post('/guests_book',['uses'=>'GuestsBookController@feed','as'=>'guests_c']);

//Посты
Route::get('/post/{id}', ['uses' => 'PostsController@show', 'as' => 'post']);
Route::post('/post', ['uses' => 'PostsController@comments', 'as' => 'comment_p']);

// Редактирование профиля
Route::get('/profile/{id}', ['middleware'=>['web','auth'], 'uses' => 'Profile\ProfileController@show', 'as' => 'profile']);
Route::post('/profile', ['middleware'=>['web','auth'], 'uses' => 'Profile\ProfileController@create', 'as' => 'profile_p']);
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
//Роутеры для админки
Route::group(['prefix'=>'admin','middleware'=>['web','auth']],function() {
Route::get('/',['uses'=>'Admin\AdminController@show','as'=>'admin_index']);

Route::get('/add/post',['uses'=>'Admin\AdminPostController@show','as'=>'admin_add_post']);
Route::post('/add/post',['uses'=>'Admin\AdminPostController@create','as'=>'admin_add_post_p']);


Route::get('/update/post',['uses'=>'Admin\AdminUpdateController@show','as'=>'admin_update']);

Route::get('/update/post/{id}', ['uses'=>'Admin\AdminUpdatePostController@show','as'=>'admin_add_post']);
Route::post('/update/post',['uses'=>'Admin\AdminUpdatePostController@create','as'=>'admin_update_post_p']);

    //Work with comments
Route::get('/edit/comments',['uses'=>'Admin\AdminCommentsController@show','as'=>'admin_comments']);

Route::get('/edit/comment/{id}', ['uses'=>'Admin\AdminEditCommentsController@show','as'=>'admin_edit_comment']);
Route::post('/edit/comment',['uses'=>'Admin\AdminEditCommentsController@create','as'=>'admin_edit_comment_p']);
//work with feed
    Route::get('/edit/feeds',['uses'=>'Admin\AdminFeedController@show','as'=>'admin_feeds']);
    Route::get('/edit/feed/{id}', ['uses'=>'Admin\AdminEditFeedsController@show','as'=>'admin_edit_feed']);
    Route::post('/edit/feed',['uses'=>'Admin\AdminEditFeedsController@create','as'=>'admin_edit_feed_p']);

Route::get('/user/{id}', ['uses'=>'Admin\AdminEditUser@show','as'=>'admin_edit_user_show']);
Route::post('/user',['uses'=>'Admin\AdminEditUser@create','as'=>'admin_edit_user']);
});