<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->


        
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">ADMIN PANEL</h1>
        <?php if (session()->getFlashdata('error')): ?>
        <div style="color: red;">
        <?= session()->getFlashdata('error') ?>
        </div>
        <?php endif; ?>
                                    </div>
                                    <form class="user" action="<?= base_url('../doLogin')?>" method="post">
                                        <div class="form-group">
                                            <input type="username" name="username" id="username" class="form-control form-control-user"
                                                id="exampleInputEmail"
                                                placeholder="Enter Username..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password" id="password" required >
                                        </div>
                                        <div class="form-group">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url('')?>vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url('')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url('')?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url('public/assets/')?>js/sb-admin-2.min.js"></script>

</body>

</html>