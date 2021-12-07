<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'usuario_id'         => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nome'           => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'senha'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('usuario_id', true);
        $this->forge->createTable('usuarios');

        $senha = password_hash('admin',PASSWORD_DEFAULT);

        $data = [
            'nome' => 'admin',
            'senha'    => $senha
        ];
        $this->db->table('usuarios')->insert($data);
    }

    public function down()
    {
        $this->forge->dropTable('usuarios');
    }
}
