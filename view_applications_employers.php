<?php
session_start(); ?>

<!DOCTYPE html>
<html>
<!-- <meta charset="utf-8">
<link rel="stylesheet" type="text/css"
href = "main.css" /> -->
<body>
<a href="EmployerDashboard.php">Back to Dashboard</a><br><br>
</body>
</html>

<?php


$db_host = "localhost";
$db_name = "test";
$db_user = "testaccount";
$db_pass = "niyun891029nina";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


// $user_id = $_SESSION['user_id'];


    $query = "SELECT Job_ID, Title FROM Job WHERE JobStatus = 1 ORDER BY Post_Date DESC";

    $result = mysqli_query($conn, $query);
    //var_dump($result);

    if (!$result) {
        echo "Could not receive query result" . '<br><br>';
        die ($connection->error);
    }

    $result_arr = $result->fetch_all();
    //var_dump($result_arr);
    ?>

    <form action="view_applications_employers.php" method="post">
        <span style="color:red;"><b> Select a Job from Open Jobs List to View Applications:</b><br><br></span><select name="job">
        <?php
        foreach ($result_arr as $row) {
             echo "<option value=\"$row[0]\">$row[0] $row[1]</option>";
         }
        ?>
    </select>
    <br><br>
    <input type="submit" value="Show Applications For This Job">
</form>

<?php

    

    $query_02 = "SELECT * FROM Job j, Application a, Candidate c WHERE
    j.Job_ID = a.Job_ID AND a.Candidate_ID = c.Candidate_ID";
    
    $result = mysqli_query($conn, $query_02);
    if (!$result) {
        echo "Could not receive query result" . '<br><br>';
        exit;
    }
    
    //util function, shows query result as a table
    show_table($result);

?>
</body>
</html>