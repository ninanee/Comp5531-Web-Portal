<?php
ob_start();
session_start();

$db_host = "localhost";
$db_name = "test";
$db_user = "testaccount";
$db_pass = "niyun891029nina";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

 //personal info section. 
 $query1 = "SELECT User.Email, User.Address, Candidate.FirstName, Candidate.LastName from
  User, Candidate where Candidate.UserId = User.UserId;";
 $result1 = mysqli_query($conn, $query1);
 $row1 = $result1->fetch_array(MYSQLI_NUM);

 $query2 = "SELECT User.Username, User.Password, Candidate.GenreCan, User.Email, User.Address, Candidate.FirstName, Candidate.LastName  from User, Candidate where Candidate.UserId = User.UserId;";
 $result2 = mysqli_query($conn, $query2);
 $row2 = $result2->fetch_array(MYSQLI_NUM);
 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css"/>

<title>Job Seeker Dashboard</title>
</head>
<body>
<h1> Job Seeker Dashboard</h1>


<form action="job_search_employee_interface.php" method="post">

<input type="submit" id="id_empedit" name="passing_user_id_from_dashboard" value="Search for a Job" /><div></div>
</form>
<br>
<br>


<fieldset>
<p class="lp">To edit the information, re-enter it and then click the Edit button</p>


<form action="EditEmployeeinfo.php" method="post">
<fieldset>
<legend > Personal Information </legend>

<div>
<p></p>
<label for="id_name">First Name:</label>
<input type="text" id="id_name" name="id_name" value= "<?php echo $row1[2]?>"  autofocus>
<label for="id_lname">Last Name: </label>
<input type="text"  id="id_lname"  name="id_lname" value= "<?php echo $row1[3]?>" >

<p></p>
<label for="txtEmail">Email Address:</label>
<input type="email" id = "txtEmail" name="txtEmail" value= "<?php echo $row1[0]?>"/><br>
</div>
<div>
<label for="address">Address: </label>
<input type="text" id="address"  name="address" value= "<?php echo $row1[1]?>">

<p></p>
 <input type="submit" id="id_empedit" name="personalinfo"
value="Edit" /><div></div>

</fieldset>
</div>
<div>
<p></p>
</form>

<form action="EditEmployeeinfo.php" method="post">
<fieldset>
<legend > Profile </legend>
<label for="id_uname">Username:</label>
<input type="text" id="id_uname" name="username" value= "<?php echo $row2[0]?>">
<label for="id =pwd">Password : </label>
<input type = "password" id = "pwd" name="password" value= <?php echo $row2[1]?> /><p></p>

<label >Current category: </label> <?php echo $row2[2]?><p></p>
<label for="id_gategory">Choose new Category:</label>
<select name = "category">
<optgroup label="Select category">
<option value="Gold">Basic (No Charge)</option>
<option value="Prime">Prime ($50/per month)</option>
<option value="Gold">Gold ($100/per month)</option>
</select><p></p>

<input type="submit" id="id_empedit" name="profileinfo"
value="Edit" /><div></div>

</fieldset>
<form>
</div>
<p></p>
<fieldset>

<!-- add all credit cards -->
<legend > Credit Card Payment </legend>
<p></p>


<form action ="newPaymentMethod.php">
 <input type="submit" id="id_empedit" name="emp" value="Add new payment method" />
</form>


</form>
<br>
<form action="deleteprofile.php">
<input type="submit" id="id_empedit" name="deleteprofile" value="Delete your account" /><div></div>
</form>

<!-- Links to other actions -->
<section>
<legend>Links</legend>

<li><a href="list_of_applications_employee.php">View and manage my applications</a></p></li>
<li><a href="payments.php">View and make payments</a></p></li>
<li><a href="mailto:xic55311@encs.concordia.ca">Contact Career Portal Helpdesk</a></p></li>

</section>
<form action="login.php" method="post">
<input type="submit" id="id_empedit" name="logout" value="logout" /><div></div>
</form>


</body>
</html>
