<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Createkomentar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'komentar_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'komentar_nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'komentar_email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'komentar_waktu' => [
                'type' => 'DATETIME',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'komentar_isi' => [
                'type' => 'TEXT',
            ],
            'tanaman_id' => [
                'type' => 'INT',
                'null' => true,
                'unsigned' => true
            ],
        ]);
        $this->forge->addPrimaryKey('komentar_id');
        $this->forge->addForeignKey('tanaman_id', 'tanaman', 'tanaman_id', 'cascade', 'cascade');
        $this->forge->createTable('komentar');
    }

    public function down()
    {
        $this->forge->dropTable('komentar');
    }
}
