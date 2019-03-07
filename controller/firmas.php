<?php 
 include_once("../conexion.php");
 /**
 * Desarrollado por Dany Diaz
 * Desarrollador Web
 */
// header('Content-Type: application/json');

$request_body = file_get_contents("php://input");
$data = json_decode($request_body);
$firmas =   $data->firmas;
$count = count($firmas);

//aqui recibimos las 16 firmas para pasarlas a un estado listas para firmar
for($i = 0; $i < $count; $i++){
    $query = "update firma set estado = 1 where id = ".$firmas[$i]->id;
    mysqli_query($mysqli,$query);
}

echo "LISTO";
exit;

?>