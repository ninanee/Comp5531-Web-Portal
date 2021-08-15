

<!-- tables -->
<?php

$sql = "SELECT * FROM User";

$result = mysqli_query($conn, $sql);
if (!$result) {
	echo mysqli_connect_error();
	exit;
}

	// var_dump($result);
// ?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin's Dashboard</title>
    <link rel="stylesheet" href="main.css" type="text/css" >


<body>
    <h1> Admin's Dashboard</h1>
    <h2> You can activate or deactivate a user below: </h2>
    
    <form action="AdminDashboard.php" method="post">
    Select the user: <select name="user_id">
		<?php
		
		while ($row = $result->fetch_array(MYSQLI_NUM)) {
			echo "<option value=\"$row[0]\">UserID: $row[0] | Email : $row[1] | Username: $row[5] </option>";
		}
    //     ?>
        </select>
	 <br><br>

	Select 1 is to activate the user; 0 to deactivate the user selected above: <select name="value">
		<?php
		
			echo "<option value=\"0\">0</option>";
			echo "<option value=\"1\">1</option>";
		?>
	</select>
	<br><br>
	<input type="submit" value="Submit">
    </form>


    <h2> You can check all activities in the system: </h2>
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
	if (!$result) {
		echo "Could not receive query result" . '<br><br>';
		die ($connection->error);
	}
	
	//util function, shows query result as a table
	show_table($result);
}
?>

    <ul>
      <li>
        <button class="logout"><a href="./login.php">Logout</a></button>
      </li>
    </ul>
</body>
</html>