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
                                <form action="<?= base_url('doeditdosen/') ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="id_dosen" name="id_dosen" value="<?= $id_dosen ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="id_program" name="id_program" onchange="toggleNewProgram()" required>
                                            <option value="">Pilih Program</option>
                                            <?php foreach ($nama_program as $program): ?>
                                                <option value="<?= $program['id_program'] ?>"><?= $program['nama_program'] ?></option>
                                            <?php endforeach; ?>
                                            <option value="new">+ Tambah Program Baru</option>
                                        </select>
                                    </div>
                                    <div id="new_program_section" style="display: none;">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="nama_program" name="nama_program" placeholder="Nama Program baru">
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control" id="tahun_program" name="tahun_program">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nidn" name="nidn" placeholder="NIDN" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nama_dosen" name="nama_dosen" placeholder="Nama Dosen" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="perguruan" name="perguruan" placeholder="Perguruan Tinggi" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="no_hp" name="no_hp" placeholder="No Hp" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="jabatan" name="jabatan" placeholder="Jabatan" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Submit
                                    </button>
                                    <hr>
                                </form>
                                <!-- Skrip JavaScript -->
                                <script>
                                    function toggleNewProgram() {
                                        const programSelect = document.getElementById('id_program');
                                        const newProgramSection = document.getElementById('new_program_section');
                                        if (programSelect.value === 'new') {
                                            newProgramSection.style.display = 'block';
                                        } else {
                                            newProgramSection.style.display = 'none';
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                    </div>