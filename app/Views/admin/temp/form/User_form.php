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
                                <form action="<?= base_url('doadduser') ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control form-control-user" id="id_user" name="id_user" value="<?= $id_user ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="email_user" name="email_user" placeholder="Masukan Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="role_id" name="role_id" onchange="toggleNewProgram()" required>
                                            <option value="">Pilih Program</option>
                                            <option value="0">Super Admin</option>
                                            <option value="1">Admin</option>
                                        </select>
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