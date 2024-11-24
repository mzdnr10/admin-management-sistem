<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">My Profile</h1>
  <?php if (session()->getFlashdata('error')): ?>
    <div style="color: red;">
      <?= session()->getFlashdata('error') ?>
    </div>
  <?php endif; ?>

  <div class="row">
    <!-- Profile Information -->



    <!-- Profile Details -->
    <div class="col-lg-8">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
        </div>
        <div class="card-body">
          <form action="<?= base_url('doeditprofile/') ?><?= $id_user; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group row">
              <label for="inputFullName" class="col-sm-3 col-form-label">Username</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="username" name="username" value="<?= $username ?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail" class="col-sm-3 col-form-label">Email Address</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" id="email_user" name="email_user" value="<?= $email_user ?>" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </form>
        </div>
      </div>

      <!-- Change Password -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
        </div>
        <div class="card-body">
          <form action="<?= base_url('doubahpassword/') ?><?= $id_user; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group row">
              <label for="inputOldPassword" class="col-sm-3 col-form-label">Old Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter old password">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputNewPassword" class="col-sm-3 col-form-label">New Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new password">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputConfirmPassword" class="col-sm-3 col-form-label">Confirm New Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="conf_password" name="conf_password" placeholder="Confirm new password">
              </div>
            </div>
            <button type="submit" class="btn btn-warning">Change Password</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- End of Page Content -->