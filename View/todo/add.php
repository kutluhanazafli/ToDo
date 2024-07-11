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
                <h3 class="card-title">Add ToDo</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <?php
              echo get_session('error') ? '<div class="alert alert-' . $_SESSION['error']['type'] . '">' . $_SESSION['error']['message'] . '</div>' : null;
              ?>

              <form id="todo" action="" method="POST">

                <div class="card-body">

                  <div class="form-group">
                    <label for="category_id">Categories</label>
                    <select class="form-control" id="category_id" name="category_id">
                      <option value="0">Select Category</option>
                      <?php foreach ($data as $category): ?>
                        <option value="<?= $category['category_id']; ?>"><?= $category['category_title']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="todo_title" placeholder="Enter ToDo title">
                  </div>

                  <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="todo_description" placeholder="Enter ToDo title">
                  </div>

                  <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="todo_status">
                      <option value="a">Active</option>
                      <option value="c">Continue</option>
                      <option value="p">Passive</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="progress">Progress</label>
                    <input type="range" value="0" min="0" max="100" class="form-control" id="progress" name="todo_progress">
                  </div>

                  <div class="form-group">
                    <label for="color">Color</label>
                    <input type="color" class="form-control" id="color" name="todo_color" value="#007bff">
                  </div>

                  <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <div class="row">
                      <input type="date" class="form-control col-8" id="start_date" name="todo_start_date">
                      <input type="time" class="form-control col-4" id="start_date_time" name="todo_start_date_time">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="end_date">End Date</label>
                    <div class="row">
                      <input type="date" class="form-control col-8" id="end_date" name="todo_end_date">
                      <input type="time" class="form-control col-4" id="end_date_time" name="todo_end_date_time">
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" value="1" class="btn btn-primary">Submit</button>
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
  const todo = document.getElementById('todo');

  todo.addEventListener('submit', (e) => {

    let title = document.getElementById('title').value;
    let description = document.getElementById('description').value;
    let color = document.getElementById('color').value;
    let start_date = document.getElementById('start_date').value;
    let start_date_time = document.getElementById('start_date_time').value;
    let end_date = document.getElementById('end_date').value;
    let end_date_time = document.getElementById('end_date_time').value;
    let category_id = document.getElementById('category_id').value;
    let status = document.getElementById('status').value;
    let progress = document.getElementById('progress').value;

    let formData = new FormData();
    formData.append('title', title);
    formData.append('description', description);
    formData.append('color', color);
    formData.append('start_date', start_date);
    formData.append('start_date_time', start_date_time);
    formData.append('end_date', end_date);
    formData.append('end_date_time', end_date_time);
    formData.append('category_id', category_id);
    formData.append('status', status);
    formData.append('progress', progress);

    axios.post('<?= url('api/addtodo'); ?>', formData).then(res => {
      
      if (res.data.redirect) {
        window.location.href = res.data.redirect;
      } else {
          Swal.fire(
          res.data.title,
          res.data.msg,
          res.data.status
        )
      }

    }).catch(err => console.log(err));

    e.preventDefault();

  })
</script>
</body>

</html>