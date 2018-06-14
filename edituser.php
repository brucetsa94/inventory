<?php include "header.php"; ?>

   <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">User Accounts</li>
        </ol>
        <?php require_once "control/user.control.php"; ?>
        <div class="card mb-3">
          <div class="card-header"> Add User </div>
          <div class="card-body">
            <div class="row">
            <?php

            if(isset($_GET['edit'])) {
                $edit = $_GET['edit'];
            $select = $object->selectEdit($edit);
            while($rows=$select->fetch_assoc()){
                $use = $rows['user_id']; 
                ?>
                                <div class="col-lg-6">
                                    <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                                        <input class="form-control" type="hidden" value="<?php echo $edit; ?>" name="useid" />    
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input class="form-control" value="<?php echo $rows['name']; ?>" type="text" name="efname" required="" placeholder="..e.g John Banda">
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input class="form-control" value="<?php echo $rows['dob']; ?>" type="date" name="edob" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input value="<?php echo $rows['email']; ?>" name="eemail" class="form-control" placeholder="..e.g jbanda@company.net">
                                        </div>
                                        
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input value="<?php echo $rows['phone']; ?>" class="form-control" type="text" name="ephone" required="" placeholder="..e.g +265999944655">
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input value="<?php echo $rows['username']; ?>" class="form-control" type="text" name="eusername" required="" placeholder="..e.g jbanda">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input value="<?php echo $rows['passw']; ?>" class="form-control" type="password" name="epass1" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input value="<?php echo $rows['passw']; ?>" class="form-control" type="password" name="epass2" required="">
                                        </div>
                                        
                                        <br/>
                                        <input type="submit" class="btn btn-primary"  name="edits" value="Submit"/>
                                        <a href="users.php" class="btn btn-primary"> Cancel </a>
                                    </form>
                        <?php }}?>
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