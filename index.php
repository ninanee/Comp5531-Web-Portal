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
    <title>Document</title>
</head>
<style>
.button {
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  border-radius: 8px;
  width: 50%;
  cursor: pointer;
}


.container{
  padding: 40px;
  border: 3px solid #f1f1f1;
  text-align:center;
}
.button1 {background-color: #293250;} 
.button2 {background-color: #4CAF50;}
</style>
<body>
  <div class = "container">
    <h1>Welcome to the Job Portal</h1>

    <br>

    <p>Please login if you already have an account, otherwise you may register</p>
    <a class = "button button1" href="./login.php">Login</a>
    <a class = "button button2" href="./register.php">Register</a>
  </div>

</body>
</html>
