<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My Family Post',
            'slug' =>'my-first-post',
            'excerpt' => '<p>Excerpt of post family</p>',
            'body' => '<p>Lorem ipsum dolar sit amet. Curabitur hendrerit pellentesque ligula. In hac habitasse platea dictumst.
            In ornare, lectus ac aliquet tincidunt, magna nisi rutrum felis, sit amet consectetur mauris mi vel neque. Vivamus
            dictum lacus at justo ornare blandit. Pellentesque finibus quis ante non gravida. Nullam pulvinar risus vel
            ursus feugiat. Morbi quis sodales neque. Phasellus ac nunc convallis, elementum mi eget, aliquet felis.
            Cras elementum mauris et sem vehicula finibus.</p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' =>'my-second-post',
            'excerpt' => '<p>Excerpt of post work</p>',
            'body' => '<p>Lorem ipsum dolar sit amet. Curabitur hendrerit pellentesque ligula. In hac habitasse platea dictumst.
            In ornare, lectus ac aliquet tincidunt, magna nisi rutrum felis, sit amet consectetur mauris mi vel neque. Vivamus
            dictum lacus at justo ornare blandit. Pellentesque finibus quis ante non gravida. Nullam pulvinar risus vel
            ursus feugiat. Morbi quis sodales neque. Phasellus ac nunc convallis, elementum mi eget, aliquet felis.
            Cras elementum mauris et sem vehicula finibus.</p>'
        ]);


        //\App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
