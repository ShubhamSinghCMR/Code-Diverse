
<?php
$valid_formats = array("txt");
$max_file_size = 1024*100; //100 kb
$path = "userdata/"; // Upload directory
$count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to execute all files
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";
	            continue; // Skip large files
	        }
			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = "$name is not a valid format";
				continue; // Skip invalid file formats
			}
	        else{ // No error found! Move uploaded files 
	            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name)) {
	            	$count++; // Number of successfully uploaded files
	            }
	        }
	    }
	}
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
                   
            }       
</script>             

        
</head>
    
    
    <body >
        
        <table id="noop" width="1352" height="280" border="0">
          
          <tr>
            <td>
            <p>Select the files you want to upload: </p>
            <p>
            		<?php
		# error messages
		if (isset($message)) {
			foreach ($message as $msg) {
				printf("<p class='status'>%s</p></ br>\n", $msg);
			}
		}
		# success message
		if($count !=0){
			echo "<script type='text/javascript'>alert('$count Files uploaded');</script>";

		}
		?>
<form action="" method="post" enctype="multipart/form-data">
  <input type="file" name="files[]" multiple accept="text/plain"><br>
			    <input type="submit" value="  Upload  ">
		      
            </form>
            
            </p></td>
          </tr>
        </table>
            </body>
        
</html>
