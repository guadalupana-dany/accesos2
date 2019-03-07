<?php


include_once("conexion.php");
   
    $archivo = fopen("script.csv","r");

   
	while( ($data = fgetcsv($archivo, 1000, ";") ) )
	{
      mysqli_query($mysqli,$data[0]);
   }
 
      fclose($archivo);


?>
