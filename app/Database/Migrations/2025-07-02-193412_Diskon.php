<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Diskon extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'tanggal' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'nominal' => [
                'type' => 'DOUBLE',
                'null' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('parent_id', 'diskon', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('diskon');

        // Seed some furniture categories
        $seeder = \Config\Database::seeder();
        $seeder->call('DiskonSeeder');
    }

    public function down()
    {
        $this->forge->dropTable('diskon', true);
    }
}