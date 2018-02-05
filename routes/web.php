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

Route::get('/', function () {
    return view('welcome');
});

Route::get('aa', function(){
    return redirect()->route('admin/user');
});

Route::get('hello/{name?}',function($name="Laravel"){
    return "Hello {$name}!";
})->where('name','[A-Za-z]+');

Route::get('hello/laravelacademy/{name}',['as'=>'academy',function($name){
    return 'Hello LaravelAcademy '.$name.'！';
}]);

Route::get('bb', function(){
    return redirect()->route('academy', ['name'=>'1111']);
});

Route::get('ageRefuce', ['as' => 'ageRefuce', function(){
    return "未成年人禁止入内！";
}]);

// 中间件
Route::group(
    [
        'middleware' => 'test:female'
    ], 
    function(){
        Route::get('cc', function(){
            return "success";
        });
});

// 路由前缀
Route::group(
    [
        'prefix' => 'admin'
    ],
    function(){
        Route::get('user', ['as' => 'admin/user', function(){
            return 'user success';
        }]);
    }
);

// 路由restful
Route::resource('post', 'PostController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
