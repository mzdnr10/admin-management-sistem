<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">My Profile</h1>

  <div class="row">
    <!-- Profile Information -->
    <div class="col-lg-4">
      <!-- Profile Card -->
      <div class="card shadow mb-4">
        <div class="card-body text-center">
          <img class="img-profile rounded-circle mb-4" src="https://source.unsplash.com/150x150/?portrait" alt="User Profile Picture">
          <h5 class="font-weight-bold">John Doe</h5>
          <p class="text-gray-600 mb-2">johndoe@example.com</p>
          <a href="#" class="btn btn-primary btn-sm">Edit Profile</a>
        </div>
      </div>
    </div>

    <!-- Profile Details -->
    <div class="col-lg-8">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
        </div>
        <div class="card-body">
          <form>
            <div class="form-group row">
              <label for="inputFullName" class="col-sm-3 col-form-label">Full Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="inputFullName" value="John Doe">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail" class="col-sm-3 col-form-label">Email Address</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" id="inputEmail" value="johndoe@example.com">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPhone" class="col-sm-3 col-form-label">Phone Number</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="inputPhone" value="123-456-7890">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputLocation" class="col-sm-3 col-form-label">Location</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="inputLocation" value="New York, USA">
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
          <form>
            <div class="form-group row">
              <label for="inputOldPassword" class="col-sm-3 col-form-label">Old Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="inputOldPassword" placeholder="Enter old password">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputNewPassword" class="col-sm-3 col-form-label">New Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="inputNewPassword" placeholder="Enter new password">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputConfirmPassword" class="col-sm-3 col-form-label">Confirm New Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="inputConfirmPassword" placeholder="Confirm new password">
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
