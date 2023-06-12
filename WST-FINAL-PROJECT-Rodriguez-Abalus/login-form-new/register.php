<!DOCTYPE html>
<html lang="en">

<head>
  <title>Footwear Frenzy - Login/Signup!</title>
  <meta charset="utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  
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

  $passwordError = "";

  //if (CRUD)
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)) {
    // echo json_encode($_POST);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    //if (CRUD)
    if (strcmp($password, $confirm_password) != 0) {
      $passwordError = "Passwords do not match";
    }

    //if (CRUD)
    if (empty($passwordError)) {
      // insert to db
      $stmt = $conn->prepare("INSERT INTO accounts (email, password) VALUES (?, ?)");

      // Bind the parameters
      $stmt->bind_param("ss", $email, $password);

      // Execute the statement
      //if-else (CRUD)
      if ($stmt->execute()) {
        // Insertion was successful
        // echo "Data inserted successfully!";
        header("Location: login.php");
        exit;
      } else {
        // Insertion failed
        $passwordError = "Error: " . $stmt->error;
      }

      // Close the statement and the database connection
      $stmt->close();
      $conn->close();
    }
  }


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
              <form action="register.php" method="POST" class="signin-form">
                <div class="form-group mb-3">
                  <label class="label" for="name">Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Email" required />
                </div>
                <div class="form-group mb-3">
                  <label class="label" for="password">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password" required />
                </div>
                <div class="form-group mb-3">
                  <label class="label" for="Confirm_password">Confirm Password</label>
                  <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required />
                  <span class="text-danger"><?= $passwordError ?></span>
                </div>
                <div class="form-group">
                  <a href="web-finals/"><button type="submit" class="form-control btn btn-primary rounded submit px-3">
                      Submit
                    </button></a>
                </div>
              </form>
              <p class="text-center">
                Already a member?
                <a href="login.php">Login</a>
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