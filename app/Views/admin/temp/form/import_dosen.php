<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Data Dosen</title>
    <!-- Bootstrap CSS -->
    <link href="<?= base_url('public/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('public/css/sb-admin-2.min.css') ?>" rel="stylesheet">
</head>
<body class="bg-gradient-light">
    <div class="container mt-5">
        <!-- Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Import Data Dosen</h6>
            </div>
            <div class="card-body">
                <!-- Flash Messages -->
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <!-- Form -->
                <form action="<?= base_url('import-dosen') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="file_import">Pilih File Excel</label>
                        <input type="file" name="file_import" id="file_import" class="form-control" required>
                        <small class="form-text text-muted">Hanya mendukung file .xls dan .xlsx</small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-upload"></i> Import Data
                    </button>
                </form>
            </div>
        </div>
        <!-- Copyright -->
        <div class="text-center">
            <small>Copyright &copy; 2024</small>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="<?= base_url('public/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('public/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('public/js/sb-admin-2.min.js') ?>"></script>
</body>
</html>
