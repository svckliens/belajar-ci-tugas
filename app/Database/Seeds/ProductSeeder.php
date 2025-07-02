<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // membuat data
        $data = [
            [
                'nama' => 'Kunci Inggris',
                'harga'  => 61000,
                'jumlah' => 5,
                'foto' => 'kunci_inggris.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Kunci Roda',
                'harga'  => 49000,
                'jumlah' => 3,
                'foto' => 'kunci_roda.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Tang',
                'harga'  => 30000,
                'jumlah' => 7,
                'foto' => 'tang.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Obeng',
                'harga'  => 32000,
                'jumlah' => 5,
                'foto' => 'obeng.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
             [
                'nama' => 'Kunci Pas',
                'harga'  => 30000,
                'jumlah' => 8,
                'foto' => 'kunci_pas.jpg',
                'created_at' => date("Y-m-d H:i:s"),
             ],
             [
                'nama' => 'Dongkrak Hidrolik',
                'harga'  => 150000,
                'jumlah' => 2,
                'foto' => 'dongkrak_hidrolik.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ]
        ];

        foreach ($data as $item) {
            // insert semua data ke tabel
            $this->db->table('product')->insert($item);
        }
    }
}