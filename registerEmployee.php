<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Register | Web Portal</title>
    <link rel="stylesheet" href="main.css" type="text/css" >

</head>
<body>
<form class="authForm" action="action_page.php" method="post">
    <h1>Register Employee</h1>
        <label for="first_name"><b>First Name</b></label>
        <input type="text" name="first_name">

        <label for="last_name"><b>Last Name</b></label>
        <input type="text" name="last_name">

        <label for="username"><b>Username</b></label>
        <input type="text"  name="username" required>

        <label for="email"><b>Email Address</b></label>
        <input type="text" name="email" required>

        <label for="phone"><b>Phone Number</b></label>
        <input type="text" name="phone" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" name="psw" required>

        <label for="con_psw"><b>Confirm Password</b></label>
        <input type="password" name="con_psw" required>


        <button class="loginBtn" type="submit">Register</button>

    </form>
</body>
</html>