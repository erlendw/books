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
echo "Hello IP: <b>" . $_SERVER['REMOTE_ADDR'] . "</b></br>";
echo "You are served by the server IP: <b><font color='red'>" .
    $_SERVER['SERVER_ADDR'] . "</font></b></br>";
$datetime=date("j F,Y,g:i a");
echo "on: <b>" . $datetime . "</b>";
echo "\nGroup 32</br>";
echo "Members:</br>";
echo "Sander, Erlend og Mads</br>";
?>


<a href="./books.php"> Click here to go to the Library!</a>
</div>
</body>
</html>
