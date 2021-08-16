<?php
//require_once './partials/database.php';
// require_once './partials/head-public.php';
// if (isset($_SESSION["is_employer"]) && $_SESSION["is_employer"]) {
//   header("Location: ./employees/jobs");
// } else if (isset($_SESSION["is_employee"]) && $_SESSION["is_employee"]) {
//   header("Location: ./employer/jobs");
// } else if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]) {
//   header("Location: ./admin");
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Portal</title>
    <link rel="stylesheet" href="main.css" type="text/css" >
</head>
<body>
  <div class = "indexContainer">
    <h1>Welcome to the Job Portal</h1>
    <h2>Please login if you already have an account, otherwise you may register</h2>
    <ul>
      <li>
      <a href="./login.php"><button class="loginBtn">Login</button></a>
      </li>
      <li>
      <a href="./registerEmployer.php"><button class="registerBtn">Register For Employers</button></a>
      </li>
      <li>
      <a href="./registerEmployee.php"><button class="registerBtn">Register For Job Seekers</button></a>
      </li> 
    </ul>
    <button class="adminLoginBtn"><a href="./adminLogin.php">Admin Login</a></button>
    <hr>
    <div class="copyright">Created by: group xic55311</div>
  </div>


</body>
</html>
