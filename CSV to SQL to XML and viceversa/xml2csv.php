<?php
$openfile='xmlf.xml';
if (file_exists($openfile)) 
	{
	    $tmp = simplexml_load_file($openfile);
		$vari = fopen('xmlfcsvexcel.csv', 'w');
		foreach ($tmp->cd as $temp) 
			{
				fputcsv($vari, get_object_vars($temp),',','"');
			}
		echo '<script language="javascript">';
		echo 'alert("XML file converted to EXCEL/CSV")';
		echo '</script>';
		fclose($vari);
	}
?>