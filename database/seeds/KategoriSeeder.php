<?php

use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('kategoris')->insert([
            
            'nama_kategori' => 'BARANG',
            'deskripsi' => 'HANYA BARANG',
            'id_produk' => '3'
       
        ]);
    }
}
