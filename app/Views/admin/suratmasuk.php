<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-4 text-gray-800">Surat Masuk</h1>
        <a href="<?= base_url('/addkategori') ?>" class="btn btn-primary btn-sm">Tambah Surat Masuk</a>
    </div>
    <!-- Tabel Surat Masuk -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Surat Masuk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Tanggal Surat</th>
                            <th>Pengirim</th>
                            <th>Perihal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data Surat Masuk -->
                        <tr>
                            <td>1</td>
                            <td>123/SM/IV/2024</td>
                            <td>2024-10-10</td>
                            <td>PT. ABC</td>
                            <td>Permohonan Kerjasama</td>
                            <td><span class="badge badge-success">Diterima</span></td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm">Detail</a>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>124/SM/IV/2024</td>
                            <td>2024-10-15</td>
                            <td>CV. XYZ</td>
                            <td>Permintaan Penawaran</td>
                            <td><span class="badge badge-warning">Proses</span></td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm">Detail</a>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        <!-- Tambahkan data lainnya di sini -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- End of Page Content -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-4 text-gray-800">Surat Keluar</h1>
        <a href="<?= base_url('/addkategori') ?>" class="btn btn-primary btn-sm">Tambah Surat Keluar</a>
    </div>
    <!-- Tabel Surat Keluar -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Surat Keluar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Tanggal Surat</th>
                            <th>Tujuan</th>
                            <th>Perihal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data Surat Keluar -->
                        <tr>
                            <td>1</td>
                            <td>125/SK/IV/2024</td>
                            <td>2024-10-12</td>
                            <td>PT. DEF</td>
                            <td>Konfirmasi Kerjasama</td>
                            <td><span class="badge badge-primary">Terkirim</span></td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm">Detail</a>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>126/SK/IV/2024</td>
                            <td>2024-10-14</td>
                            <td>CV. GHI</td>
                            <td>Penawaran Produk</td>
                            <td><span class="badge badge-success">Dikirim</span></td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm">Detail</a>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        <!-- Tambahkan data lainnya di sini -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- End of Page Content -->