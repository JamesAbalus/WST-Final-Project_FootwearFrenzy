<?php
include_once("config/config.php");
include_once("config/db.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!empty($_SESSION['accounts'])) {
    session_unset();
    session_destroy();
} else {
    header("Location: index.php");
    exit;
}

header("Location: login-form-new/login.php");
exit;