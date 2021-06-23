<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Paket extends Model
{
    protected $table = 'Paket';

    public function __construct()
    {

        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getAllData()
    {
        return $this->db->table('tb_paket')->get()->getResultArray();
    }

    public function tambah($data)
    {
        return $this->db->table('tb_paket')->insert($data);
    }
    public function hapus($id_paket)
    {
        return $this->db->table('tb_paket')->delete(['id_paket' => $id_paket]);
    }
    public function ubah($data, $id_paket)
    {
        return $this->builder->update($data, ['id_paket' => $id_paket]);
    }
}
