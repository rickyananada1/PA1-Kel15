<?php

namespace Database\Seeders;

use App\Models\Anggota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetaniTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $petani = [
            ['id' => 1, 'nama' => 'Ade', 'alamat' => 'Laguboti', 'umur' => 18,'TempatLahir' => 'Balige', 'TanggalLahir' => '', 'JenisKelamin'=>'Perempuan' ,'NoTelephone' => '085762649422'
            , 'email' => 'ade@gmail.com', 'password'=>'$2a$12$jnAILBby7NQ8knnH.Y4qm.H0PnW4jWunogJkSu89dekWDlLJNJoGK', 'image' => ''],
        ];
        Anggota::insert($petani);
    }
}
