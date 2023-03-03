<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Tani;
use App\Models\Obat;
use App\Models\Ternak;
use App\Models\Alert;
use App\Models\JenisTani;
use App\Models\JenisTernak;
use App\Models\Grow;
use App\Models\Metode;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role_name' => 'admin',
        ]);

        Role::create([
            'role_name' => 'user',
        ]);

        Obat::create([
            'nama_obat' => 'Vitamin Wonder',
            'nama' => 'Vitamin B1',
            'jenis' => 'Larut dalam Air',
            'obat' => 'Hewan',
            'dosis' => '2',
            'perawat' => 'Izdihar Fazrianti',
            'user' => '2',
        ]);
        
        $tani = [
          [
            'name' => 'Pohon Mangga Lali Jiwo',
            'tanaman' => 'Menghasilkan buah mangga',
            'jenis' => 'Buah - buahan',
            'kelamin' => 'Tanaman Berumah Tunggal (Ganda)',
            'ditanam' => '2021-01-31',
            'umur' => '770',
            'dipanen' => '2023-04-30',
            'hasil' => '10',
            'user' => '2',
          ],
          [
            'name' => 'Pohon Mangga Indramayu',
            'tanaman' => 'Menghasilkan buah mangga',
            'jenis' => 'Buah - buahan',
            'kelamin' => 'Tanaman Berumah Tunggal (Ganda)',
            'ditanam' => '2021-01-31',
            'umur' => '770',
            'dipanen' => '2023-04-30',
            'hasil' => '10',
            'user' => '2',
          ],
        ];

        foreach ($tani as $key => $tanis) {
          Tani::create($tanis);
        }

        $ternak = [
          [
            'name' => 'Sapi',
            'hewan' => 'Menghasilkan Susu',
            'jenis' => 'Mamalia',
            'kelamin' => 'Betina',
            'lahir' => '2021-01-31',
            'umur' => '770',
            'mati' => '2031-03-17',
            'hasil' => 'Susu',
            'user' => '2',
          ],
          [
            'name' => 'Sapi',
            'hewan' => 'Menghasilkan Susu',
            'jenis' => 'Mamalia',
            'kelamin' => 'Jantan',
            'lahir' => '2021-01-31',
            'umur' => '770',
            'mati' => '2030-04-9',
            'hasil' => 'Susu',
            'user' => '2',
          ],
        ];

        foreach ($ternak as $key => $ternaks) {
          Ternak::create($ternaks);
        }

        $jenistani = [
          [
          'name' => 'Pohon',
          ],
          [
          'name' => 'Bunga',
          ],
          [
          'name' => 'Sayuran',
          ],
          [
          'name' => 'Buah - buahan',
          ],
          [
          'name' => 'Pucuk',
          ],
          [
          'name' => 'Tumbuhan Obat',
          ],
          [
          'name' => 'Tumbuhan Liar',
          ],
          [
          'name' => 'Tumbuhan Air',
          ],
          [
          'name' => 'Tumbuhan Pangan',
          ],
        ];

      foreach ($jenistani as $key => $jenistanis) {
          JenisTani::create($jenistanis);
      }

      $jenisternak = [  
          [
          'name' => 'Mamalia',
          ],
          [
          'name' => 'Reptil',
          ],
          [
          'name' => 'Burung',
          ],
          [
          'name' => 'Ikan',
          ],
          [
          'name' => 'Serangga',
          ],
          [
          'name' => 'Moluska',
          ],
          [
          'name' => 'Amphibia',
          ],
          [
          'name' => 'Arthropoda',
          ],
      ];

      foreach ($jenisternak as $key => $jenisternaks) {
          JenisTernak::create($jenisternaks);
      }

      $users = [
            [
               'name' => 'Admin',
               'image' => 'profile.jpg',
               'jk' => 'Perempuan',
               'email' => 'izdihar0825@gmail.com',
               'password'=> bcrypt('25082004'),
               'no_telp' => '0895332520225',
               'alamat' => 'Perumahan Griya Alam Sentosa',
                'role_id' => '1',
            ],
            [
               'name' => 'User',
               'image' => 'profile2.jpg',
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

      $alerts = [
            [
               'name' => 'Sapi',
               'name_id' => '1',
               'jenis' => 'Hewan',
               'kelamin' => 'Betina',
               'status' => 'Siap',
               'umur_siap' => '732',
               'umur'=> '770',
               'keterangan' => 'Berkembang biak',
               'user' => '2',
            ],
            [
               'name' => 'Sapi',
               'name_id' => '2',
               'jenis' => 'Hewan',
               'kelamin' => 'Jantan',
               'status' => 'Siap',
               'umur_siap' => '732',
               'umur' => '770',
               'keterangan' => 'Berkembang biak',
               'user' => '2',
            ],
            [
               'name' => 'Pohon Mangga Lali Jiwo',
               'name_id' => '1',
               'jenis' => 'Tanaman',
               'kelamin' => 'Tanaman Berumah Tunggal',
               'status' => 'Siap',
               'umur_siap' => '732',
               'umur'=> '770',
               'keterangan' => 'Berkembang biak',
               'user' => '2',
            ],
            [
               'name' => 'Pohon Mangga Indramayu',
               'name_id' => '2',
               'jenis' => 'Tanaman',
               'kelamin' => 'Tanaman Berumah Tunggal',
               'status' => 'Siap',
               'umur_siap' => '732',
               'umur' => '770',
               'keterangan' => 'Berkembang biak',
               'user' => '2',
            ],
        ];
    
      foreach ($alerts as $key => $alert) {
          Alert::create($alert);
      }

      $grows = [
            [
              'id_betina' => '1',
              'id_jantan' => '2',
              'mulai' => '2023-02-11',
              'akhir' => '2023-11-11',
              'keterangan' => 'Berkembang biak',
              'hasil' => 'Anak Sapi',
              'status' => 'Proses',
              'sebab' => 'Lingkungan dan Makanan Bergizi serta Baik',
              'user' => '2',
            ],
        ];
    
      foreach ($grows as $key => $grow) {
          Grow::create($grow);
      }

      $metodes = [
            [
              'id_tanaman' => '1',
              'id_pasangan' => '2',
              'mulai' => '2023-02-11',
              'akhir' => '2023-05-11',
              'keterangan' => 'Cangkok Batang',
              'hasil' => 'Bibit Baru',
              'status' => 'Proses',
              'sebab' => 'Media Cangkok Lembab',
              'user' => '2',
            ],
        ];
    
      foreach ($metodes as $key => $metode) {
          Metode::create($metode);
      }

    }
}
