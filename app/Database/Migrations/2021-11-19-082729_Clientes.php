<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Clientes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'cliente_id'         => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nome'           => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'cidade'         => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'UF'             => [
                'type'       => 'VARCHAR',
                'constraint' => '2',
            ],
            'email'          => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'telefone'       => [
                'type'       => 'VARCHAR',
                'constraint' => '11',
            ],
            'whatsapp'       => [
                'type'       => 'VARCHAR',
                'constraint' => '11',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('cliente_id', true);
        $this->forge->createTable('clientes');
    }

    public function down()
    {
        $this->forge->dropTable('clientes');
    }
}
