<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'Admin',
               'gambar' => 'profile.jpg',
               'jk' => 'Perempuan',
               'email' => 'izdihar0825@gmail.com',
               'password'=> bcrypt('25082004'),
               'no_telp' => '0895332520225',
               'alamat' => 'Perumahan Griya Alam Sentosa',
                'role_id' => '1',
            ],
            [
               'name'=>'User',
               'gambar' => 'profile2.jpg',
               'jk' => 'Laki - laki',
               'email'=>'user@gmail.com',
               'password'=> bcrypt('244564'),
               'no_telp' => '087868191540',
               'alamat' => 'SMK Negeri 2 Kota Bekasi',
               'role_id' => '2',
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
