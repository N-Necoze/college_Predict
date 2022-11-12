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
    
    // python controller
    public function python(Post $post)
    {
        return view('posts/pyindex');
    }
    
    public function executePython(Request $request){
        $path = app_path() . "resources/views/posts/app.py";
        $command = "python " . $path;
        exec($command, $output);
        dd($output);
        // return view('index', compact('output'));
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
