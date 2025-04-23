<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage(){ 
        
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(8)->get(); 
        return view('welcome', compact('articles'));
    }    
}
