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
    
    public function predict_rule(Post $post)
    {
        return view('posts/rule');
    }
    
    // python controller
    public function kuchikomi_csv_download(Request $request)
    {
        $pythonPath =  "/posts/python/predict.py";
        $command = "python3 " . $pythonPath;
        exec($command, $outputs);
        $filePath = '/posts/python/predict.csv';
        $fileName = 'predict.csv';
        $mimeType = Storage::mimeType($filePath);
        $headers = [['Content-Type' => $mimeType]];
        return view()
    }
    
}