<?php include "header.php"; ?>

   <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            Dashboard
          </li>
          <li class="breadcrumb-item active">User Accounts</li>
        </ol>
        <?php require_once "control/user.control.php"; ?>
        <div class="card mb-3">
          <div class="card-header"> Add User </div>
          <div class="card-body">
            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                                            <input class="form-control" type="hidden" name="status" value="1">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input class="form-control" type="text" name="fname" required="" placeholder="..e.g John Banda">
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input class="form-control" type="date" name="dob" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input name="email" class="form-control" placeholder="..e.g jbanda@company.net">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input class="form-control" type="text" name="phone" required="" placeholder="..e.g +265999944655">
                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" type="text" name="username" required="" placeholder="..e.g jbanda">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type="password" name="pass1" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input class="form-control" type="password" name="pass2" required="">
                                        </div>
                                        <div class="form-group">
                                        <?php require_once "control/role.control.php"; 
                                            $role = $obj->select();

                                            echo "<label>Role</label>
                                            <select class='form-control' name='role'>
                                            <option selected disabled> Choose user role </option>";
                                            while($row=$role->fetch_assoc()) {
                                        echo "
                                                <option value='".$row['role_id'] ."'>" . $row['role_type'] . "</option>"; }
                                            echo "</select>
                                            ";  ?>
                                        </div>
                                        <input type="submit" class="btn btn-primary"  name="add" value="Submit"/>
                                        <input type="reset" class="btn btn-primary" value="Cancel">
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>

          </div>
          </div>
                    </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->
<?php include "footer.php"; ?>