<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWeddingOrdersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'code' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
                'unique'     => true,
            ],
            'template_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'groom_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'bride_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'wedding_date' => [
                'type'       => 'DATE',
                'null'       => false,
            ],
            'wedding_time' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'location' => [
                'type'       => 'TEXT',
                'null'       => false,
            ],
            'image_url' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'contact' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'default'    => 'pending',
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'default' => date('Y-m-d H:i:s'),
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('template_id', 'templates', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('wedding_orders');
    }

    public function down()
    {
        $this->forge->dropTable('wedding_orders');
    }
}