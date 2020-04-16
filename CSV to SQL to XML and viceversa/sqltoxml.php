<?php
$con = mysqli_connect("localhost", "root", "", "a8db");
$sql = "SELECT name, author FROM book";
$res = mysqli_query($con, $sql);

echo "<pre>";
echo "&lt;?xml version=\"1.0\"?&gt;<br>";
echo "&lt;books&gt;";
while($r=mysqli_fetch_array($res))
{	
 echo "<br>&nbsp;&lt;bookie name=\"$r[0]\"&gt;$r[1]&lt;/bookie&gt;";
}
echo "<br>&lt;/books&gt;<br>";
echo "</pre>";
?>