<?php

use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = App\Post::all();
        $tags = App\Tag::all();

        foreach ($posts as $post) {
            $post->tags()->attach($tags->random(rand(1, 3))->pluck('id'));
        }
    }
}
