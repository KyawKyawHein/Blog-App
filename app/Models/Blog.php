<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public $guarded = ['id'];

    public function scopeFilter($query,$filter){
        $query->when(request('search')??false,function($query,$search){
            $query->where(function($query) use ($search){
                $query->where("title","LIKE","%".$search."%")
                ->orWhere("body","LIKE","%".$search."%");
            });
        });

        $query->when(request("category")??false,function($query,$slug){
            $query->whereHas("category",function($query) use($slug){
                $query->where("slug",$slug);
            });
        });

        $query->when(request('author')??false,function($query,$author){
            $query->whereHas("author",function($query) use ($author){
                $query->where("name",$author);
            });
        });
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function subscribers(){
        return $this->belongsToMany(User::class);
    }

    public function unSubscribe(){
        $this->subscribers()->detach(auth()->id());
    }

    public function subscribe(){
        $this->subscribers()->attach(auth()->id());
    }
}
