<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
    <title>Proyectando</title>
    
</head>
<body>
<div id="app">
        <center>
        <img src="assets/img/micoope1.png" class="img-responsive" style="width: 50%;height: 200px;"> 
        </center>
        
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                 <input type="text" ref="search" style="width:60px;height:15px" @keyup.enter="buscarNumero" v-model="numero" autofocus >
                </div>
                        
                        
                        <div class="col-md-2" v-if="nombre1 != ''">
                            <strong> Nombre :</strong>
                        </div>
                        <div class="col-md-2">
                            <p v-text="nombre1"></p>
                        </div>
                        <div class="col-md-2"  v-if="cif1 != ''">
                            <strong> Cif : </strong>
                        </div>
                        <div class="col-md-2">
                            <p v-text="cif1"></p>
                        </div>
                
            </div>
       
            <img :src="foto1"  style="width: 100%;height: 400px;" alt="">
            

        </div>

</div>
</body>
<script src="assets/js/vue.js"></script>
<script src="assets/js/axios.min.js"></script>
<script src="assets/js/proyectando.js"></script> 
</html>