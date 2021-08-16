<?php
ob_start();
session_start();

$db_host = "localhost";
$db_name = "test";
$db_user = "testaccount";
$db_pass = "";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
?>

<!DOCTYPE html>

<html>
<head>
    <title>Forgotten Passord</title>
    <h1> Enter your username and email </h1>

</head>
<body>

    <br>
    <form action="forPassword.php" method="post">
    <input type="text" name = "username" placeholder="User Name" required>
    <br>
    <input type="email" name = "email" placeholder="email" required>
    <br>
    <input type="submit" name="reset" value="send me my password" />
</form>
<br>

<?php

if (isset($_POST['reset'])){

$Username =$_POST['username'];
$Email=$_POST['email'];

$query = "SELECT UserId from User where Username ='$Username';";
$result = mysqli_query($conn, $query);


if ($result->num_rows == 0){ //case non existant user
    echo "Username does not exist<br>";
    echo '<a href="login.php">Click here to register</a>';
}
else {
    //username exists check if username  matches a valid email
    $userid = $result->fetch_row()[0];
    //echo $userid;
    $sql = "(Select Email from User where UserID='$userid');";
    $result1 = mysqli_query($conn, $sql);
    $subemail = $result1->fetch_row()[0];

        if ($subemail == $Email){
       // echo "an email has been sent with your password";
        //get password
        $sql="SELECT Password from User where UserID='$userid';";
        $result = mysqli_query($conn, $sql);
        $password = $result->fetch_row()[0];
       // echo $password;

        $subject = "You password to career portal";
        $txt="Here is your forgotten login info\nusername: ".$Username." password: ".$password;
        $headers="From: xic55311@encs.concordia.ca";
       // echo $headers;
       // echo $subject;
        echo $txt;
        mail($Email, $subject, $txt, $headers);
        echo '<br>';
        echo '<a href="login.php">Back to homepage</a>';
    
        }
        else {
            echo "email does not match username";
        }

    }



}





?>


</body>
</html>
