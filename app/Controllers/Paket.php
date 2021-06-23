<?php

namespace App\Controllers;

use App\Controllers\M_Paket as ControllersM_Penghuni;
use CodeIgniter\Controller;
use App\Models\M_Paket;

class Paket extends Controller
{
    public function __construct()
    {
        $this->model = new M_Paket();
    }
    public function index()
    {


        $data = [
            'judul' => 'Data Paket',
            'Paket' => $this->model->getAllData()

        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');

        echo view('Paket/index');
        echo view('templates/v_footer');
    }
    public function tambah()
    {
        if (isset($_POST['tambah'])) {
            $val = $this->validate([
                'id_paket' => 'required',
                'isi_paket' => 'required',
                'tanggal_datang' => 'required',
                'id_penghuni' => 'required',
                'id_karyawan' => 'required',
                'tanggal_ambil' => 'required'
            ]);

            if (!$val) {

                session()->setFlashdata('err', \Config\Services::validation()->listErrors());

                $data = [
                    'judul' => 'Data Paket',
                    'Paket' => $this->model->getAllData()
                ];

                echo view('template/v_header', $data);
                echo view('template/v_sidebar');
                echo view('template/v_topbar');
                echo view('Paket/index', $data);
                echo view('template/v_footer');
            } else {
                $data = [
                    'id_paket' => $this->request->getPost('id_paket'),
                    'isi_paket' => $this->request->getPost('isi_paket'),
                    'tanggal_datang' => $this->request->getPost('tanggal_datang'),
                    'id_penghuni' => $this->request->getPost('id_penghuni'),
                    'id_karyawan' => $this->request->getPost('id_karyawan'),
                    'tanggal_ambil' => $this->request->getPost('tanggal_ambil')
                ];

                $success = $this->model->tambah($data);
                if ($success) {
                    session()->setFlashdata('message', 'Ditambahkan');
                    return redirect()->to(base_url('Paket'));
                }
            }
        } else {
            return redirect()->to('/Paket');
        }
    }

    public function hapus($id_Paket)
    {
        $success = $this->model->hapus($id_Paket);
        if ($success) {
            session()->setFlashdata('message', 'Dihapus');
            return redirect()->to(base_url('Paket'));
        }
    }

    public function ubah()
    {
        if (isset($_POST['ubah'])) {
            $val = $this->validate([
                'id_paket' => 'required',
                'isi_paket' => 'required',
                'tanggal_datang' => 'required',
                'id_penghuni' => 'required',
                'id_karyawan' => 'required',
                'tanggal_amnbil' => 'required'

            ]);

            if (!$val) {

                session()->setFlashdata('err', \Config\Services::validation()->listErrors());

                $data = [
                    'judul' => 'Data Paket',
                    'Paket' => $this->model->getAllData()
                ];

                echo view('template/v_header', $data);
                echo view('template/v_sidebar');
                echo view('template/v_topbar');
                echo view('Paket/index', $data);
                echo view('template/v_footer');
            } else {
                $id_Paket = $this->request->getPost('id_Paket');
                $data = [
                    'id_paket' => $this->request->getPost('id_paket'),
                    'isi_paket' => $this->request->getPost('isi_paket'),
                    'tanggal_datang' => $this->request->getPost('tanggal_datang'),
                    'id_penghuni' => $this->request->getPost('id_penghuni'),
                    'id_karyawan' => $this->request->getPost('id_karyawan'),
                    'tanggal_ambil' => $this->request->getPost('tanggal_ambil')
                ];

                $success = $this->model->ubah($data, $id_Paket);
                if ($success) {
                    session()->setFlashdata('message', 'Diubahkan');
                    return redirect()->to(base_url('Paket'));
                }
            }
        } else {
            return redirect()->to('/Paket');
        }
    }
}
