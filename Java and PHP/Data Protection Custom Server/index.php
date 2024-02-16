<?php
session_start();
?>


<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Cloud Server</title>
<script>
            function check()
            {
                    var email=document.getElementById("email").value;
                    var pass=document.getElementById("pass").value;
                    
                    if(email.length==0 || pass.length==0)
                            {
                                    document.getElementById('incomplete').innerHTML="<font color=red>Please fill both the fields....</font>";
                                    return false;
                            }
                    else if(pass.length<6)
                          {   
                              document.getElementById('incomplete').innerHTML="<font color=red>Invalid email or password!</font>";
                              return false;
                          }
            }       
</script>             
</head>
<body id="bodyback">
<form action="" method="post" onSubmit="return check()">
<div id="picdiv">
  <p>&nbsp;</p>
  <table id="table1back" width="599" border="0" align="right">
    
    
    <tr>
      <td height="168" align="left">  <p id="sitename">&nbsp;&nbsp;Cloud Server  </p></td>
    </tr>
    <tr>
      <td width="593" height="28" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;     &nbsp;     &nbsp;     &nbsp;&nbsp;EMAIL</td>
    </tr>
    <tr>
      <td height="46"><label for="email"></label>
      <input name="email" type="text" id="email" value="" size="40"></td>
    </tr>
    <tr>
      <td height="36">PASSWORD</td>
    </tr>
    <tr>
      <td height="42"><label for="pass"></label>
        <input name="pass" type="password" id="pass" size="30" maxlength="15">
                <div id="incomplete"></div>
        
        </td>
    </tr>
    <tr>
      <td height="34" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</strong>&nbsp;
        <input type="submit" name="loginbut" id="loginbut" value="   Login   ">

        
        </td>
    </tr>
    <tr>
      <td height="33" align="left">&nbsp;</td>
    </tr>
    <tr>
        <td height="26" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong>To create an account.. .click <a style="text-decoration:underline;" href="signup.php"><font color="blue">here</font></a></td>
    </tr>
</table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  
 
</div>
</form>
</body>
</html>

<?php
require "connection.php";
$username=$_POST['email'];
$password=$_POST['pass'];
$str="select * from admin where email='$username' and pass='$password'";
$result=mysqli_query($con,$str);
if(mysqli_num_rows($result)==1)
{
$row=mysqli_fetch_array($result);
$_SESSION['user']=$row['email'];
$_SESSION['uname']=$row['pass'];

header("location:home.php");
}

?>