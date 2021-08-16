<?php
    require_once ('employer.php');
    require_once ('user.php');
    require_once ("dbConnector.php");

    $db = (new DatabaseConnector())->getConnection();

    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $user = new User($db);
        $employer = new Employer($db);
        $username = $_REQUEST['username'];
        $email = $_REQUEST['email'];
        $phoneNumber = $_REQUEST['phone'];
        $address = $_REQUEST['address'];
        $password = $_REQUEST['psw'];
        $membership = $_REQUEST['membership'];
        $userArray = array(
            'Email' => $email,
            'Address' => $address,
            'Phone_number'  => $phoneNumber,
            'Password' => $password,
            'Username' => $username
        ); 
        $user->insert($userArray);

        $employerArray = array(
            'Name' => $username,
            'Emoloyer_Balance'  => 100,
            'UserId' => 20,
            'GenreEm' => $membership
        );
        $employer->insert($employerArray);

        header("Location: ../index.php");
        exit();
        // $result   = mysqli_query($con, $query);
        // if ($result) {
        //     echo "<div class='form'>
        //           <h3>You are registered successfully.</h3><br/>
        //           <p class='link'>Click here to <a href='login.php'>Login</a></p>
        //           </div>";
        // } else {
        //     echo "<div class='form'>
        //           <h3>Required fields are missing.</h3><br/>
        //           <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
        //           </div>";
        // }
    }
?>