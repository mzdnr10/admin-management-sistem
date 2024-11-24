<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-4 text-gray-800">Dokumen</h1>
        <a href="<?= base_url('adddokumen') ?>" class="btn btn-primary btn-sm">Tambah Dokumen</a>
    </div>
    <!-- Tabel Surat Masuk -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Dokumen</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <?php $i = 1; ?>
                        <tr>
                            <th>No</th>
                            <th>Nama Dokumen</th>
                            <th>Kategori Dokumen</th>
                            <th>File</th>
                            <th>Tanggal Upload</th>
                            <th>Tanggal Update</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data Surat Masuk -->
                        <?php if (!empty($foreach)): ?>
                            <?php foreach ($foreach as $row): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $row['nama_dokumen'] ?></td>
                                    <td><?= $row['kategori_dokumen'] ?></td>
                                    <td><?= $row['file'] ?></td>
                                    <td><?= $row['tanggal_upload'] ?></td>
                                    <td><?= $row['tanggal_update'] ?></td>
                                    <td>
                                        <a href="<?= base_url('hapusdokumen') ?>/<?= $row['id_dokumen'] ?>" class="btn btn-circle btn-danger btn-sm" data-toggle="" data-target="" onclick="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?');"><i class="fas fa-trash"></i></a>
                                        <a href="<?= base_url('editdokumen') ?>/<?= $row['id_dokumen'] ?>" class="btn btn-circle btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">
                                    <div class="alert alert-warning" role="alert">
                                        <i class="fas fa-exclamation-circle"></i> Data Tidak Ditemukan!
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- End of Page Content -->

<!-- End of Page Content -->