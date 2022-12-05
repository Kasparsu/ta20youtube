<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $videos = Video::all();
        foreach($videos as $video){
           $likes = Like::factory(rand(0,$users->count()))->make();
           $randUsers = $users->shuffle()->take($likes->count());
           foreach($likes as $like){
               $like->video_id = $video->id;
               $like->user_id = $randUsers->pop()->id;
               $like->save();
           }
        }
    }
}
