<?php

use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('produks')->insert([
            
            'nama_produk' => 'ASUS X44IKB',
            'stok' => '100',
            'deskripsi' => 'GARANSI RESMI ASUS CENTER',
            'harga' => '100000',
            'id_kategori' => '1'
        ]);
    }
}
