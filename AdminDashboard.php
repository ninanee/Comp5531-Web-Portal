
<?php
// $db_host = "localhost";
// $db_name = "test";
// $db_user = "testaccount";
// $db_pass = "**";

$db_host = "127.0.0.1:3306";
$db_name = "final_project";
$db_user = "root";
$db_pass = "123456";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
?>

<!-- tables -->
<?php

$sqlUser = "SELECT * FROM User";

$result1 = mysqli_query($conn, $sqlUser);
if (!$result1) {
	echo mysqli_connect_error();
	exit;
}

	var_dump($result);
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Web Portal</title>
    <link rel="stylesheet" href="main.css" type="text/css" >
<body>
    <div class="adminDashboardWrapper">
        <h1> Admin Dashboard</h1>

    <div class="subWrapper">
        <!-- for employer -->
<h2> Activate or deactivate a User below: </h2>

<form class="adminForm" action="AdminDashboard.php" method="post">
<label for="UserID"><b>Select User:</b></label>
<select name= "UserID">
    <?php
    
    while ($row = $result1->fetch_array(MYSQLI_NUM)) {
        echo "<option value=\"$row[0]\">User_ID: $row[0] | Email: $row[2] | UserName: $row[5] | Values: $row[6]  </option>";
    }
//     ?>
    </select>
 <br><br>

Select 1 to activate the user; 0 to deactivate the user selected above: <select name="value">
    <?php
    
        echo "<option Value=\"0\">0</option>";
        echo "<option Value=\"1\">1</option>";
    ?>
</select>
<br><br>
<input type="submit" value="Submit">
</form>

<?php
if (isset($_POST['UserId']) && isset($_POST['Value'])) {
    $UserId = $_POST['UserId'];
    $Value = $_POST['Value'];
    $query_02 = "UPDATE User SET Value = $Value WHERE UserId = $UserId";

    $resultstatus = mysqli_query($conn, $query_02);
    if (!$resultstatus) {
        echo "Could not receive query result" . '<br><br>';
        die ($connection->error);
    }
}

?>
    </div>

    <div class="subWrapper">
    <h2>Check all activities in the system:</h2>
<!-- tables -->
<?php
$sqlshowtable = "SHOW TABLES
FROM $db_name";

$result_tables = mysqli_query($conn, $sqlshowtable);
if (!$result_tables) {
echo "Could not receive query result" . '<br><br>';
die ($connection->error);
}
?>

<form action="AdminDashboard.php" method="post">
Select a table to view: <select name="table">
    <?php
    while ($row = $result_tables->fetch_array(MYSQLI_NUM)) {
        echo "<option value=\"$row[0]\">$row[0]</option>";
    }
    ?>
</select>
<br><br>
<input type="submit" value="Show Table">
</form>

<?php

function show_table ($result)
{
if ($result->num_rows > 0) {
    //table drawing starts here
    echo '<br><table>';
    //first, the headers
    echo '<tr>';
    while ($header = $result->fetch_field()){
        echo '<th>' . $header->name . '</th>';
    }
    echo '</tr>';
    //second, the contents
    while($row = $result->fetch_array(MYSQLI_NUM)) {
        echo '<tr>';
        foreach ($row as $value) {
            echo '<td>' . $value . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "0 results";
}
}

if (isset($_POST['table'])) {
$table = $_POST['table'];
echo "<br>Table: <b>$table</b>";
$query_02 = "SELECT * FROM " . $table;


$result_all = mysqli_query($conn, $query_02);
if (!$result_all) {
    echo "Could not receive query result" . '<br><br>';
    die ($connection->error);
}

//util function, shows query result as a table
show_table($result_all);
}
?>
    </div>



    <a href="./login.php"><button class="logout">Logout</button></a>
</div>
</body>
</html>