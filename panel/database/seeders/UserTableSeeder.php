<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0;$i<10;$i++){
            User::query()->create([
                'name'=>'user'.$i.'new',
                'email'=>'user'.$i.'@gmail.com'.'new',
                'password'=>Hash::make(234)
            ]);

        }
    }
}
