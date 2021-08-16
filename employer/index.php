<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../main.css" type="text/css" >
</head>
<body>
    <h1> Your Posted Jobs </h1>
    <button class ="postJob"><a href = "./new.php">Post Job</a></button>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Accepted</th>
                    <th>Job Category</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Some Php code to populate the table with jobs from the db -->
            </tbody>
        </table>
</div>
</body>
</html>