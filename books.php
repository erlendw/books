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

ini_set('error_reporting',E_ALL);
ini_set('display_errors',1);
echo "Hello!</br>";
echo "You are served by the server IP: <b><font color='red'>" .
    $_SERVER['SERVER_ADDR'] . "</font></b></br>";


$username = "root";
$password = "";
$database = "library";

// Create connection
$conn = new mysqli("127.0.0.1", $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected to the database successfully</br></br>";
}


$result = $conn->query("SELECT bookID, Title, Name, pub_year, available FROM  Books, Authors WHERE Books.authorID=Authors.authorID ORDER BY Books.BookID");

if (!$result) {
   die(mysqli_error($conn));
}


echo "You are connected to database server IP: " . $conn->host_info;

?>

    <form action="formhandler.php" method="post">
        Select bookID to delete: <input type="text" name="delete"><br>
        <input type="submit">
    </form>
    <a href="./insertbooks.php"> Click here to insert new books in the library</br></a>
    <a href="./index.php"> Click to return to homepage</a>


<?php

echo "<h4>  Books from Library of DATS32 </h4>";
echo "<table border='1'>
  <tr>
        <th> Book-ID </th>
        <th> Book title </th>
        <th> Author </th>
        <th> Published year </th>
        <th> Available? </th>
  </tr>";



while($row = mysqli_fetch_array($result))
{
  echo "<tr>";
  echo "<td>" . $row['bookID'] . "</td>";
  echo "<td>" . $row['Title'] . "</td>";
  echo "<td>" . $row['Name'] . "</td>";
  echo "<td>" . $row['pub_year'] . "</td>";
   if($row['available'] == 1){
     echo "<td> yes</td>";
  } else{
    echo "<td> no</td>";
 } echo "</tr>";
}
echo "</table>";


mysqli_close($conn);
?>





</div>
</body>
</html>
