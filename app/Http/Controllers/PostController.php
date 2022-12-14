<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function predict_home(Post $post)
    {
        return view('posts/predict');
    }
    
    public function executePython(Request $request){
        //$path = resource_path() . "/views/posts/app.py";
        $path = resource_path() . "/views/posts/predict_app.py";
        $command = "python " . $path;
        //exec(export LANG=ja_JP.UTF-8; $command, $output);
        exec($command, $output, $return_ver);
        dd($return_ver);
    }
    
    
    // rull
    public function predict_rule(Post $post)
    {
        return view('posts/rule');
    }
    
    // all predict
    public function predict_csv(Post $post)
    {
        return view('posts/etcpredict');
    }
    
}
