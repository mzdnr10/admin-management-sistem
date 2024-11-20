<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tabel Program</h1>
        <div class="d-flex align-items-center mb-3">
            <a href="<?= base_url('addprogram') ?>" class="btn btn-primary mr-2" style=""><i class="fas fa-plus"></i>Tambah</a>
            <a href="<?= base_url('export-program') ?>" class="btn btn-success mr-2"><i class="fas fa-arrow-up"></i>Export</a>
            <a href="<?= base_url('import-program') ?>" class="btn btn-secondary mr-2"><i class="fas fa-arrow-down"></i>Import</a>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Program</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <?php $i = 1; ?>
                        <tr>
                            <th>NO</th>
                            <th>NAMA PROGRAM</th>
                            <th>TAHUN PROGRAM</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($foreach)): ?>
                            <?php foreach ($foreach as $row): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $row['nama_program']; ?></td>
                                    <td><?= $row['tahun_program']; ?></td>
                                    <td>
                                        <a href="<?= base_url('hapusprogram') ?>/<?= $row['id_program'] ?>" class="btn btn-circle btn-danger btn-sm" data-toggle="" data-target="" onclick="return confirm('Apakah Anda yakin ingin menghapus Program ini?');"><i class="fas fa-trash"></i></a>
                                        <a href="<?= base_url('editprogram') ?>/<?= $row['id_program'] ?>" class="btn btn-circle btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center">
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->