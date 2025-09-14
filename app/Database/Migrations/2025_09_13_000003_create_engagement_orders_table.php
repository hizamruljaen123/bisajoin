<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEngagementOrdersTable extends Migration
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
            'man_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'woman_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'engagement_date' => [
                'type'       => 'DATE',
                'null'       => false,
            ],
            'engagement_time' => [
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
        $this->forge->createTable('engagement_orders');
    }

    public function down()
    {
        $this->forge->dropTable('engagement_orders');
    }
}