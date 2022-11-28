<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $videos = Video::all();
        $users = User::all();
        foreach ($videos as $video){
            $comments = Comment::factory(rand(0, 20))->make();
            foreach ($comments as $comment){
                $comment->video_id = $video->id;
                $comment->user_id = $users->random()->id;
                $comment->save();
            }
        }
    }
}
