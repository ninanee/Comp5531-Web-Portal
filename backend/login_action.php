<?php
require_once ("user.php");
require_once ("dbConnector.php");

$db = (new DatabaseConnector())->getConnection();

if (! empty($_POST["login"])) {
    session_start();
    $username = filter_var($_POST["user_name"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    
    $member = new User($db);
    $isLoggedIn = $user->processLogin($username, $password);
    if (! $isLoggedIn) {
        $_SESSION["errorMessage"] = "Invalid Credentials";
    }
    if ($_SESSION["userGenre"] = "candidate") {
        header("Location: ../candidateDashboard.php");
        exit();
    }
    if ($_SESSION["userGenre"] = "employer") {
        header("Location: ../employerDashboard.php");
        exit();
    }
}
?>