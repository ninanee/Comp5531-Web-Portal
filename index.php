<?php
//require_once './partials/database.php';
// require_once './partials/head-public.php';
// if (isset($_SESSION["is_employer"]) && $_SESSION["is_employer"]) {
//   header("Location: ./employees/jobs");
// } else if (isset($_SESSION["is_employee"]) && $_SESSION["is_employee"]) {
//   header("Location: ./employer/jobs");
// } else if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]) {
//   header("Location: ./admin");
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

/* reset website css */
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}
body {
	line-height: 1;
}
ol, ul {
	list-style: none;
}

/* change font family */
body {
  font-family: 'Roboto', sans-serif;
}

.container{
  padding: 40px;
  border: 3px solid #f1f1f1;
  text-align:center;
}

h1 {
  font-size: 36px;
  font-weight: 800;
  margin-bottom: 1em;
}

h2 {
  font-size: 20px;
  margin-bottom: 0.8em
}

.wrapper {
  margin: auto;
  padding: 10px;
  width: 600px;
  border: 3px solid lightgrey;
  border-radius: 8px;
  box-shadow: 0 0 2px 1px lightgrey;
}

.button {
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 8px 2px;
  border-radius: 8px;
  width: 80%;
  cursor: pointer;
}


.button1 {background-color: #293250;} 
.button2 {background-color: #4CAF50;}
.button3 {background-color: #DA70D6}
</style>

<body>
  <div class = "container">
    <h1>Welcome to the Job Portal</h1>
    <h2>Please login if you already have an account, otherwise you may register</h2>
    <ul class="wrapper">
      <li>
        <a class = "button button1" href="./login.php">Login</a>
      </li>
      <li>
        <a class = "button button2" href="./registerEmployer.php">Register For Employers</a>
      </li>
      <li>
        <a class = "button button3" href="./registerEmployee.php">Register For Job Seekers</a>
      </li> 
    </ul>
  </div>

</body>
</html>
