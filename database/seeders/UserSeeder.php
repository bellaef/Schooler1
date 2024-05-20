<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $userData = [
            //admin
            [
                'email' => 'bella@gmail.com',
                'nama' => 'Bella Ervina',
                'username' => 'bella2209',
                'password' => 'berru2209',
                'alamat' => 'Jl. Mastrip 3, Kabupaten Jember',
                'role' => 'admin',
                'telepon' => "08953569"
            ],

            //pelanggan
            [
                'email' => 'abelarif@gmail.com',
                'nama' => 'Muhammad Abeel',
                'username' => 'abelarif',
                'password' => '123',
                'alamat' => 'Dusun Krajan, Kec. Wongsorejo, Banyuwangi',
                'role' => 'pelanggan',
                'telepon' => "082337344156"
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
