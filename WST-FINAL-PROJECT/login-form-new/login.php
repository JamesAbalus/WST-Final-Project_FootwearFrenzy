<!DOCTYPE html>
<html lang="en">

<head>
  <title>Footwear Frenzy - Login/Signup!</title>
  <meta charset="utf-8" />  

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  
  <!--=============== FAVICON ===============-->
  <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
  
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link rel="stylesheet" href="css/style.css" />
</head>

<body class="img js-fullheight" style="
      width: 100%;
      height: 100%;
      background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
        url(images/bg.png);
      background-size: cover;
      background-position: center;
    ">
  <?php
  include_once("../config/config.php");
  include_once("../config/db.php");

  //if
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

  //if
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)) {
    echo json_encode($_POST);

    $email = $_POST['email'];
    $password = $_POST['password'];

    $qs = "SELECT email FROM `accounts` WHERE `email` = '$email' AND `password` = '$password'";
    $q = mysqli_query($conn, $qs);

    $account = null;
    //if
    if ($q && mysqli_num_rows($q) > 0) {
      // Fetch the account information from the query result
      $account = mysqli_fetch_assoc($q);

      $_SESSION['accounts'] = $account;
      header("Location: ../index.php");
      exit;
    }
  }

  // echo json_encode($account);

  ?>
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
          <div class="wrap d-md-flex">
            <div class="img" style="background-image: url(images/bg.png)"></div>
            <div class="login-wrap p-4 p-md-5">
              <div class="d-flex">
                <div class="w-100">
                  <h3 class="mb-4">FOOTWEAR FRENZY!</h3>
                </div>
              </div>
              <div class="w-100">
                <p class="social-media d-flex justify-content-end">
                  <a href="https://www.facebook.com/" target="_blank" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                  <a href="https://twitter.com/" target="_blank" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                  <a href="https://www.instagram.com/" target="_blank" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-instagram"></span></a>
                </p>
              </div>
              <form action="login.php" method="POST" class="signin-form">
                <div class="form-group mb-3">
                  <label class="label" for="email">Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Email" required />
                </div>
                <div class="form-group mb-3">
                  <label class="label" for="password">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password" required />
                </div>
                <div class="form-group">
                  <button type="submit" class="form-control btn btn-primary rounded submit px-3">
                    Sign In
                  </button>
                </div>
                <div class="form-group d-md-flex">
                  <div class="w-50 text-left">
                    <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                      <input type="checkbox" checked />
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="w-50 text-md-right">
                    <a href="#">Forgot Password</a>
                  </div>
                </div>
              </form>
              <p class="text-center">
                Not a member?
                <a href="register.php">Sign Up</a> or go back to <a href="../index.php"> Home</a> page.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>