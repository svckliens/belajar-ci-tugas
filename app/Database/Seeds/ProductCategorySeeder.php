<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProdukCategorySeeder extends Seeder
{
    public function run()
    {
        $this->db->table('product_categories')->truncate();

        $data = [
            [
                'name' => 'Kunci',
                'slug' => 'kunci',
                'description' => 'All Kunci products',
                'parent_id' => null,
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Alat',
                'slug' => 'alat',
                'description' => 'Alat types',
                'parent_id' => 1, 
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Obeng',
                'slug' => 'obeng',
                'description' => 'All obeng types',
                'parent_id' => 2, 
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
 
        ];

        // Gunakan ignore(true) untuk melewati error duplikat (jika ada)
        $this->db->table('product_categories')->ignore(true)->insertBatch($data);
    }
}