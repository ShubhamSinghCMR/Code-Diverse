<?php
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
    echo "<a href=\"d2.php?download_file=$filename\">Download:          '$filename'</a>";
    echo "<br/>";
}?>

