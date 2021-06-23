<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Penghuni extends Model
{
    protected $table = 'Penghuni';

    public function __construct()
    {

        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getAllData()
    {
        return $this->db->table('tb_penghuni')->get()->getResultArray();
    }

    public function tambah($data)
    {
        return $this->db->table('tb_penghuni')->insert($data);
    }
    public function hapus($id_penghuni)
    {
        return $this->db->table('tb_penghuni')->delete(['id_penghuni' => $id_penghuni]);
    }
    public function ubah($data, $id_penghuni)
    {
        return $this->builder->update($data, ['id_penghuni' => $id_penghuni]);
    }
}
