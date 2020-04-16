<?php
$ad = getHostByName(getHostName());
echo "Files available at localhost";
echo "<br>";
$dirPath = dir('./uploads');
$imgArray = array();
while (($file = $dirPath->read()) !== false)
{
  
     $imgArray[ ] = trim($file);
  
}

$dirPath->close();
sort($imgArray);
$c = count($imgArray);
foreach($imgArray as $filename)
{
    echo "<a href=\"index2.php?download_file=$filename\">Download:          '$filename'</a>";
    echo "<br/>";
}
if(isset($_FILES['image']))
{
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      $expensions= array("");
       
      if(empty($errors)==true)
	  {
         move_uploaded_file($file_tmp,"uploads/".$file_name);
         echo "File uploaded";
		 $v1=$_GET["val1"];
		$v2=$_GET["val2"];
		$v3=$_GET["val3"];
		$v4=$_GET["val4"];
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "db";
		$k=0;
		$tmp1="";
				$tmp2="";
						$tmp3="";
								$tmp4="";
		
		$conn1 = new mysqli($servername, $username, $password, $dbname);
		$sql1 = "SELECT * FROM servertab";
		$result1 = $conn1->query($sql1);
		if ($result1->num_rows > 0) 
		{
    		while($row1 = $result1->fetch_assoc()) 
				{
		        	if($v1==$row1["fname"])
						{
							$k=1;
							$tmp1=$row1["fname"];
							$tmp2=$row1["lat"];
							$tmp3=$row1["version"];
							$tmp4=$row1["creationtim"];
							$connv = new mysqli($servername, $username, $password, $dbname);
							$sqlv = "UPDATE servertab SET lat='{$tmp2}',version='{$tmp3}',creationtim='{$tmp4}' WHERE fname='{$tmp1}'";
							if ($connv->query($sqlv) === TRUE) 
							{
						    echo "Record updated successfully";
							}
							 else
							  {
							    echo "Error updating record: " . $connv->error;
								}
							$connv->close();
						}
		    	}
		} 
		else 
		{
	    echo "0 results";
		}
		$conn1->close();
		
		
		if($k!=1)
			{
			$conn = new mysqli($servername, $username, $password, $dbname);
							$sql = "INSERT INTO servertab (fname, lat, version,creationtim) VALUES ('{$v1}', '{$v2}', '{$v3}','{$v4}')";
							if ($conn->query($sql) === TRUE) 
								{
								    echo "New record created successfully";
								}
							else 
								{
							    echo "Error: " . $sql . "<br>" . $conn->error;
								}
							$conn->close();
		}
		
		
      }
      else
	  {
         print_r($errors);
      }
   }

?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Upload/Download File..</title>
</head>

<body>
<form action="" method="POST" enctype="multipart/form-data">
  
<table width="638" border="0" align="center" id="table1back">
  <tr>
    <td width="632" height="28" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Select a file to upload on this server</td>
  </tr>
  <tr>
    <td height="46"><label for="email">
    <input type="file" name="image" />
         <input type="submit"/>
		</tr>
</table>
</form></body>
</html>

