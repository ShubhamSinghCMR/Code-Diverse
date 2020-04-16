<?php
$filename = "mydata.csv";
$connection = mysqli_connect("localhost", "root", "","a8db") or die("Error " . mysqli_error($connection));
$fp = fopen($filename,"r");
while(($row = fgetcsv($fp,"500",",")) != FALSE)
{
    $sql = "INSERT INTO book(name, author, date) VALUES('" . implode("','",$row) . "')";
    if(!mysqli_query($connection, $sql))
    {
        die('Error : ' . mysqli_error());
    }
}
fclose($fp);
mysqli_close($connection);
?>