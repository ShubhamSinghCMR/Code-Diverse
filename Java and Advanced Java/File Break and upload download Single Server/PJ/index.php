
<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("");
      
     
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploads/".$file_name);
         echo "File uploaded";
      }
      else{
         print_r($errors);
      }
   }
?><!DOCTYPE HTML>
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
    <td height="168" align="left"><p id="sitename">Upload a file.. </p></td>
  </tr>
  <tr>
    <td width="632" height="28" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your file is now encrypted. Now select it to upload</td>
  </tr>
  <tr>
    <td height="46"><label for="email">
    <input type="file" name="image" />
         <input type="submit"/>
		</tr>
</table>
</form></body>
</html>