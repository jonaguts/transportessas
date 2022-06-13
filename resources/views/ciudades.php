
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
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <div id="app">
    <v-app>
      <v-main>   
       <v-flex class="text-center align-center">
       <v-btn class="mx-2 mt-4"  fab dark color="#00B0FF" @click="formNuevo();mostrar();"><v-icon dark>mdi-plus</v-icon></v-btn>           
       </v-flex>              
        <v-card class="mx-auto mt-5" color="transparent" max-width="1380" elevation="10">                    
        <v-simple-table class="mt-5">
            <template v-slot:default>
                <thead>
                    <tr class="indigo darken-4">
                        <th class="white--text ">ID</th>
                        <th class="white--text ">NOMBRE</th>
                        <th class="white--text ">PAIS</th>
                        <th class="white--text text-center">ACCIONES</th>
                        
                    </tr>
                  
                </thead>
                <tbody>
                    <tr v-for="Ciudad in ciudades" :key="Ciudad.id">
                    <td>{{ Ciudad.id }}</td>
                    <td>{{ Ciudad.ciudads_nombre }}</td>
                    <td>{{ Ciudad.pais_id }}</td>
                    <td class="text-center">
                        <v-btn fab dark color="#00BCD4" small @click="formEditar(Ciudad.id,Ciudad.ciudads_nombre,Ciudad.pais_id)"><v-icon>mdi-pencil</v-icon></v-btn>
                        <v-btn fab dark color="#E53935" small @click="borrar(Ciudad.id)"><v-icon>mdi-delete</v-icon></v-btn>
                    </td>
                    </tr>
                </tbody>
            </template>
        </v-simple-table>
        </v-card>    
      <v-dialog v-model="dialog" max-width="900">        
        <v-card>
          <v-card-title class="blue darken-2 white--text">Ciudad</v-card-title>    
          <v-card-text> 
            <v-form>             
              <v-container>
                <v-row>
                  <input v-model="Ciudad.id" id="id" hidden></input>
                  <v-col cols="24" md="4">
                    <v-text-field v-model="Ciudad.ciudads_nombre" :rules="[v => !!v || 'El campo nombre es obligatorio!']" id="nombre" label="nombre" required>{{Ciudad.ciudads_nombre}}</v-text-field>
                  </v-col>
                  <v-col cols="24" md="4">
                    <v-text-field v-model="Ciudad.pais_id" :rules="[v => !!v || 'El campo pais es obligatorio!']" id="pais" label="pais" type="number" required>{{Ciudad.pais_id}}</v-text-field>
                  </v-col>
                </v-row>
              </v-container>            
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            
            <v-btn @click="dialog=false" color="blue-grey" dark>Cancelar</v-btn>
            <v-btn @click="guardar()" type="submit" id="submit" color="blue darken-2" dark>Guardar</v-btn>
          </v-card-actions>
          </v-form>
        </v-card>
      </v-dialog>

      </v-main>
    </v-app>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vuetify/2.5.7/vuetify.min.js" integrity="sha512-BPXn+V2iK/Zu6fOm3WiAdC1pv9uneSxCCFsJHg8Cs3PEq6BGRpWgXL+EkVylCnl8FpJNNNqvY+yTMQRi4JIfZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../../sweetalert2.all.min.js"></script>

  
<script>
let url = 'http://localhost:8000/api/ciudades/';
new Vue({
  el: '#app',  
  vuetify: new Vuetify(),
   data() {
    return {            
        ciudades: [],
        dialog: false,
        operacion: '',            
        Ciudad:{
          id: null,
          ciudads_nombre:'',
          pais_id:''
        }          
    }
   },
   
   created(){               
        this.mostrar()
   },  
   methods:{          
        mostrar:function(){
          axios.get(url)
          .then(response =>{
            this.ciudades = response.data;                   
          })
        },
        crear:function(){
            let parametros = {nombre:this.Ciudad.ciudads_nombre, pais:this.Ciudad.pais_id};                
            axios.post(url, parametros)
            .then(response =>{
              this.mostrar();
            });     
            this.Ciudad.ciudads_nombre="";
            this.Ciudad.pais_id="";
        },                        
        editar: function(){
        let parametros = {nombre:this.Ciudad.ciudads_nombre, pais:this.Ciudad.pais_id,id:this.Ciudad.id};                 
             axios.put(url+this.Ciudad.id, parametros)                            
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
                  axios.delete(url+id)
                  .then(response =>{           
                      this.mostrar();
                   });      
                  Swal.fire('¡Eliminado!', '', 'success')
            } else if (result.isDenied) {                  
            }
          });              
        },
        guardar:function(){
          miCampoTexto = document.getElementById("nombre").value;
          if(miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)){
            alert('Todos los campos son obligatorios!');
            return false;
          }
          miCampoTexto = document.getElementById("pais").value;
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
          this.Ciudad.ciudads_nombre="";
          this.Ciudad.pais_id="";
         
        },
        formEditar:function(id, nombre, pais){
          this.Ciudad.id = id;
          this.Ciudad.ciudads_nombre = nombre;                            
          this.Ciudad.pais_id = pais;                 
          this.dialog=true;                            
          this.operacion='editar';
        },        
      }      
  });
  </script>
</body>
</html> 