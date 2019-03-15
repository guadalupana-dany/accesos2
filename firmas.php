<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
    <title>FIRMAS</title>
    
</head>
<body>
<div id="app">
        <center>
        <img src="assets/img/micoope1.png" class="img-responsive" style="width: 50%;height: 200px;"> 
        </center>
        <div class="container">
        <button class="btn btn-dark" @click="imprimir">Print</button>
        <br><br>
                    <table id="example1" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Cif</th>
                                    <th>Nombre</th>
                                    <th>Agencia</th>
                                    <th>Votador</th>
                                    <th># HOJA</th>
                                  <!--  <th>Ingrese numero</th> -->
                                    <th>OP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="aso in asociados" :key="aso.id">
                                    <td v-text="aso.cif"></td>
                                    <td v-text="aso.nombre"></td>
                                    <td v-text="aso.areaFinanciera"></td>
                                    <td>
                                    <template v-if="aso.derecho == 'VERDE'">
                                        <span class="badge badge-pill badge-success">A</span>
                                    </template>
                                    <template v-else>
                                        <span class="badge badge-pill badge-danger">B</span>
                                    </template>
                                    
                                    </td> 

                                    <td v-text="aso.num_hoja">
                                    
                                   <!-- <template v-if="aso.derecho == 'VERDE'">
                                        <input type="text" class="form-control" v-model="numero"  @keyup.enter="entrar(aso.id)">
                                    </template>
                                    <template v-else>
                                        NO TIENE DERECHO #
                                    </template>-->
                                    
                                    </td>                                  
                                    
                                    <td>
                                        <button type="button" class="btn btn-success" @click="entrar(aso.id)">
                                          ADELANTE
                                        </button>
                                       
                                    </td>
                                </tr>
                            </thead>
                    </table>
        </div>

                    

</div>
</body>
<!--
    /**
 * Desarrollado por Dany Diaz
 * Desarrollador Web
 */
 Importamos las lib que necesitamos

    -->
<script src="assets/js/jquery-3.3.1.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/vue.js"></script>
<script src="assets/js/axios.min.js"></script>
<script src="assets/js/firmas.js"></script>
</html>