<?php view('static/header'); ?>

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= URL . 'logout'; ?>" class="nav-link">Logout</a>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php view('static/sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper p-5">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Your Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <?php
              echo get_session('error') ? '<div class="alert alert-' . $_SESSION['error']['type'] . '">' . $_SESSION['error']['message'] . '</div>' : null;
              ?>

              <form id="profile" action="" method="POST">

                <div class="card-body">

                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="<?= get_session('user_name') ?>" id="name" name="user_name" placeholder="Enter Name">
                  </div>

                  <div class="form-group">
                    <label for="surname">Surname</label>
                    <input type="text" class="form-control" value="<?= get_session('user_surname') ?>" id="surname" name="user_surname" placeholder="Enter Surname">
                  </div>

                  <div class="form-group">
                    <label for="email">E-Maile</label>
                    <input type="text" class="form-control" value="<?= get_session('user_email') ?>" id="email" name="user_email" placeholder="Enter Surname">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" value="1" class="btn btn-primary">Update</button>
                </div>

              </form>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <?php
              echo get_session('error') ? '<div class="alert alert-' . $_SESSION['error']['type'] . '">' . $_SESSION['error']['message'] . '</div>' : null;
              ?>

              <form id="password_change" action="" method="POST">

                <div class="card-body">

                  <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <input type="password" class="form-control" id="old_password" name="user_old_password">
                  </div>

                  <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control" id="password" name="user_password">
                  </div>

                  <div class="form-group">
                    <label for="password_again">New Password Again</label>
                    <input type="password" class="form-control" id="password_again" name="user_password_again">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" value="1" class="btn btn-primary">Update</button>
                </div>

              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?php view('static/footer'); ?>

</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= assets('plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= assets('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= assets('js/adminlte.min.js'); ?>"></script>
<!-- Sweetalert -->
<script src="<?= assets('plugins/sweetalert2/sweetalert2.all.min.js'); ?>"></script>
<!-- Axios -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.2/axios.min.js" integrity="sha512-JSCFHhKDilTRRXe9ak/FJ28dcpOJxzQaCd3Xg8MyF6XFjODhy/YMCM8HW0TFDckNHWUewW+kfvhin43hKtJxAw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    const profile = document.getElementById('profile');
    const password_change = document.getElementById('password_change');

    profile.addEventListener('submit', (e) => {

        let name = document.getElementById('name').value;
        let surname = document.getElementById('surname').value;
        let email = document.getElementById('email').value;

        let formData = new FormData();

        formData.append('name',name);
        formData.append('surname',surname);
        formData.append('email',email);

        axios.post('<?= url('api/profile') ?>', formData).then(res => {

            Swal.fire(
                res.data.title,
                res.data.msg,
                res.data.status,
            );

            console.log(res)
        }).catch(err => console.log(err))

        e.preventDefault();
    })

    password_change.addEventListener('submit', (e) => {

        let old_password = document.getElementById('old_password').value;
        let password = document.getElementById('password').value;
        let password_again = document.getElementById('password_again').value;

        let formData = new FormData();

        formData.append('old_password',old_password);
        formData.append('password',password);
        formData.append('password_again',password_again);

        axios.post('<?= url('api/passwordchange') ?>', formData).then(res => {

            Swal.fire(
                res.data.title,
                res.data.msg,
                res.data.status,
            );

            console.log(res)
        }).catch(err => console.log(err))

        e.preventDefault();
    })

</script>
</body>

</html>