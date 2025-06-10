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
                'foto' => '1.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Obeng Plus',
                'harga'  => 42000,
                'jumlah' => 7,
                'foto' => '2.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Dongkrak Hidrolik',
                'harga'  => 120000,
                'jumlah' => 5,
                'foto' => '3.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Kunci Roda',
                'harga'  => 49000,
                'jumlah' => 3,
                'foto' => '4.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
             [
                'nama' => 'Tang',
                'harga'  => 30000,
                'jumlah' => 7,
                'foto' => '5.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ]
        ];

        foreach ($data as $item) {
            // insert semua data ke tabel
            $this->db->table('product')->insert($item);
        }
    }
}