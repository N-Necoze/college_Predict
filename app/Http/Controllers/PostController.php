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
        return view('posts/index');
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