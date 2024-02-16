<?php
$ad = getHostByName(getHostName());
echo "<p style='color:black;text-align:center;font-size:2em;'> Server 2:</p>";
echo "<br>";
$dirPath = dir('./userdata');
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
	if((strcmp($filename, '.') !== 0) && (strcmp($filename, '..') !== 0)) 
    	{
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
									echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
										echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "<a  href=\"dwd2.php?download_file=$filename\">DOWNLOAD:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$filename</a>";
	    echo "<br/>";
		}
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Cloud Server</title>
</head>
</html>