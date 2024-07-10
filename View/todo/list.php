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
                <h3 class="card-title">Todo List</h3>

                <div class="card-tools">
                  <div>
                    <a href="<?= url('categories/add'); ?>" class="btn btn-sm btn-dark">
                      Add Todo
                    </a>
                  </div>

                  <!-- <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  </ul> -->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <?php
                echo get('message') ? '<div class="alert alert-' . get('type') . '">' . get('message') . '</div>' : null;
                ?>
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Progress</th>
                      <th>Label</th>
                      <th style="width: 40px">Process</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count = 1;
                    foreach ($data as $key => $value) : ?>
                      <tr id="row_<?= $value['todo_id'] ?>">
                        <td>
                          <?= $count++ ?>.
                        </td>
                        <td>
                          <?= $value['todo_title'] ?>
                        </td>
                        <td>
                          <?= $value['category_title'] ?>
                        </td>
                        <td>
                          <?= $value['todo_start_date'] ?>
                        </td>
                        <td>
                          <?= $value['todo_end_date'] ?>
                        </td>
                        <td>
                          <?= $value['todo_progress'] ?>%
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: <?= $value['todo_progress'] ?>%"></div>
                          </div>
                        </td>
                        <td>
                          <span class="badge bg-<?= $value['todo_status'] == 'a' ? 'success' : 'danger'; ?>">
                            <?= $value['todo_status'] == 'a' ? 'Active' : 'Passive'; ?>
                          </span>
                        </td>
                        <td>
                          <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-sm btn-danger" onclick="removeTodo('<?= $value['todo_id'] ?>')">
                              Remove
                            </button>

                            <a href="<?= URL . 'todo/edit/' . $value['todo_id']; ?>" class="btn btn-sm btn-warning">
                              Update
                            </a>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->


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
  function removeTodo(id) {

    let formData = new FormData();
    formData.append('id', id);

    axios.post('<?= url('api/removetodo'); ?>', formData).then(res => {

      if (res.data.id) {
        let row = document.getElementById('row_' + res.data.id);
        row.remove();
      }

      Swal.fire(
        res.data.title,
        res.data.msg,
        res.data.status
      );

    }).catch(err => console.log(err));

  }
</script>
</body>

</html>