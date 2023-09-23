<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $frontend=Category::factory()->create([
            'name'=> 'frontend',
            'slug'=>'frontend',
        ]);

        $backend=Category::factory()->create([
            'name'=>'backend',
            'slug'=>'backend',
        ]);

        User::factory()->create([
            'name'=>"Kyaw Kyaw Hein",
            "username"=>"kyawkyawhein",
            "email"=>"hetero226@gmail.com",
            "password"=>"kyawkyawhein"
        ]);

        User::factory()->create([
            "name"=>"aung g",
            "username"=>"aungg",
            "email"=>"aungg12@gmail.com",
            "password"=>"password",
        ]);
        
        Blog::factory(2)->create(['category_id'=>$frontend->id,'user_id'=>1]);
        Blog::factory(2)->create(['category_id'=>$backend->id]);
        Comment::factory(4)->create(['blog_id'=>4]);
    }
}
