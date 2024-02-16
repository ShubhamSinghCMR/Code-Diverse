<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$nm=$_POST["nm"];
$em=$_POST["em"];
$pa=$_POST["pa"];
$gr=$_POST["gr"];
$sq=$_POST["sq"];
$ans=$_POST["ans"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO admin VALUES ('".$nm."', '".$em."', '".$pa."','".$gr."', '".$sq."', '".$ans."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: acreated.php");
exit;
?> 