<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* Bordered form */
    form {
    border: 3px solid #f1f1f1;
    }

    /* Full-width inputs */
    input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    }

    /* Set a style for all buttons */
    button {
    background-color: #04AA6D;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    }

    /* Add a hover effect for buttons */
    button:hover {
    opacity: 0.8;
    }

    /* Extra style for the cancel button (red) */
    .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
    }

    /* Add padding to containers */
    .container {
    padding: 16px;
    }

    /* The "Forgot password" text */
    span.psw {
    float: right;
    padding-top: 16px;
    }

</style>
<body>
<form action="action_page.php" method="post">
    <div class="container">
        <h1>Register Employer</h1>
    </div>

    <div class="container">
        <label for="username"><b>Username</b></label>
        <input type="text"  name="username" required>

        <label for="email"><b>Email Address</b></label>
        <input type="text" name="email" required>


        <label for="phone"><b>Phone Number</b></label>
        <input type="text" name="phone" required>


        <label for="emp_name"><b>Employer Name</b></label>
        <input type="text" name="emp_name" required>


        <label for="desc"><b>Description</b></label>
        <input type="text" name="desc">


        <label for="psw"><b>Password</b></label>
        <input type="password" name="psw" required>


        <label for="con_psw"><b>Confirm Password</b></label>
        <input type="password" name="con_psw" required>


        <button type="submit">Register</button>
    </div>

    </form>
</body>
</html>