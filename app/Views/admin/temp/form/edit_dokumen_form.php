<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-8">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <!-- Menampilkan error jika ada -->
                                <?php if (session()->getFlashdata('error')): ?>
                                    <div style="color: red;">
                                        <?= session()->getFlashdata('error') ?>
                                    </div>
                                <?php endif; ?>

                                <!-- Form untuk mengedit dokumen -->
                                <form action="<?= base_url('doeditdokumen/' . $dokumen['id_dokumen']) ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="nama_dokumen">Nama Dokumen</label>
                                        <input type="text" class="form-control form-control-user" id="nama_dokumen" name="nama_dokumen" value="<?= $dokumen['nama_dokumen'] ?>" placeholder="Nama Dokumen" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kategori_dokumen">Kategori Dokumen</label>
                                        <input type="text" class="form-control form-control-user" id="kategori_dokumen" name="kategori_dokumen" value="<?= $dokumen['kategori_dokumen'] ?>" placeholder="Kategori Dokumen" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="file_dokumen">Upload File Baru (Opsional)</label>
                                        <input type="file" class="form-control" id="file_dokumen" name="file_dokumen">
                                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti file.</small>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Simpan Perubahan
                                    </button>
                                    <hr>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>