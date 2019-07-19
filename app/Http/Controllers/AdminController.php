<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;
use App\Category;
use App\CommentReply;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        $postsCount=Post::count();
        $categoriesCount=Category::count();
        $commentsCount=Comment::count();
        $repliesCount=CommentReply::count();


        return view('admin/index', compact('postsCount','categoriesCount','commentsCount','repliesCount'));
    }
}
