<html>

<head>
    <link rel="stylesheet" type="text/css" href="veldig.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
</head>
<body>


<ul class="navbar">
    <li><a href="./index.php"">Home</a></li>
    <li><a class="active" href="./insertbooks.php">Add new book</a></li>
    <li><a class="active" href="./books.php">Library</a></li>
</ul>


<div class="wrapper">


<?php

$username = "root";
$password = "";
$database = "library";

// Create connection
$conn = new mysqli("127.0.0.1", $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "You are served by the server IP: <b><font color='red'>" .
    $_SERVER['SERVER_ADDR'] . "</font></b></br>";
echo "You are connected to database server IP: " . $conn->host_info;
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "You are served by the server IP: <b><font color='red'>" .
    $_SERVER['SERVER_ADDR'] . "</font></b></br>";
echo "You are connected to database server IP: " . $conn->host_info;



?>

<form action="formhandler.php" method="post">
    Book title: <input type="text" name="Title" required><br>
    Author: <input type="text" name="Author" required><br>
    Publication year: <input type="number" name="Pub_year" required><br>
    Available? Type 1=YES, 0=NO  <input type="number" name="Available" required><br>
    <input type="submit">
</form>
</body>
</html>
