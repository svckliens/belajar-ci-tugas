<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiskonSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('diskon')->truncate();

        $data = [
            [
                'tanggal' => '2025-06-25',
                'nominal' => '10000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
            [
                'tanggal' => '2025-06-26',
                'nominal' => '15000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
            [
                'tanggal' => '2025-06-27',
                'nominal' => '17000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
            [
                'tanggal' => '2025-06-28',
                'nominal' => '20000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
            ['tanggal' => '2025-06-29',
                'nominal' => '21000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
            [
                'tanggal' => '2025-06-30',
                'nominal' => '23000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
            [
                'tanggal' => '2025-07-01',
                'nominal' => '25000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
            [
                'tanggal' => '2025-07-02',
                'nominal' => '27000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
            [
                'tanggal' => '2025-06-03',
                'nominal' => '29000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
            ['tanggal' => '2025-06-04',
                'nominal' => '30000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
 
        ];

        // Gunakan ignore(true) untuk melewati error duplikat (jika ada)
        $this->db->table('diskon')->ignore(true)->insertBatch($data);
    }
}