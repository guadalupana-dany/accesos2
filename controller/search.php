<?php
    include_once("../conexion.php");
    header('Content-Type: application/json');

    //BUSCAR POR CIF
    if(isset($_GET['cif'])){
        $cif = $_GET['cif'];
      /*  $query = mysqli_query($mysqli,"select 
        id,cif,nombre,zona,sexo,areaFinanciera,id_estado_ingreso,id_estado_derecho,entro,numero,estado from 
        colaboradores where cif = " . $cif);*/
        $query = mysqli_query($mysqli,"select id,cif,nombre,areaFinanciera,id_estado_derecho,entro from asociado where cif = " . $cif);
        
        $response = array();
        while($row = mysqli_fetch_assoc($query)){
            $response[] = $row;
         }
         
         echo json_encode($response);
         exit;
    }

    //BUSCAR POR NOMBRE
    if(isset($_GET['nombre'])){
        $nombre = $_GET['nombre'];
        $test = "select id,cif,nombre,areaFinanciera,id_estado_derecho,entro from asociado where nombre like '%" . $nombre ."%'";      
        $query = mysqli_query($mysqli,$test);
        
        $response = array();
        while($row = mysqli_fetch_assoc($query)){
            $response[] = $row;
         }         
         echo json_encode($response);
         exit;
    }
     //BUSCAR POR DPI
     if(isset($_GET['dpi'])){
        $dpi = $_GET['dpi'];
        $test = "select id,cif,nombre,areaFinanciera,id_estado_derecho,entro from asociado where dpi like '%" . $dpi ."%'";      
        $query = mysqli_query($mysqli,$test);
        
        $response = array();
        while($row = mysqli_fetch_assoc($query)){
            $response[] = $row;
         }         
         echo json_encode($response);
         exit;
    }

    //ACTUALIZAR LA PRIMERA ENTRA DONDE DAN EL BRAZALETE
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $test = "UPDATE asociado SET entro = 0,estado = 1 where id = ". $id;
         mysqli_query($mysqli,$test);
        
        $response = array(
            "error" => "NO",
            "test" => $test
        );
      
         echo json_encode($response);
         exit;
    }


    //BUSCAR POR CIF
    if(isset($_GET['cifInfo'])){
        $cif = $_GET['cifInfo'];
      /*  $query = mysqli_query($mysqli,"select 
        id,cif,nombre,zona,sexo,areaFinanciera,id_estado_ingreso,id_estado_derecho,entro,numero,estado from 
        colaboradores where cif = " . $cif);*/
         
        $query = mysqli_query($mysqli,"SELECT a.id,a.cif,a.nombre,a.areaFinanciera,ed.nombre as derecho,ei.nombre motivo 
        FROM asociado as a inner join estado_derecho as ed on ed.id = a.id_estado_derecho 
        inner join estado_ingreso as ei on ei.id = a.id_estado_ingreso where cif = " . $cif);
        
        $response = array();
        while($row = mysqli_fetch_assoc($query)){
            $response[] = $row;
         }
         
         echo json_encode($response);
         exit;
    }

    //BUSCAR POPR NOMBRE
    if(isset($_GET['nombreInfo'])){
        $nombre = $_GET['nombreInfo'];
        $test = "SELECT a.id,a.cif,a.nombre,a.areaFinanciera,ed.nombre as derecho,ei.nombre motivo 
         FROM asociado as a inner join estado_derecho as ed on ed.id = a.id_estado_derecho 
         inner join estado_ingreso as ei on ei.id = a.id_estado_ingreso where a.nombre like '%" . $nombre ."%'";      
        $query = mysqli_query($mysqli,$test);
        
        $response = array();
        while($row = mysqli_fetch_assoc($query)){
            $response[] = $row;
         }         
         echo json_encode($response);
         exit;
    }

      //BUSCAR POPR CIF
      if(isset($_GET['dpiInfo'])){
        $dpiInfo = $_GET['dpiInfo'];
        $test = "SELECT a.id,a.cif,a.nombre,a.areaFinanciera,ed.nombre as derecho,ei.nombre motivo 
         FROM asociado as a inner join estado_derecho as ed on ed.id = a.id_estado_derecho 
         inner join estado_ingreso as ei on ei.id = a.id_estado_ingreso where a.dpi like '%" . $dpiInfo ."%'";      
        $query = mysqli_query($mysqli,$test);
        
        $response = array();
        while($row = mysqli_fetch_assoc($query)){
            $response[] = $row;
         }         
         echo json_encode($response);
         exit;
    }
    //muesttra los datos para el modulo de fotografias
    if(isset($_GET['mostrando'])){
        
        $test = "SELECT a.id,a.cif,a.nombre,a.areaFinanciera,ed.nombre as derecho,ei.nombre motivo 
         FROM asociado as a inner join estado_derecho as ed on ed.id = a.id_estado_derecho 
         inner join estado_ingreso as ei on ei.id = a.id_estado_ingreso where a.estado = 1";      
        $query = mysqli_query($mysqli,$test);
        
        $response = array();
        while($row = mysqli_fetch_assoc($query)){
            $response[] = $row;
         }         
         echo json_encode($response);
         exit;
    }

    //muestra los datos para el asociado en las fotografias
    if(isset($_GET['mostrandoAsociado'])){
        $id = $_GET['mostrandoAsociado'];
        
        $test = "SELECT a.id,a.cif,a.nombre,a.areaFinanciera,ed.nombre as derecho,ei.nombre motivo 
         FROM asociado as a inner join estado_derecho as ed on ed.id = a.id_estado_derecho 
         inner join estado_ingreso as ei on ei.id = a.id_estado_ingreso where a.id = ".$id;      
        $query = mysqli_query($mysqli,$test);
        
        $response = array();
        while($row = mysqli_fetch_assoc($query)){
            $response[] = $row;
         }         
         echo json_encode($response);
         exit;
    }

     //muestra los datos y la foto referente al numero ingresado
     if(isset($_GET['numero'])){
        $numero = $_GET['numero'];
       
        $query_auditoria = "select count(*) as total from  auditoria_opinion where numero_asociado = " .$numero;
       
       $query_count = mysqli_query($mysqli,$query_auditoria);
        $data=mysqli_fetch_assoc($query_count);
        $count = $data['total'];
        

        if($count <= 2){
            $test = "SELECT a.id,a.cif,a.nombre,a.foto,a.areaFinanciera FROM opinion as o inner join asociado as a on a.id = o.id_asociado where o.estado = 1  ";    
            $query = mysqli_query($mysqli,$test);

            $response = array();
            while($row = mysqli_fetch_assoc($query)){
                $response[] = $row;
            }
            echo json_encode($response);
            exit;
        }else{
            $response = array(
                "error" => "SI",
                "message" => "TIENE MAS DE 2 PARTICIPACIONES"            
            );
          
             echo json_encode($response);
             exit;
        }


       
    }

    //busca al asociado que va a opinar
    if(isset($_GET['opinion'])){
        $opinion = $_GET['opinion'];

        $test1 = "update opinion as o inner join asociado as a on a.id = o.id_asociado set o.estado = 2 where o.estado = 1 ";      
        mysqli_query($mysqli,$test1);

        $test = "update opinion as o inner join asociado as a on a.id = o.id_asociado set o.estado = 1 where a.cif = ".$opinion;      
        mysqli_query($mysqli,$test);

        $insert = "insert into auditoria_opinion (numero_asociado) values ('".$opinion."')";
        mysqli_query($mysqli,$insert);

    }


    //muestra los datos para el asociado en para firmar
    if(isset($_GET['mostrandoFirmas'])){
        $id = $_GET['mostrandoFirmas'];
        
        $test = "SELECT a.id,a.cif,a.nombre,a.areaFinanciera,ed.nombre as derecho,f.num_hoja,ei.nombre motivo 
         FROM asociado as a inner join estado_derecho as ed on ed.id = a.id_estado_derecho 
         inner join estado_ingreso as ei on ei.id = a.id_estado_ingreso inner join firma as f on f.asociado_id = a.id where a.estado = 2"; 
            
        $query = mysqli_query($mysqli,$test);
        
        $response = array();
        while($row = mysqli_fetch_assoc($query)){
            $response[] = $row;
         }         
         echo json_encode($response);
         exit;
    }

    //muestra los datos para el asociado en para firmar
    if(isset($_GET['firma'])){

        $test = "SELECT * from firma where estado = 0"; 
            
        $query = mysqli_query($mysqli,$test);
        
        $response = array();
        while($row = mysqli_fetch_assoc($query)){
            $response[] = $row;
         }         
         echo json_encode($response);
         exit;
    }


    //hace el ingreso final de los asociados
    /*if(isset($_GET['ingresoFinal'])){
        $id = $_GET['ingresoFinal'];
        $numero = $_GET['numero'];

        $test = "UPDATE asociado SET estado = 3,numero = '".$numero."' where id = ". $id;
        echo $test;
       /*  mysqli_query($mysqli,$test);
        
        $response = array(
            "error" => "NO",
            "test" => $test
        
        );
      
         echo json_encode($response);
         exit;*/
    //}
    if(isset($_GET['ingresoFinal'])){
        $id = $_GET['ingresoFinal'];

        $test = "UPDATE asociado SET estado = 3 where id = ". $id;
        
        $insert = "insert into opinion (id_asociado) values (".$id.")";
        mysqli_query($mysqli,$insert);
        
        
         mysqli_query($mysqli,$test);
        
        $response = array(
            "error" => "NO",
            "test" => $test
        
        );
      
         echo json_encode($response);
         exit;
    }

?>