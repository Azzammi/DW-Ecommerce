<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class SitemapController extends Controller
{
    public function index(){
        $post = Post::orderBy('updated_at','DESC')->first();
        $kategori = Category::orderBy('updated_at','DESC')->first();

        return response()->view('sitemap.index',[
            'post' => $post,

        ]);
    }

    public function posts(){
        $posts = Post::All();
        return response()->view('sitemap.posts',[
            'posts' => $posts,
        ])->header('Content-Type','text/xml');
    }

    public function categories(){
        $categories = Category::All();
        return response()->view('sitemap.categories',[
            'categories' => $categories,
        ])->header('Content-Type', 'text/xml');
    }
}
