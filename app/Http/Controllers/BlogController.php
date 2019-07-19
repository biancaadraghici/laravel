<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;
use App\CommentReply;
use App\Post;
use App\Category;
use App\Photo;



class BlogController extends Controller
{
    public function index(){

        $categories=Category::all();
        $posts=Post::paginate(2);

        return view('blog',compact('categories','posts'));



    }
}
