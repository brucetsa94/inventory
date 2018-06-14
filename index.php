<?php
  session_start();
  if(isset($_SESSION['user'])){
    header("location: stock.php");
  } else {
    //
  }
  ?>
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
          Login
        </div>



        <div class="card-body">
        <?php 

        $connect = new mysqli ("localhost", "root", "", "inv") or die (mysqli_connect_error());

          if(isset($_POST['username']) && ($_POST['password'])){
            $username = $_POST['username'];
            $passw = $_POST['password'];

            $query = mysqli_query($connect, "SELECT user_id, username, status FROM users WHERE username = '".$username."' AND passw = '".$passw."' ");

            if($query){
              $result = mysqli_num_rows($query);
              if($result == 1) {
                while($row=mysqli_fetch_assoc($query)) {
                  if($row['status'] == 0) {
                    echo "<div class='alert alert-danger'>Your account has been disabled. Contact the administrator.". mysqli_error($connect) . "</div>";
                  } else{
                  session_start();
                  $_SESSION['user'] = $row['user_id'];
                  //setcookie('username', $username);
                  header("location: stock.php");
                  }
                }
              } else {
              echo "<div class='alert alert-danger'>Wrong Username or password.". mysqli_error($connect) . "</div>";
            } 
          }
        }



        ?>

       
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Username" name="username" required="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required="">
            </div>
            <input type="submit" name="login" class="btn btn-primary btn-block" value="Login"/>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="register.php">Register an Account</a>
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
