<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Paket extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_paket'          => [
				'type'           => 'INT',
				'constraint'     => 50,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'isi_paket'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
			],
			'tanggal_datang' => [
				'type' => 'date',

			],
			'id_penghuni'          => [
				'type'           => 'INT',
				'constraint'     => 50,

			],

			'tanggal_ambil' => [
				'type' => 'date',

			],
		]);
		$this->forge->addKey('id_paket', true);
		$this->forge->addForeignKey('id_penghuni', 'penghuni', 'id_penghuni');
		$this->forge->createTable('Paket');
	}

	public function down()
	{
		$this->forge->dropTable('Paket');
	}
}
