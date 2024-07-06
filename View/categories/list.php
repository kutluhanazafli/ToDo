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
                <h3 class="card-title">Category List</h3>

                <div class="card-tools">
                  <div> 
                    <a href="<?= url('categories/add'); ?>" class="btn btn-sm btn-dark">
                      Add Category
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
                      <th>Created Date</th>
                      <th>Updated Date</th>
                      <th style="width: 40px">Process</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $count = 1; foreach($data as $key => $value): ?>
                    <tr>
                      <td><?= $count++ ?>.</td>
                      <td><?= $value['category_title'] ?></td>
                      <td>
                        <?= $value['category_created_date'] ?>
                      </td>
                      <td>
                        <?= $value['category_updated_date'] ?>
                      </td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <a href="<?= URL . 'categories/remove/' . $value['category_id']; ?>" class="btn btn-sm btn-danger">
                            Remove
                          </a>
                        
                          <a href="<?= URL . 'categories/edit/' . $value['category_id']; ?>" class="btn btn-sm btn-warning">
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
</body>

</html>