<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminBlogController extends Controller
{
    public function index(){
        return view("admin.blogs.index",[
            "blogs" => Blog::latest()->paginate(5),
        ]);
    }    

    public function create(){
        return view("admin.blogs.create",[
            "categories" =>Category::all(),
        ]);
    }

    public function store(){
        $formData=request()->validate([
            "title" =>['required'],
            "category_id"=>['required'],
            "slug"=>['required',Rule::unique("blogs","slug")],
            "thumbnail" => ['required'],
            "intro"=>['required'],
            "body"=>['required'],
        ]);
        $formData['user_id']=auth()->id();
        $formData['thumbnail']=request("thumbnail")->store("thumbnails");
        Blog::create($formData);

        return redirect("/")->with("success","Blg created successfully.");
    }

    public function edit(Blog $blog){
        return view("admin.blogs.edit",[
            "blog"=>$blog,
            "categories"=>Category::all(),
        ]);
    }

    public function update(Blog $blog){
        $formData=request()->validate([
            "title" =>['required'],
            "category_id"=>['required'],
            "slug"=>['required',Rule::unique("blogs","slug")->ignore($blog->id)],
            "thumbnail" => ['required'],
            "intro"=>['required'],
            "body"=>['required'],
        ]);
        $formData['thumbnail']=request("thumbnail")?
                                request("thumbnail")->store("thumbnails"):$blog->thumbnail;
        $blog->update($formData);

        return redirect("/admin/dashboard")->with("success","Blog updated successfully.");
    }

    public function delete(Blog $blog){
        $blog->delete();

        return redirect()->back();
    }
}
