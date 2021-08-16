<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post A New Job</title>
    <link rel="stylesheet" href="../main.css" type="text/css" >
</head>
<body>
<form action="action_page.php" method="post">
        <h1>Post Job</h1>

        <label for="job_title"><b>Job Title</b></label>
        <input type="text" name="job_title">

        <label for="job_location"><b>Job Location</b></label>
        <input type="text" name="job_location">

        <label for="no_vacancies"><b>Number of Vacancies</b></label>
        <input type="number"  name="no_vacancies" required>

        <label for="description"><b>Job Description</b></label>
        <textarea class="form-control" name="description" id="description" rows="6"></textarea>

        <label for="job_category"><b>Job Category</b></label>
        <input type="text" name="job_category" required>


        <button type="submit">Post Job</button>

    </form>
</body>
</html>