<?php include "header.php"; ?>

    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">My Dashboard</li>
        </ol>

        <h1>Blank Page</h1>
        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            Categories
          </div>
          <div class="card-body">
          <?php include "control/category.control.php"; 
            $view = $object->select();

            while($row = $view->fetch_assoc()) {
          ?>
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td><?php echo "".$row['category_id']; ?></td>
                    <td><?php echo "".$row['category_name']; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <?php } ?>
          </div>
          <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->
<?php include "footer.php"; ?>