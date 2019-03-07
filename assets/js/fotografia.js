/**
 * Desarrollado por Dany Diaz
 * Desarrollador Web
 */
var app = new Vue({

    el: '#app',
    data: {
        //datos del asociado
        asociados: [],

        //id del asociado
        id_asociado: 0,

        //datos del asociado
        asociado: [],
        nombre: '',
        id_socio: 0,
        derecho: '',
        foto: ''
    },

    methods: {
        //muestra los asociados en el estado para tomarse la foto
        getAsociados() {
            let url = 'controller/search.php?mostrando=listo';
            axios.get(url).then(response => {
                app.asociados = response.data;
            });
        },
        cargar(id) {
            this.id_asociado = id;
            let url = 'controller/search.php?mostrandoAsociado=' + id;
            axios.get(url).then(response => {
                app.asociado = response.data;
                app.nombre = app.asociado[0].nombre;
                app.id_socio = app.asociado[0].id;
                app.derecho = app.asociado[0].derecho;
            });
            this.foto = '';
        },
        cerrarModal() {
            console.log("cerrando")
            this.id_asociado = 0;
            this.foto = '';
        },
        siguiente(id) {
            var image2 = document.getElementById('image').files[0];

            $("#exampleModal").modal('hide');
            let url = 'controller/foto.php';
            // axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
            axios.post(url, {
                foto: image2,
                id: id
            }).then(response => {
                console.log(response.data)
            });
        },
        getImage(e) {

            let image = e.target.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(image);
            reader.onload = e => {
                this.foto = e.target.result;
            }
            this.loaded = true;
        }

    },
    mounted() {


        // this.getAsociados();

        setInterval(function() {
            app.getAsociados();

        }, 500);
        setTimeout(function() {
            $('#example').DataTable();
        }, 1000);


    },


})