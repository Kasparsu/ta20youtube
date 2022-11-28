<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = env('DEFAULT_USER_NAME', 'User McUserFace');
        $user->email = env('DEFAULT_USER_EMAIL', 'user@mail.cool');
        $user->password = env('DEFAULT_USER_PASSWORD', bcrypt('password'));
        $user->save();
    }
}
