var app = new Vue({

    el: '#app',
    data: {
        asociado: [],
        cif: '',
        dpi: '',
        nombre: '',
        //  buscarpor: 1,
        messageBuscar: '',
        alertnoasociado: 0,
        derecho: '',
    },
    //alertaasociado 1 = no esta , 0 = entra , 2 = no estra ir a informacion
    methods: {
        buscar() {
            this.alertnoasociado = 0;
            let url = 'controller/search.php?';
            if (!this.cif.length) {

                if (!this.dpi.length) {

                    if (!this.nombre.length) {
                        this.messageBuscar = 'DEBE DE LLENAR UN CAMPO REQUERIDO';
                        return;
                    } else {
                        url += 'nombre=' + this.nombre.toLowerCase();
                    }

                } else {
                    url += 'dpi=' + this.dpi;
                }
                //       }

            } else {
                url += 'cif=' + this.cif;
            }

            //    }
            //limpia los datos
            this.messageBuscar = '';
            //    this.buscarpor = 1;
            this.nombre = '';
            this.cif = '';
            this.dpi = '';

            axios.get(url).then(response => {
                app.asociado = response.data;
                if (app.asociado.length) {

                } else {
                    //si el asociado no exite
                    app.alertnoasociado = 1;
                }
            })
        },
        ingresar(id) {

            let url = 'controller/search.php?id=' + id;
            axios.get(url).then(response => {
                app.asociado = [];
            });
        },
    },
    mounted() {

    },


})