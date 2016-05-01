<?php
ini_set('error_reporting',E_ALL);
ini_set('display_errors',1);

$username = "root";
$password = "liverpool";
$database = "Library";

// Create connection
$conn = new mysqli("appname", $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



if(isset($_POST["Title"] )) {
    $title = $_POST["Title"];
    $author = $_POST["Author"];
    $pub_year = $_POST["Pub_year"];
    $available = $_POST["Available"];
    $authorID = null;

    if (!checkAuthor($author, $conn)) {
        $createAuthor = "INSERT INTO Authors (Name) VALUES ('$author')";
        $result = mysqli_query($conn, $createAuthor);
        if (!$result) {
            die(mysqli_error($conn));
        }
        $authorID = $conn->query("SELECT authorID FROM Authors WHERE Name = '$author'")->fetch_row()[0];
        if (!$result) {
            die(mysqli_error($conn));
        }
    } else {
        $authorID = $conn->query("SELECT authorID FROM Authors WHERE Name = '$author'")->fetch_row()[0];

        $createBook = "INSERT INTO Books (Title, pub_year, available) VALUES ('$title' , '$pub_year', '$available')";
        $insertID = "UPDATE Books SET authorID='$authorID' WHERE authorID IS NULL";
        $result = mysqli_query($conn, $createBook);
        $insert = mysqli_query($conn, $insertID);
        if (!$result || !$insert) {
            die(mysqli_error($conn));
        } else {
            echo "You successfully inserted " . $title . " into the database!</br>";
        }
        $delete = $_POST["delete"];

        $query = "DELETE FROM Books WHERE Books.bookID='$delete'";
        $booktitle = $conn->query("SELECT Title FROM Books WHERE Books.bookID = '$delete'")->fetch_row()[0];

        if (!$result) {
            die(mysqli_error($conn));
        } else {
            ;
            echo "You successfully deleted the book $booktitle </br>"; //FIKS
        }

    }

    function checkAuthor($input, $conn)
    {
        $checkQuery = "SELECT * from Authors WHERE Name='$input'";
        $userCheck = mysqli_query($conn, $checkQuery);
        if ($userCheck->num_rows > 0) {
            return true;
        } else
            return false;
    }
}

echo "You are served by the server IP: <b><font color='red'>" .
    $_SERVER['SERVER_ADDR'] . "</font></b></br>";
echo "You are connected to database server IP: " . $conn->host_info . "</br>";

?>

<html>
<a href="./books.php"> Return</a>
</html>

