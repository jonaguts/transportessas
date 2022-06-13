
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="resources/css/style.css">
 
</head>
<body>
  <div id="app">
    <v-app>
      <v-main>      
       <v-flex class="text-center align-center">
        <div>
        <v-btn href="resources/views/conductores.php" class="mx-2 mt-4" fab dark color="#00B0FF">Formulatio Conductores</v-btn>
      </div>
      <div>
        <v-btn href="resources/views/supervisores.php" class="mx-2 mt-4" fab dark color="#00B0FF">Formulatio Supervisores</v-btn>
      <div>
      <div>
        <v-btn href="resources/views/vehiculos.php" class="mx-2 mt-4" fab dark color="#00B0FF">Formulatio Vehiculos</v-btn>
      <div>
      <div>
        <v-btn href="resources/views/paises.php" class="mx-2 mt-4" fab dark color="#00B0FF">Formulatio Paises</v-btn>
      <div>
      <div>
        <v-btn href="resources/views/ciudades.php" class="mx-2 mt-4" fab dark color="#00B0FF">Formulatio Ciudades</v-btn>
      <div>
       </v-flex>              
      </v-main>
    </v-app>    
  </div> 
</body>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vuetify/2.5.7/vuetify.min.js" integrity="sha512-BPXn+V2iK/Zu6fOm3WiAdC1pv9uneSxCCFsJHg8Cs3PEq6BGRpWgXL+EkVylCnl8FpJNNNqvY+yTMQRi4JIfZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="sweetalert2.all.min.js"></script>



<script>
let url = 'http://localhost:8000/api/supervisors/';
    new Vue({
      el: '#app',  
      vuetify: new Vuetify(),
      data() {
        return {            
            Supervisors: [],
            dialog: false,
            operacion: '',            
            Supervisor:{
                id: null,
                nombre:''
            }          
        }
      },
      created(){               
            this.mostrar()
      },  
      methods:{          
            //MÉTODOS PARA EL CRUD
            mostrar:function(){
              axios.get(url)
              .then(response =>{
                this.Supervisors = response.data;                   
              })
            },
            crear:function(){
                let parametros = {nombre:this.Supervisor.nombre};                
                axios.post(url, parametros)
                .then(response =>{
                  this.mostrar();
                });     
                this.Supervisor.nombre="";
              
            },                        
            editar: function(){
            let parametros = {nombre:this.Supervisor.nombre, id:this.Supervisor.id};                            
            //console.log(parametros);                   
                axios.put(url+this.Supervisor.id, parametros)                            
                  .then(response => {                                
                    this.mostrar();
                  })                
                  .catch(error => {
                      console.log(error);            
                  });
            },
            
            borrar:function(id){
            Swal.fire({
                title: '¿Confirma eliminar el registro?',   
                confirmButtonText: `Confirmar`,                  
                showCancelButton: true,                          
              }).then((result) => {                
                if (result.isConfirmed) {      
                      //procedimiento borrar
                      axios.delete(url+id)
                      .then(response =>{           
                          this.mostrar();
                      });      
                      Swal.fire('¡Eliminado!', '', 'success')
                } else if (result.isDenied) {                  
                }
              });              
            },

            //Botones y formularios
            guardar:function(){
              miCampoTexto = document.getElementById("nombre").value;
              if(miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)){
                alert('Todos los campos son obligatorios!');
                return false;
              }
            
              else{
              if(this.operacion=='crear'){
                this.crear();                
              }
              if(this.operacion=='editar'){ 
                this.editar();                           
              }
              this.dialog=false; 
            }                       
            }, 
            formNuevo:function () {
              this.dialog=true;
              this.operacion='crear';
              this.Supervisor.nombre="";
            
            },
            formEditar:function(id, nombre){
              //capturamos los datos del registro seleccionado y los mostramos en el formulario
              this.Supervisor.id = id;
              this.Supervisor.nombre = nombre;                            
                                  
              this.dialog=true;                            
              this.operacion='editar';
            }
          
      }      
    });
  </script>

</body>
</html> 