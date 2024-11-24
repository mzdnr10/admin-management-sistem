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

                                <!-- Form untuk menambah dokumen -->
                                <form action="<?= base_url('doadddokumen') ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control form-control-user" id="id_dokumen" name="id_dokumen" value="<?= $id_dokumen ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nama_dokumen" name="nama_dokumen" placeholder="Nama Dokumen" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="kategori_dokumen" name="kategori_dokumen" placeholder="Kategori Dokumen" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="file_dokumen">Upload File</label>
                                        <input type="file" class="form-control" id="file_dokumen" name="file_dokumen" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Submit
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