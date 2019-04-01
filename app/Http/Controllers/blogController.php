<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class blogController extends Controller
{
    //

    public function show($entryID){
        if(Redis::EXISTS("blog.$entryID")){
            return Redis::get("blog.$entryID");
         }
     
         else{
             $content = "The blog content is here, what you are looking at now";
             Redis::SETEX("blog.$entryID", 60, $content);
         }
    }
}
