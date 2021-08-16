<?php
require_once ("user.php");
require_once ("dbConnector.php");

$db = (new DatabaseConnector())->getConnection();

session_start();
$username = filter_var($_POST["uname"], FILTER_SANITIZE_STRING);
$password = filter_var($_POST["psw"], FILTER_SANITIZE_STRING);

$user = new User($db);
$isLoggedIn = $user->processLogin($username, $password);
echo $isLoggedIn[0];
echo $isLoggedIn[1];
if (! $isLoggedIn[0]) {
    $_SESSION["errorMessage"] = "Invalid Credentials";
    echo '<h1>Username or password is incorrect, please check again.';
}
elseif ($isLoggedIn[1] == 1) {
    header("Location: ../employerDashboard.php");
    exit();
}
elseif ($isLoggedIn[1] == 0) {
    header("Location: ../candidateDashboard.php");
    exit();
}

?>