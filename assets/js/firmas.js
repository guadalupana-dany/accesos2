/**
 * Desarrollado por Dany Diaz
 * Desarrollador Web
 */
var app = new Vue({

    el: '#app',
    data: {
        //array de los datos del asociado
        asociados: [],

        id_asociado: 0,

        //datos del asociado por separado
        asociado: [],
        nombre: '',
        id_socio: 0,
        derecho: '',
        foto: '',


        //firmas
        firma: [],

        //numero de botador para los que tengan derecho
        numero: '',
        contador: 0,
    },

    methods: {
        //metodo que devuelve a los asociados con estado = 2 que es el que esta listo para firmar y tomar botador 
        getAsociados() {
            let url = 'controller/search.php?mostrandoFirmas=listo';
            $('#example').DataTable().destroy();
            axios.get(url).then(response => {
                app.asociados = response.data;
                setTimeout(function() {
                    var table = $('#example').DataTable();
                }, 500);
            });
        },
        //funcion que recibe el id del asociado que va entrando ya al evento cuando ya haya firmado y tomado el botador
        entrar(id) {
            this.id_asociado = id;
            let url = 'controller/search.php?ingresoFinal=' + id;

            axios.get(url).then(response => {
                app.numero = '';
                app.getAsociados();

            });
        },
        imprimir() {
            var opcion = confirm("SEGURO QUE QUIERES IMPRIMIR");

            if (opcion) {
                let me = this;
                let url = 'controller/search.php?firma=0';
                me.firma = [];
                axios.get(url).then(response => {
                    me.firma = response.data;
                    let url2 = "controller/firmas.php";
                    axios.post(url2, { firmas: me.firma })
                        .then(response1 => {
                            me.contador++;
                            window.open('http://10.60.81.213/firmas/print.php?count=' + me.contador, '_blank');
                            // window.open('http://10.60.81.32:81/pdf_firmas/print.php?count=' + me.contador, '_blank');
                            me.firma = [];
                        });
                });
            }
        },
        /**
         * METODO QUE VERIFICA LAS 16 FIRMAS SI AL COMPLETARSE LAS 16 ABRE UN PDF CON LAS FIRMAS ASIGNADAS
         */
        verificarFirmas() {
            let me = this;
            let url = 'controller/search.php?firma=0';

            axios.get(url).then(response => {

                me.firma = response.data;


                //if que valida 16 asociados a la tabla firmas para poderlas imprimir
                if (me.firma.length == 16) {
                    console.log("si trae mas")
                        //manda los 20 usuarios a imprimir  UPDATE `firma` SET `estado`=0

                    let url2 = "controller/firmas.php";
                    axios.post(url2, { firmas: me.firma })
                        .then(response1 => {
                            console.log("LISTO")
                                //la variable contador sirve para el correlativo de las hojas de cada 16 firmas
                            me.contador++;
                            //abre una ventana nueva apuntando al otro proyecto de firmas en la cual manda el contador de la pagina
                            window.open('http://10.60.81.213/firmas/print.php?count=' + me.contador, '_blank');
                            // window.open('http://10.60.81.32:81/pdf_firmas/print.php?count=' + me.contador, '_blank');
                            //   window.open('http://10.60.81.32:81/pdf_firmas/print.php?count=' + me.contador, '_blank');
                            //LEVANTO LA URL DE BIENVENIDA
                            me.firma = [];


                        });


                }
            });
        },
    },
    mounted() {

        this.getAsociados();
        let me = this;


        //sirve para estar ejecutandoce a cada 1 seg. que verifica las 16 firmas y va obteniendo los asociados casi en tiempo real
        setInterval(function() {
            me.verificarFirmas();
            me.getAsociados();
            //$('#example1').DataTable();

        }, 1000);


    },


})