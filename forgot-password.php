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

      <div class="card card-login mx-auto mt-5">
        <div class="card-header">
          Reset Password
        </div>
        <div class="card-body">
        <?php require_once "control/user.control.php"; ?>
          <div class="text-center mt-4 mb-5">
            <h4>Forgot your password?</h4>
            <p>Enter your current username and new password to reset.</p>
          </div>
          <form action="" method="post">
           <div class="form-group">
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username" required="" name="username">
            </div>
             <div class="form-group">
              <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter new Password" required="" name="pass1">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Confirm new Password" required="" name="pass2">
            </div>
            <input type="submit" class="btn btn-primary btn-block" name="passreset" value="Reset Password" />
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="register.php">Register an Account</a>
            <a class="d-block small" href="index.php">Login Page</a>
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
