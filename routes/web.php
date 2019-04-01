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

Route::get('/blog/{entryID}', function($entryID){
    if(Redis::EXISTS("blog.$entryID")){
       return Redis::get("blog.$entryID");
    }

    else{
        $content = "The blog content is here, what you are looking at now";
        Redis::SETEX("blog.$entryID", 60, $content);
    }
});
