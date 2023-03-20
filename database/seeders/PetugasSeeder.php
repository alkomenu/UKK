<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class PetugasSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Petugas::create([
            'id_petugas'=>'1112',
            'nama_petugas'=>'azz',
            'username'=> 'haha',
            'password'=>Hash::make('123'),
            'telp'=>'4423434',
            'level'=>'petugas',


        ]);
    }
}
