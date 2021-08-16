<?php
require_once ("dbConnector.php");
require_once("admin.php");
$db = (new DatabaseConnector())->getConnection();

session_start();
$username = filter_var($_POST["uname"], FILTER_SANITIZE_STRING);
$password = filter_var($_POST["psw"], FILTER_SANITIZE_STRING);

// $user = new User($db);
// $isLoggedIn = $user->processLogin($username, $password);

$admin = new Admin($db);
// $query = "select * FROM User WHERE user_name = ? AND password = ?";
$query = $db->prepare("select * FROM admin WHERE FirstName = ?");
// $paramType = "s";
// $paramArray = array($username);
// $memberResult = $this->db->select($query, $paramType, $paramArray);
$memberResult = $query->execute(array($username));
if($password[0] == '0') {
    echo '<h1> Username or password incorrect!!</h1>';
    
} elseif (!empty($memberResult)) {
    header("Location: ../adminDashboard.php");
    exit();
}


?>