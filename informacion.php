<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
    <title>INFORMACION</title>
    
</head>
<body>
<div id="app">
        <center>
        <img src="assets/img/micoope1.png" class="img-responsive" style="width: 50%;height: 200px;"> 
        </center>
       
        <div class="container">
                <div class="row">
                    <div class="col-md-4">
                            <div class="card border-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header"><center>Buscar Asociado</center></div>
                                <div class="card-body text-primary">
                                    <!-- <div class="form-group">
                                        <label for="exampleFormControlSelect1">Buscar por</label>
                                        <select class="form-control" id="exampleFormControlSelect1" v-model="buscarpor">
                                            <option value="1">CIF</option>
                                            <option value="2">NOMBRE</option>
                                        </select>
                                    </div>
                                    <div class="form-group" v-if="buscarpor == 1">-->
                                    <label for="exampleFormControlInput1">CIF:</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"  @keyup.enter="buscar" v-model="cifInfo" placeholder="CIF">
                                  <!--  </div>
                                    <div class="form-group" v-if="buscarpor == 2"> -->
                                        <label for="exampleFormControlInput">DPI:</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput" @keyup.enter="buscar" v-model="dpiInfo" placeholder="DPI">
                                  <!--  </div>     -->
                                  
                                        <label for="exampleFormControlInput">NOMBRE:</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput" @keyup.enter="buscar" v-model="nombreInfo" placeholder="NOMBRE">
                                    <br>
                                    <div v-if="messageBuscar.length">
                                        <p style="color:red" v-text="messageBuscar"></p>
                                    </div>
                                    <button type="button" class="btn btn-primary" @click="buscar" >Buscar</button>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-8">

                        <template v-if="alertnoasociado == 1">
                        <div class="alert alert-warning" role="alert">
                            NO TRAE ASOCIADO ...!
                        </div>
                        </template>

                        <template v-if="asociado.length">
                            <div>
                                <div class="table-responsive" style="height:300px">
                                        <table class="table table-bordered  table-fixed" >
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Cif</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Agencia</th>
                                                    <th scope="col">Derecho</th>
                                                    <th scope="col">Motivo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="co in asociado">
                                                    <td v-text="co.cif"></td>
                                                    <td v-text="co.nombre"></td>
                                                    <td v-text="co.areaFinanciera"></td>
                                                    <td><span class="badge badge-pill badge-dark">{{ co.derecho }}</span></td>
                                                    <td><span class="badge badge-pill badge-danger">{{co.motivo}}</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </template>


                    </div>
                </div>
        </div>
</div>
</body>
<script src="assets/js/vue.js"></script>
<script src="assets/js/axios.min.js"></script>
<script src="assets/js/informacion.js"></script> 
</html>