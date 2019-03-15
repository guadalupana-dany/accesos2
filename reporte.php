<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
    <title>Reporte</title>
</head>
<body>
<div id="app">      
        <div class="container">
        <?php
            include_once("conexion.php");
            $query_auditoria = "select count(*) as total from  asociado where estado = 3";       
            $query_count = mysqli_query($mysqli,$query_auditoria);
            $data=mysqli_fetch_assoc($query_count);
            $count = $data['total'];
            echo "<h1>FECHA : " . date("d") . " del " . date("m") . " de " . date("Y")."</h1>";        
        ?>
        <h1 style="">CANTIDAD DE ASOCIADO : <?=$count?></h1>             
      </div>
</div>
</body>
</html>