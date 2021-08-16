<?php
ob_start();
session_start();

$db_host = "localhost";
$db_name = "test";
$db_user = "testaccount";
$db_pass = "niyun891029nina";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


 //personal info section. 
$query1 = "SELECT User.Email, User.Address, User.Phone_Number, User.Username, Employer.Name, 
PASSWORD, GenreEm from User, Employer where Employer.UserId = User.UserId;";
$result1 = mysqli_query($conn, $query1);
$row1 = $result1->fetch_array(MYSQLI_NUM);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" />

<title>Employer Dashboard</title>
</head>
<body>
<h1> Employer Dashboard</h1>

<fieldset>
<p class="lp">To edit the information, re-enter it and then click the Edit button</p>


<form action= "EditEmployerinfo.php" method="post">
<fieldset>
<h2> Company Information </h2>

<div>
<p></p>
<label for="Company_Name">Company Name:</label>
<input type="text" id="Company_Name" name="Company_Name" value= "<?php echo $row1[4]?>" />
<label class="lable1" for="address">Address: </label>
<input type="text"  id="address" class = "adminDashboardWrapper" name="address" value= "<?php echo $row1[1]?>">
<label for="txtEmail">Email Address:</label>
<input type="email" id = "txtEmail" name= "txtEmail" value= "<?php echo $row1[0]?>" />
<label for="url">Phone Number:</label>
<input type = "url" id = "url" name = "url" value= "<?php echo $row1[2]?>" />

<label for="id =pwd">Password : </label>
<input type = "password" id = "pwd" name="password" value= <?php echo $row1[5]?> />

<label >Current category: </label> <?php echo $row1[6]?> <p></p>
<label for="id_category"> Choose new Category:</label>
<select class="selectOption" name="category">
<optgroup label="Select category">
<option value="Gold">Gold ($100/per month)</option>
<option value="Prime">Prime ($50/per month)</option>
</select><p></p>

<p></p>
 <input type="submit" id="id_empedit" name="personalinfo"
value="Edit" /><div></div>
</fieldset>
</div>

<p></p>
</form>




<p></p>

<br>

<legend>Post a New Job</legend>

<form action="post_job_employer.php" method="post">
<fieldset>
<div>
<h2> Post a new Job </h2>
<label for="postjob">Please Fill Out Information Here</label><br>
<input type="text"id="jobname" class="textboxAddress" name="job_title" placeholder="Job Title
"required>

<input type="text" id="skills"class="textboxAddress" name="job_description" placeholder="Job Description
"required><br>

<input type="text"id="jobcategory" class="textboxAddressDetail" name="job_category" placeholder="Job Category"required>

<input type="text" id="Positions to be filled"class="textboxAddressDetail" name="number_of_positions"
placeholder="Number of Positions"required>

<input type="text" id="worklocation"class="textboxAddressDetail" name="city"
placeholder="City"required><br>

<div class="submit">
<input type="hidden" name= "user_id">
<input type="submit" id="id_emp" name="posting_job"
value="Submit" />
</fieldset>
</div>
</form>


<!-- Links to other actions -->
<section>
<legend>Links</legend>

<li><a href=view_jobs_employers.php>View And Manage Jobs</a></p></li>
<li><a href="view_applications_employers.php">View Applications</a></p></li>
<li><a href="payments.php">View and make payments</a></p></li>
<li><a href="mailto:xic55311@encs.concordia.ca">Contact Career Portal Helpdesk</a></p></li>


</section>
<form action="index.php" method="post">
<input type="submit" class = "logout" id="id_empedit" name="logout" value="logout" /><div></div>
</form>



</body>
</html>
<?php ob_end_flush(); ?>
