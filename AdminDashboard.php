


<!-- tables -->
<?php

$sql = "SELECT * FROM User";

$result = $connection->query($sql);
if (!$result) {
	echo "Could not receive query result" . '<br><br>';
	die ($connection->error);
}

	//show_table($result);
	//var_dump($result);
?>

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
    <h2> You can activate or deactivate a user: </h2>
    <h2> You can check all activities in the system: </h2>
  <div>
    <ul>
        <li>
            
        </li>
    </ul>


  </div>

    <ul>
      <li>
        <button class="logout"><a href="./login.php">Logout</a></button>
      </li>
    </ul>
</body>
</html>