<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <?php if (session()->get('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Berhasil <?php session()->getFlashdata('message'); ?></strong>
        </div>
        <script>
            $(".alert").alert();
        </script>
    <?php endif; ?>



    <div class="card">
        <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                Tambah Data Paket</button>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id Paket</th>
                        <th>Isi Paket</th>
                        <th>Tanggal Datang</th>
                        <th>id Penghuni</th>
                        <th>id Karyawan</th>
                        <th>Tanggal Ambil</th>
                        <th>Ubah</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($Paket as $row) : ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $row['id_paket'] ?></td>
                            <td><?= $row['isi_paket'] ?></td>
                            <td><?= $row['tanggal_datang'] ?></td>
                            <td><?= $row['id_penghuni'] ?></td>
                            <td><?= $row['id Karyawan'] ?></td>
                            <td><?= $row['tanggal_ambil'] ?></td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#modalUbah" class="btn btn-sm btn-warning" id="btn-edit" data-id_paket="<?= $row['id_paket']; ?>" data-isi_paket="<?= $row['isi_paket']; ?>" data-tanggal_datang="<?= $row['tanggal_datang']; ?>" data-id_penghuni="<?= $row['id_penghuni']; ?>" data-id_karyawan="<?= $row['id_karyawan']; ?>" data-tanggal_ambil="<?= $row['tanggal_ambil']; ?>"><i class="fa fa-edit"></i></button>
                                <button type="button" data-toggle="modal" data-target="#modalHapus" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>
                            </td>

                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>

                </tbody>

            </table>
        </div>
    </div>





</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="modal fade" id="modalTambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('paket/tambah'); ?>" method="post">
                    <div class="form-group mb-0">
                        <label for="id_paket"></label>
                        <input type="text" name="id_paket" id="id_paket" class="form-control" placeholder="Masukan Id Paket">
                    </div>
                    <div class="form-group mb-0">
                        <label for="isi_paket"> </label>
                        <input type="text" name="isi_paket" id="isi_paket" class="form-control" placeholder="Masukan Isi Paket">
                    </div>
                    <div class="form-group mb-0">
                        <label for="tanggal_datang"></label>
                        <input type="text" name="tanggal_datang" id="tanggal_datang" class="form-control" placeholder="Masukan Tanggal Datang">
                    </div>
                    <div class="form-group mb-0">
                        <label for="id_penghuni"></label>
                        <input type="text" name="id_penghuni" id="id_penghuni" class="form-control" placeholder="Masukan Id Penghuni">
                    </div>
                    <div class="form-group mb-0">
                        <label for="id_karyawan"></label>
                        <input type="text" name="id_karyawan" id="id_karyawan" class="form-control" placeholder="Masukan Id Karyawan">
                    </div>
                    <div class="form-group mb-0">
                        <label for="tanggal_ambil"></label>
                        <input type="text" name="tanggal_ambil" id="tanggal_ambil" class="form-control" placeholder="Masukan Tanggal Ambil">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="tambah" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modalHapus">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="/Paket/hapus/<?= $row['id_paket']; ?>" class="btn btn-primary"> Yakin</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalUbah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Paket/ubah'); ?>" method="post">
                    <div class="form-group mb-0">
                        <label for="id_paket"></label>
                        <input type="hidden" name="id_paket" id="id_paket" class="form-control" placeholder="id_paket" value=<?= $row['id_paket'] ?>>
                    </div>
                    <div class="form-group mb-0">
                        <label for="isi_paket"></label>
                        <input type="text" name="isi_paket" id="isi_paket" class="form-control" placeholder="Masukan isi_paket" value=<?= $row['isi_paket'] ?>>
                    </div>
                    <div class="form-group mb-0">
                        <label for="tanggal_datang"> </label>
                        <input type="text" name="tanggal_datang" id="tanggal_datang" class="form-control" placeholder="Masukan tanggal_datang" value=<?= $row['tanggal_datang'] ?>>
                    </div>
                    <div class="form-group mb-0">
                        <label for="id_penghuni"></label>
                        <input type="text" name="id_penghuni" id="id_penghuni" class="form-control" placeholder="id_penghuni" value=<?= $row['id_penghuni'] ?>>
                    </div>
                    <div class="form-group mb-0">
                        <label for="id_karyawan"></label>
                        <input type="text" name="id_karyawan" id="id_karyawan" class="form-control" placeholder="id_karyawan" value=<?= $row['id_karyawan'] ?>>
                    </div>
                    <div class="form-group mb-0">
                        <label for="tanggal_ambil"></label>
                        <input type="text" name="tanggal_ambil" id="tanggal_ambil" class="form-control" placeholder="tanggal_ambil" value=<?= $row['tanggal_ambil'] ?>>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="ubah" class="btn btn-primary">Ubah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>