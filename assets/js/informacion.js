var app = new Vue({

    el: '#app',
    data: {
        asociado: [],
        cifInfo: '',
        nombreInfo: '',
        dpiInfo: '',
        buscarpor: 1,
        messageBuscar: '',
        alertnoasociado: 0,
    },
    //alertaasociado 1 = no esta , 0 = entra , 2 = no estra ir a informacion
    methods: {
        buscar() {
            this.alertnoasociado = 0;
            let url = 'controller/search.php?';
            //buscar por cif
            if (!this.cifInfo.length) {

                if (!this.dpiInfo.length) {

                    if (!this.nombreInfo.length) {
                        this.messageBuscar = 'DEBE DE LLENAR UN CAMPO REQUERIDO';
                        return;
                    } else {
                        url += 'nombreInfo=' + this.nombreInfo.toLowerCase();
                    }

                } else {
                    url += 'dpiInfo=' + this.dpiInfo;
                }
                //       }

            } else {
                url += 'cifInfo=' + this.cifInfo;
            }


            //limpia los datos
            console.log("URL :: " + url)
            this.messageBuscar = '';
            this.buscarpor = 1;
            this.nombreInfo = '';
            this.cifInfo = '';
            this.dpiInfo = '';

            axios.get(url).then(response => {
                console.log(response.data)
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

                if (response.data.error == "NO") {
                    console.log("vaciar")
                    app.asociado = [];

                } else {
                    alert("Algo salio mal")
                }
            });
        },
    },
    mounted() {

    },


})