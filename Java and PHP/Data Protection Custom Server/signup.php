<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>sNs.iN</title>
        <link rel="stylesheet" type="text/css" href="signupstyle.css" />
        <script>
            function check()
            {
                    var nm1=document.getElementById("nm").value;
                    var em1=document.getElementById("em").value;
                   var pa1=document.getElementById("pa").value;
                   var rpa1=document.getElementById("rpa").value;
                   var sq1=document.getElementById("sq").value;
                   var ans1=document.getElementById("ans").value;
                   if(nm1.length==0 || em1.length==0 || pa1.length==0 || rpa1.length==0 || sq1.length==0 || ans1.length==0)
                   {document.getElementById('mydiv1').innerHTML="<font color=red>Please fill all the fields....</font>";
                   return false;
                    }
                    
                    
                    else if(pa1!=rpa1)
                            {   
                                document.getElementById('mydiv1').innerHTML="";
                                document.getElementById('mydiv1').innerHTML="<font color=red>Password MISMATCH!</font>";
                                return false;   
                            }
                    else 
                     	{
                            document.getElementById('mydiv1').innerHTML="";
                            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                            var email=document.getElementById("em").value;
                            if(email.match(mailformat))
                            {
                                 return true;
                             }
                            else
                             {

                             alert("Invalid email address!");
                               return false;
                                 }
                         
                        }
    }
    
    function blur1()
    {
        var pa2=document.getElementById('pa').value;
        if(pa2.length<6)
        {       document.getElementById('mydiv22').innerHTML="<font color=red>Password should be six characters long</font>";
        }
		else
		 {       document.getElementById('mydiv22').innerHTML="";
        }
    }
            
            
        </script>
        </head>
   <body id="bodyback">
     <p id="sitename">     &nbsp;&nbsp;&nbsp;Cloud Server: Account Creation</p>
<form name="form1" method="post" action="insertdb.php" onsubmit="return check()">
  
  <table id="table1back" width="475" border="0" align="center">
    <tr>
      <td width="198" height="27">Name</td>
      <td width="267"><label for="nm"></label>
      <input name="nm" type="text" id="nm" size="33"><br></td>
    </tr>
    <tr>
      <td height="25">Gender</td>
      <td><p>
        <label>
          <input name="gr" type="radio" id="gr_0" value="0" checked>
          Male</label> 
        <label>
          <input type="radio" name="gr" value="1" id="gr_1">
          Female</label>
        <br>
      </p></td>
    </tr>
    <tr>
      <td height="27">Email</td>
      <td><label for="em"></label>
      <input name="em" type="text" id="em" size="33"><div id="mydiv11"></div></td>
    </tr>
    <tr>
      <td height="25">Password</td>
      <td><label for="pa"></label>
      <input name="pa" type="password" id="pa" onblur="blur1()" size="15" maxlength="15"><div id="mydiv22" ></div></td>
    </tr>
    <tr>
      <td height="27">Confirm Password</td>
      <td><input name="rpa" type="password" id="rpa" size="15" maxlength="15"></td>
    </tr>
    <tr>
      <td height="28">Security Question</td>
    <td><label for="sq"></label>
          <input name="sq" type="text" id="sq" size="37"></td>
    </tr>
    <tr>
      <td height="24">Answer</td>
      <td>
          <p>
        <label for="ans"></label>
        <input name="ans" type="text" id="ans" size="40"> 
        </p>
      </td>
          
    </tr>
    <tr>
      <td height="22">&nbsp;</td>
      <td><div id="mydiv1"></div></td>
    </tr>
   
    
     
  </table>
  
<br>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="signupbut" id="signupbut" value="  SignUp  ">

  
   </form>
</body>
</html>