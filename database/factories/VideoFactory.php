<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $created = fake()->dateTimeBetween();
        $updated = fake()->dateTimeBetween($created);
        if(rand(0,3)){
            $updated = $created;
        }


        return [
            'path' => 'https://test-videos.co.uk/vids/bigbuckbunny/mp4/h264/360/Big_Buck_Bunny_360_10s_1MB.mp4',
            'title' => fake()->sentence,
            'description' => fake()->paragraphs(3,true),
            'thumbnail' => 'https://picsum.photos/seed/'. fake()->uuid .'/400/300',
            'duration' => fake()->time,
            'created_at' => $created,
            'updated_at' => $updated,
        ];
    }
}
