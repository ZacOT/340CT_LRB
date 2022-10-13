<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'username'=>'admin',
            'password'=>'admin',
            'role'=>'0',
            'name'=>'Store Admin',
            'email'=>'admin@bookstore.com',
            'address'=>'INTI Road Book Store 11900'
        ]);

        DB::table('users')->insert([
            'username'=>'customer',
            'password'=>'customer',
            'role'=>'1',
            'name'=>'Store Customer',
            'email'=>'customer@bookstore.com',
            'address'=>'INTI College 11900'
        ]);
    }
}
