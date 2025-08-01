<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserInfo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         User::factory(10)
//             ->has(UserInfo::factory(),'user_info')
//             ->create();

//        User::factory(10)
//            ->has(Post::factory(3),'posts')
//            ->create();

        User::factory(10)
            ->has(Role::factory(2),'roles')
            ->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
//        $this->call([
//            UserTableSeeder::class,
//        ]);
    }
}
