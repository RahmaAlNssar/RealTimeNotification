<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('admins')->insert([
            'username' => Str::random(10),
            'password' => Hash::make('password'),
            'email' => 'admin@gmail.com',
            'is_super-admin'=>rand(0,1),
            'status'=>rand(0,1)
        ]);
    }
}
