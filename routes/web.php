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
// 静态
Route::get('/home', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

// 注册
Route::get('signup', 'UsersController@create')->name('signup');

Route::resource('users', 'UsersController');
//等同于下面这些路由
/**
// 显示所有用户列表的页面
Route::get('/users', 'UsersController@index')->name('users.index');
// 个人页面
Route::get('/users/{user}', 'UsersController@show')->name('users.show');
// 创建用户的页面
Route::get('/users/create', 'UsersController@create')->name('users.create');
// 创建用户
Route::post('/users', 'UsersController@store')->name('users.store');
// 编辑用户个人资料页面
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
// 更新用户
Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
// 删除用户
Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
 */
// 登录
Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
// 退出
Route::delete('logout', 'SessionsController@destroy')->name('logout');

// 激活
Route::get('/signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');
























