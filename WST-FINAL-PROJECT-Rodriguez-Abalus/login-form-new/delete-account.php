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

    //if
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $account = null;

    //if-else (CRUD)
    if (empty($_SESSION['accounts'])) {
        header("Location: ../index.php");
        exit;
    } else {
        $account = $_SESSION['accounts'];
    }

    $passwordError = "";
    $successMsg = "";
    $failMsg = "";

    //if (CRUD)
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)) {
        // echo json_encode($_POST);
        $email = $account['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        //if-else (CRUD)
        if (strcmp($password, $confirm_password) != 0) {
            $passwordError = "Passwords do not match";
        } else {
            $qs = "SELECT * FROM `accounts` WHERE `email` = '$email' AND `password` = '$password'";
            $q = mysqli_query($conn, $qs);

            //if (CRUD)
            if (($q && mysqli_num_rows($q) > 0) == false) {
                $failMsg = "Incorrect old Password";
            }
        }


        //if (CRUD)
        if (empty($passwordError) && empty($failMsg)) {
            // delete to db
            $stmt = $conn->prepare("DELETE FROM `accounts` WHERE `email` = ?");
            $stmt->bind_param("s", $email);

            //if-else (CRUD)
            if ($stmt->execute()) {
                $successMsg = "Account deleted successfully.";
                session_unset();
                session_destroy();
                header("Location: ../index.php?ad=success");
                exit;
            } else {
                // Deletion failed
                $failMsg = "Error: " . $stmt->error;
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
                            <div class="w-100">
                                <p>We hate to see you go!</p>
                                <p>Are you sure you want to do this?</p>
                            </div>
                            <form action="delete-account.php" method="POST" class="signin-form">
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required />
                                    <span class="text-danger"><?= $failMsg ?></span>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="Confirm_password">Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required />
                                    <span class="text-danger"><?= $passwordError ?></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3 text-danger">
                                        Delete My Account
                                    </button>
                                </div>
                            </form>
                            <p class="text-center">
                                Go
                                <a href="../index.php">Back</a>
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