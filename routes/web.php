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
Route::group(['prefix'=> 'admin', 'namespace'=>'Admin', 'middleware'=>['auth']], function(){
    Route::get('/', 'DashboardController@dashboard')->name('admin.index');
    Route::get('/question/unanswered', 'QuestionController@unanswered')->name('admin.question.unanswered');
    Route::resource('/category', 'CategoryController', ['as'=>'admin']);
    Route::resource('/question', 'QuestionController', ['as'=>'admin']);
    Route::resource('/user', 'UserController', ['as' => 'admin']);
    Route::get('/category/{category}/questions', 'CategoryController@questions')->name('admin.category.questions');
    Route::get('/question/{question}/hide', 'QuestionController@hide')->name('admin.question.hide');
    Route::get('/question/{question}/answer', 'QuestionController@answer')->name('admin.question.answer');
});


Route::get('/', function () {
    return view('home');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/createQuestion', 'HomeController@createQuestion')->name('home.createQuestion');
Route::post('/home/storeQuestion', 'HomeController@storeQuestion')->name('home.storeQuestion');
Route::get('/home/{category}', 'HomeController@list')->name('home.list');
Auth::routes();

