<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tabel Program</h1>
        <div class="d-flex align-items-center mb-3">
            <a href="<?= base_url('adduser') ?>" class="btn btn-primary mr-2" style=""><i class="fas fa-plus"></i>Tambah</a>
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
                            <th>EMAIL</th>
                            <th>USERNAME</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($foreach)): ?>
                            <?php foreach ($foreach as $row): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $row['email_user']; ?></td>
                                    <td><?= $row['username']; ?></td>
                                    <td>
                                        <a href="<?= base_url('hapususer') ?>/<?= $row['id_user'] ?>" class="btn btn-circle btn-danger btn-sm" data-toggle="" data-target="" onclick="return confirm('Apakah Anda yakin ingin menghapus User ini?');"><i class="fas fa-trash"></i></a>
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