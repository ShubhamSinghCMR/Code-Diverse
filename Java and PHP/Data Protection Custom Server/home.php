
<?php
session_start();
if(!isset($_SESSION['user']))
{ 

     	      header("location:index.php");
   
	 }

?>
<!DOCTYPE html>
<html>
    <head>
       <link rel="stylesheet" type="text/css" href="hstyle.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Cloud Server</title>
        <script>
            function fup()
            {
                   location="upload.php";
            }
			function fdown()
            {
                                      location="home.php";
            }
			function log()
            {
                   location="logout.php";
            }       
</script>             

        
</head>
    
    
    <body >
        <table id="noop" width="1328" height="62" border="0">
          <tr>
              <td height="58" ><br>
              <b><a href="#" id="a" onclick="fup()">Upload</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="a" onclick="fdown()">Download</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="a" onclick="log()">Logout</a>
                                             </b>
                        <img src="pics/line.jpg" width="1204" height="1"></td>
          </tr>
        </table>
        <table id="noop" width="1352" height="280" border="0">
          <tr><<td height="47">Files stored:</td><tr>
          <tr>
            <td>
            <iframe src="http://localhost:8012/MTechCd/dwd1.php"  height="300" width="1000"  frameBorder="0"></iframe> <br />
			<!--
            <iframe src="http://192.168.5.57/server2/index.php" height="300" width="1000"></iframe> <br />
			<iframe src="http://192.168.5.57/server3/index.php" height="300" width="1000"></iframe> <br />
			<iframe src="http://192.168.5.57/server4/index.php" height="300" width="1000"></iframe> <br />
			-->
            
            
            </td>
          </tr>
        </table>
        <table width="1355" id="noop1" height="52" border="0">
          <tr>
            <td>                        <img src="pics/line.jpg" width="1204" height="1"><br>
            Cloud Server &copy; 2016</td>
          </tr>
        </table>
    </body>
        
</html>
