<?php

namespace Database\Seeders;

use App\Models\Petugas;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'nama'=>'admin',
            'username'=> 'admin',
            'level'=>'admin',
            'password'=>Hash::make('password')


        ]);


    }
}
