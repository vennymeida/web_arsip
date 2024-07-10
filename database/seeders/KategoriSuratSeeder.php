<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KategoriSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategories = [
            ['nama_kategori' => 'Undangan'],
            ['nama_kategori' => 'Pengumuman'],
            ['nama_kategori' => 'Nota Dinas'],
            ['nama_kategori' => 'Pemberitahuan']
        ];

        foreach ($kategories as $kategori) {
            DB::table('kategori_surats')->insert([
                'nama_kategori' => $kategori['nama_kategori'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

