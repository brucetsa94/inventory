<?php include "header.php"; ?>

    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            Dashboard
          </li>
          <li class="breadcrumb-item active"><a href="users.php">User Accounts</a></li>
        </ol>
        <!-- Example Tables Card -->
        
          
            <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-group"></i>
            Users
          </div>
          <div class="card-body">
            <div class = "row">
            <div class="table-responsive">
            <?php include "control/user.control.php"; 
            $view = $object->selectRole();

            while($row = $view->fetch_assoc()) {
              $id = $row['user_id'];


              echo "
              <div class='col-sm-6'>
              <div class='card text-center' style='width: 30rem;'>
                      <div class = 'card-header'> <h4>
                        ". $row['name'] . ""; if($row['status'] == 1){
                      echo "<span style='padding-left: 10px;'><i class='btn btn-outline-success'>Active</i></span>";
                      } else {
                        echo "<span style='padding-left: 10px;'><i class='btn btn-outline-danger'>Deactivated</i></span>";
                      } echo "

                      </h4></div> <!-- card header close -->
                      <div class='card-body'> 
                      <h6> Date of Birth:</h6> " . $row['dob'] . " <br/>
                      <h6> Email: </h6>" . $row['email'] . "<br/> 
                      <h6> Phone Number:</h6> " . $row['phone'] . "<br/>
                      <h6> Username: </h6>". $row['username'] . "<br/> 
                      <h6> Permissions:</h6> ". $row['role_type'] . "<br/>";
                      
                echo "</div> <!-- card body close -->
                <div class='card-footer py-2 medium'>";
                  if($row['status'] == 1){
                        echo "
                    <a href='edituser.php?edit=$id' class='success mr-3 d-inline-block' data-toggle='tooltip' data-placement='top' title='Edit'><i class='fa fa-edit fa-1x'>  </i> Edit</a>
                    <a href='users.php?del=$id' class='mr-3 d-inline-block' data-toggle='tooltip' data-placement='top' title='Deactivate'><i class='fa fa-trash fa-1x'> </i> Deactivate</a>";
                  } else {
                    echo "<a href='users.php?act=$id' data-toggle='tooltip' data-placement='top' title='Activate' class='mr-3 d-inline-block'><i class='fa fa-check fa-1x'> </i>Activate</a> ";
                  }
              echo "
              </div> <!-- card column -->
                </div> <!-- card footer close --> 
                    </div>
                    <!--card close -->
                    </div> <!-- row -->
                    <br/>
              ";

             /* echo "
          
              <table class='table table-bordered' width='100%' id='dataTable' cellspacing='0'>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                </tfoot>
                
                <tbody>
                  <tr>
                    <td data-id1='".$id."'>" . $row['name'] . "</td>
                    <td data-id2='" .$id."'>" . $row['dob'] .  "</td>
                    <td data-id3='" .$id."'>" . $row['email'] . "</td>
                    <td data-id4='".$id."'>" . $row['phone'] . "</td>
                    <td data-id5='".$id."'>" . $row['username'] .  "</td>
                    <td data-id6='".$id."'>" . $row['role_type'] . "</td>
                    <td>"; if($row['status'] == 1){
                      echo "<i class='btn btn-outline-success'>Active</i>";
                      } else {
                        echo "<i class='btn btn-outline-danger'>Disabled</i>";
                      } echo "</td>";

                      if($row['status'] == 1){
                        echo "
                    <td><a href='edituser.php?edit=$id' class='btn btn-success' data-toggle='tooltip' data-placement='top' title='Edit'><i class='fa fa-edit fa-1x'> </i></a></td>
                    <td><a href='users.php?del=$id' class='btn btn-danger' data-toggle='tooltip' data-placement='top' title='Disable'><i class='fa fa-trash fa-1x'> </i></a> </td>";
                  } else {
                    echo "<td><a href='users.php?act=$id' data-toggle='tooltip' data-placement='top' title='Activate' class='btn btn-outline-primary'><i class='fa fa-check fa-1x'> </i></a> </td>";
                  }
                  echo "
                  </tr>
                </tbody>
              </table>"; */
              } ?>
            </div>
          </div>
          <div class="card-footer small text-muted">
            User accounts
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->
<?php include "footer.php"; ?>