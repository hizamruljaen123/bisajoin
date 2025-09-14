<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTelegramLogsTable extends Migration
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
            'order_code' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'message' => [
                'type'       => 'TEXT',
                'null'       => false,
            ],
            'sent_at' => [
                'type'    => 'DATETIME',
                'default' => date('Y-m-d H:i:s'),
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('telegram_logs');
    }

    public function down()
    {
        $this->forge->dropTable('telegram_logs');
    }
}