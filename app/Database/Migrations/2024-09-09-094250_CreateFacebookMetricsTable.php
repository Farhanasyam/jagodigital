<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFacebookMetricsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_metrics_facebook' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_trend' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'januari' => [
                'type'       => 'INT',
                'null'       => true,
            ],
            'februari' => [
                'type'       => 'INT',
                'null'       => true,
            ],
            'maret' => [
                'type'       => 'INT',
                'null'       => true,
            ],
            'april' => [
                'type'       => 'INT',
                'null'       => true,
            ],
            'mei' => [
                'type'       => 'INT',
                'null'       => true,
            ],
            'juni' => [
                'type'       => 'INT',
                'null'       => true,
            ],
            'juli' => [
                'type'       => 'INT',
                'null'       => true,
            ],
            'agustus' => [
                'type'       => 'INT',
                'null'       => true,
            ],
            'september' => [
                'type'       => 'INT',
                'null'       => true,
            ],
            'oktober' => [
                'type'       => 'INT',
                'null'       => true,
            ],
            'november' => [
                'type'       => 'INT',
                'null'       => true,
            ],
            'desember' => [
                'type'       => 'INT',
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'YEAR',
            ],
        ]);
        $this->forge->addKey('id_metrics_facebook', true);
        $this->forge->createTable('tb_metrics_facebook');
    }

    public function down()
    {
        $this->forge->dropTable('tb_metrics_facebook');
    }
}
