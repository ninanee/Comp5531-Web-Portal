//This is a file for creating a new job

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
    input[type=text], [type = number], input[type=password] {
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

    /* Add padding to containers */
    .container {
        padding: 16px;
    }


</style>
<body>
<form action="action_page.php" method="post">
    <div class="container headerText">
        <h1>Post Job</h1>
    </div>

    <div class="container">
        <label for="job_title"><b>Job Title</b></label>
        <input type="text" name="job_title">

        <label for="job_location"><b>Job Location</b></label>
        <input type="text" name="job_location">

        <label for="no_vacancies"><b>Number of Vacancies</b></label>
        <input type="number"  name="no_vacancies" required>

        <label for="description"><b>Job Description</b></label>
        <textarea class="form-control" name="description" id="description" rows="4"></textarea>

        <label for="phone"><b>Job Category</b></label>
        <input type="text" name="phone" required>


        <button type="submit">Post Job</button>
    </div>

    </form>
</body>
</html>