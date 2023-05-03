<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRecords = [
            ['id' => 1, 'nama' => 'Daniel Manalu', 'alamat' => 'Jl.Dr TD Pardede', 'umur' => 18,'TempatLahir' => 'Tarutung', 'TanggalLahir' => '', 'JenisKelamin'=>'Laki-laki' ,'NoTelephone' => '085762649422'
            , 'email' => 'danielmanalu101@gmail.com', 'password'=>'$2a$12$u7sPhrhjG4XWwmWit6eVXevTvlDXJFK/ptea5XaMnr9cxDs2KKNKm', 'image' => ''],
        ];
        Admin::insert($adminRecords);
    }
}
