<?php

namespace App\Controllers;

use App\Controllers\M_Penghuni as ControllersM_Penghuni;
use CodeIgniter\Controller;
use App\Models\M_Penghuni;

class Penghuni extends Controller
{
    public function __construct()
    {
        $this->model = new M_Penghuni();
    }
    public function index()
    {


        $data = [
            'judul' => 'Data Penghuni',
            'penghuni' => $this->model->getAllData()

        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');

        echo view('Penghuni/index');
        echo view('templates/v_footer');
    }
    public function tambah()
    {
        if (isset($_POST['tambah'])) {
            $val = $this->validate([
                'nama_penghuni' => 'required',
                'unit' => 'required',
                'foto' => 'required',
                'no_ktp' => 'required'
            ]);

            if (!$val) {

                session()->setFlashdata('err', \Config\Services::validation()->listErrors());

                $data = [
                    'judul' => 'Data Penghuni',
                    'penghuni' => $this->model->getAllData()
                ];

                echo view('template/v_header', $data);
                echo view('template/v_sidebar');
                echo view('template/v_topbar');
                echo view('Penghuni/index', $data);
                echo view('template/v_footer');
            } else {
                $data = [
                    'nama_penghuni' => $this->request->getPost('nama_penghuni'),
                    'unit' => $this->request->getPost('unit'),
                    'foto' => $this->request->getPost('foto'),
                    'no_ktp' => $this->request->getPost('no_ktp')
                ];

                $success = $this->model->tambah($data);
                if ($success) {
                    session()->setFlashdata('message', 'Ditambahkan');
                    return redirect()->to(base_url('penghuni'));
                }
            }
        } else {
            return redirect()->to('/penghuni');
        }
    }

    public function hapus($id_penghuni)
    {
        $success = $this->model->hapus($id_penghuni);
        if ($success) {
            session()->setFlashdata('message', 'Dihapus');
            return redirect()->to(base_url('penghuni'));
        }
    }

    public function ubah()
    {
        if (isset($_POST['ubah'])) {
            $val = $this->validate([
                'nama_penghuni' => 'required',
                'unit' => 'required',
                'foto' => 'required',
                'no_ktp' => 'required'
            ]);

            if (!$val) {

                session()->setFlashdata('err', \Config\Services::validation()->listErrors());

                $data = [
                    'judul' => 'Data Penghuni',
                    'penghuni' => $this->model->getAllData()
                ];

                echo view('template/v_header', $data);
                echo view('template/v_sidebar');
                echo view('template/v_topbar');
                echo view('Penghuni/index', $data);
                echo view('template/v_footer');
            } else {
                $id_penghuni = $this->request->getPost('id_penghuni');
                $data = [
                    'nama_penghuni' => $this->request->getPost('nama_penghuni'),
                    'unit' => $this->request->getPost('unit'),
                    'foto' => $this->request->getPost('foto'),
                    'no_ktp' => $this->request->getPost('no_ktp')
                ];

                $success = $this->model->ubah($data, $id_penghuni);
                if ($success) {
                    session()->setFlashdata('message', 'Diubahkan');
                    return redirect()->to(base_url('penghuni'));
                }
            }
        } else {
            return redirect()->to('/penghuni');
        }
    }
}
