<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function index(){
        return view("blogs.index",[
            "blogs" =>Blog::latest()->filter(['search','category','author'])->paginate(3)->withQueryString(),
        ]);
    }

    public function show(Blog $blog){
        return view("blogs.show",[
            "blog"=>$blog,
            "randomBlogs" => Blog::inRandomOrder()->take(3)->get(),
        ]);
    }

    public function subscriptionHandler(Blog $blog){
        if(User::find(auth()->id())->isSubscribed($blog)){
            $blog->unSubscribe();
        }else{
            $blog->subscribe();
        }
        return redirect("/blogs/{$blog->slug}");
    }
}
