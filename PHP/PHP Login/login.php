<?php
session_start();
?>
<html>
<center>
<form action='' method='post'>
<br><br><fieldset>
<img src="login.jpg">
<legend> <b>Login </legend><br>
<font color="red">Username :</font><input type="text" name="t1"> <br><br>
<font color="red">Password : </font><input type="password" name="t2"><br><br>
<input type="submit" name="sub" value="login"></fieldset>
</form>
</center>
</html>
<?php
if(isset($_POST['sub']))
{
require "connection.php";
$username=$_POST['t1'];
$password=$_POST['t2'];
$str="select * from login where user_name='$username' and password='$password'";
$result=mysqli_query($con,$str);
if(mysqli_num_rows($result)==1)
{
$row=mysqli_fetch_array($result);
$_SESSION['user']=$row['user_id'];
$_SESSION['uname']=$row['user_name'];

header("location:profile.php");
}
else
{
echo "<i><center><font color='red'>wrong password or username!!!!</font></center></i>";
}
}

?>