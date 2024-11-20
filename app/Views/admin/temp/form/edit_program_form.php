<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-8">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <?php if (session()->getFlashdata('error')): ?>
                                    <div style="color: red;">
                                        <?= session()->getFlashdata('error') ?>
                                    </div>
                                <?php endif; ?>
                                <form action="<?= base_url('doeditprogram/') ?><?= $id_program; ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="id_program" name="id_program" value="<?= $id_program ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nama_program" name="nama_program" value="<?= $nama_program ?>" placeholder="Nama Kategori" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="dateInput">Pilih Tanggal</label>
                                        <input type="date" class="form-control" id="tahun_program" name="tahun_program" value="<?= $tahun_program ?>" placeholder="Masukkan tanggal">
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
            <div class="text-center">
                <div class="small">Copyright &copy; PT. IMA MONTAZ TEKNINDO 2024</div>
            </div>
        </div>
    </div>