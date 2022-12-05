<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::factory(10)->create();
        $videos = Video::all();
        foreach($videos as $video){
            $randTags = $tags->shuffle()->take(rand(0,$tags->count()));
            foreach($randTags as $tag){
                $video->tags()->attach($tag);
            }
        }
    }
}
