<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penghuni extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_penghuni'          => [
				'type'           => 'INT',
				'constraint'     => 50,

			],
			'unit'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
			],
			'no_ktp' => [
				'type' => 'int',
				'constraint' => '50',
			],
			'foto' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'nama_penghuni' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
		]);
		$this->forge->addKey('id_penghuni', true);
		$this->forge->createTable('Penghuni');
	}

	public function down()
	{
		$this->forge->dropTable('Penghuni');
	}
}
