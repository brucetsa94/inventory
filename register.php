<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Fairview Tech</title>

    <!-- Bootstrap core CSS -->
    <link href="css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="css/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">

    <?php include "control/user.control.php";
        
     ?>

      <div class="card card-register mx-auto mt-5">
        <div class="card-header">
          Register an Account
        </div>
        <div class="card-body">
          <form action="" method="post"> 
            <div class="form-group">
                  <label for="exampleInputName">Full name</label>
                  <input type="text" name="fname" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Enter full name" required="">
                </div>
                <div class="form-group">
                  <div class="form-row">
                  <div class="col-md-6">
                    <label for="exampleInputName">Phone Number</label>
                  <input type="text" name="phone" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="...e.g 0888909090" required="">
                  </div>
                  <div class="col-md-6">
                  <label for="exampleInputName">Date of Birth</label>
                  <input type="date" name="dob" class="form-control" id="exampleInputName" aria-describedby="nameHelp" required="">
                  </div>

                </div>
              </div>
              <div class="form-group">
                  <div class="form-row">
                  <div class="col-md-6">
                    <label for="exampleInputName">Email</label>
                  <input type="email" name="email" class="form-control" id="exampleInputName" aria-describedby="nameHelp">
                  </div>
                  <div class="col-md-6">
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

                </div>
              </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Choose a unique username" name="username" required="">
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="pass1" placeholder="Password" required="">
                </div>
                <div class="col-md-6">
                  <label for="exampleConfirmPassword">Confirm password</label>
                  <input type="password" class="form-control" id="exampleConfirmPassword" name="pass2" placeholder="Confirm password" required="">
                </div>
              </div>
            </div>
            <input type="submit" name="add" class="btn btn-primary btn-block" value="Register"/>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="index.php">Login Page</a>
            <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="css/vendor/jquery/jquery.min.js"></script>
    <script src="css/vendor/popper/popper.min.js"></script>
    <script src="css/vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
