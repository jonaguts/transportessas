
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
       <v-btn class="mx-2 mt-4"  fab dark color="#00B0FF" @click="formNuevo()"><v-icon dark>mdi-plus</v-icon></v-btn>           
       </v-flex>              
         
        <v-card class="mx-auto mt-5" color="transparent" max-width="1380" elevation="10">  
        <v-simple-table class="mt-5">
            <template v-slot:default>
                <thead>
                    <tr class="indigo darken-4">
                        <th class="white--text">ID</th>
                        <th class="white--text">NOMBRE</th>
                        <th class="white--text">APELLIDO</th>
                        <th class="white--text">IDENTIFICACION</th>
                        <th class="white--text text-center">DIRECCION</th>
                        <th class="white--text text-center">TELEFONO</th>
                        <th class="white--text text-center">CIUDAD DE NACIMIENTO</th>
                        <th class="white--text text-center">PAIS DE NACIMIENTO</th>
                        <th class="white--text text-center">SUPERVISOR</th>
                        <th class="white--text text-center">ACCIONES</th>
                        
                    </tr>
                  
                </thead>
                <tbody>
                    <tr v-for="Conductor in conductors" :key="Conductor.id">
                    <td>{{ Conductor.id }}</td>
                    <td>{{ Conductor.conductors_nombre }}</td>
                    <td>{{ Conductor.conductors_apellido }}</td>
                    <td>{{ Conductor.conductors_identificacion }}</td>
                    <td>{{ Conductor.conductors_direccion }}</td>
                    <td>{{ Conductor.conductors_telefono }}</td>
                    <td>{{ Conductor.ciudads_id }}</td>
                    <td>{{ Conductor.pais_id }}</td>
                    <td>{{ Conductor.supervisors_id }}</td>
                    <td>
                        <v-btn fab dark color="#00BCD4" small @click="formEditar(Conductor.id,Conductor.conductors_nombre,Conductor.conductors_apellido,Conductor.conductors_identificacion,Conductor.conductors_direccion,Conductor.conductors_telefono,Conductor.ciudads_id,Conductor.pais_id,Conductor.supervisors_id)"><v-icon>mdi-pencil</v-icon></v-btn>
                        <v-btn fab dark color="#E53935" small @click="borrar(Conductor.id)"><v-icon>mdi-delete</v-icon></v-btn>
                    </td>
                    </tr>
                </tbody>
            </template>
        </v-simple-table>
        </v-card>        
      <v-dialog v-model="dialog" max-width="900">        
        <v-card>
          <v-card-title class="blue darken-2 white--text">Conductor</v-card-title>    
          <v-card-text> 
            <v-form>             
              <v-container>
          
                <v-row>
                  <input v-model="Conductor.id" id="id" hidden></input>
                  <v-col cols="24" md="4">
                    <v-text-field v-model="Conductor.conductors_nombre" :rules="[v => !!v || 'El campo nombre es obligatorio!']" id="nombre" label="nombre" required>{{Conductor.conductors_nombre}}</v-text-field>
                  </v-col>
                  <v-col cols="24" md="4">
                    <v-text-field v-model="Conductor.conductors_apellido" :rules="[v => !!v || 'El campo apellido es obligatorio!']" id="apellido" label="apellido" required>{{Conductor.conductors_apellido}}</v-text-field>
                  </v-col>
                  <v-col cols="24" md="4">
                    <v-text-field v-model="Conductor.conductors_identificacion" :rules="[v => !!v || 'El campo identificacion es obligatorio!']"  id="identificacion" label="identificacion" type="number" required>{{Conductor.conductors_identificacion}}</v-text-field>
                  </v-col>
                  <v-col cols="24" md="4">
                    <v-text-field v-model="Conductor.conductors_direccion" :rules="[v => !!v || 'El campo direccion es obligatorio!']" id="direccion" label="direccion" required>{{Conductor.conductors_direccion}}</v-text-field>
                  </v-col>
                  <v-col cols="24" md="4">
                    <v-text-field v-model="Conductor.conductors_telefono" :rules="[v => !!v || 'El campo telefono es obligatorio!']" id="telefono" label="telefono" type="number" srequired>{{Conductor.conductors_telefono}}</v-text-field>
                  </v-col>
                  <v-col cols="24" md="4">
                    <v-text-field v-model="Conductor.pais_id" :rules="[v => !!v || 'El campo pais de nacimiento es obligatorio!']" id="pais" label="pais de nacimiento" type="number" required>{{Conductor.pais_id}}</v-text-field>
                  </v-col>
                  <v-col cols="24" md="4">
                    <v-text-field v-model="Conductor.ciudads_id" :rules="[v => !!v || 'El campo ciudad de nacimiento es obligatorio!']" id="ciudad" label="ciudad de nacimiento" type="number" required >{{Conductor.ciudads_id}}</v-text-field>
                  </v-col>
                  <v-col cols="24" md="4">
                  <v-text-field v-model="Conductor.supervisors_id" :rules="[v => !!v || 'El campo supervisor es obligatorio!']" id="supervisor" label="supervisor" type="number" required>{{Conductor.supervisors_id}}</v-text-field>
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
let url = 'http://localhost:8000/api/conductors/';
new Vue({
  el: '#app',  
  vuetify: new Vuetify(),
   data() {
    return {            
        conductors: [],
        dialog: false,
        operacion: '',            
        Conductor:{
          id: null,
          conductors_nombre:'',
          conductors_apellido:'',
          conductors_identificacion:'',
          conductors_direccion:'',
          conductors_telefono:'',
          ciudads_id:'',
          pais_id:'',
          supervisors_id:''
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
            this.conductors = response.data;                   
          })
        },
        crear:function(){
            let parametros = {nombre:this.Conductor.conductors_nombre, apellido:this.Conductor.conductors_apellido,identificacion:this.Conductor.conductors_identificacion,direccion:this.Conductor.conductors_direccion,telefono:this.Conductor.conductors_telefono,ciudad:this.Conductor.ciudads_id,pais:this.Conductor.pais_id,supervisor:this.Conductor.supervisors_id};                
            axios.post(url, parametros)
            .then(response =>{
              this.mostrar();
            });     
            this.Conductor.conductors_nombre="";
            this.Conductor.conductors_apellido="";
            this.Conductor.conductors_identificacion="";
            this.Conductor.conductors_direccion="";
            this.Conductor.conductors_telefono="";
            this.Conductor.ciudads_id="";
            this.Conductor.pais_id="";
            this.Conductor.supervisors_id="";
        },                        
        editar: function(){
        let parametros = {nombre:this.Conductor.conductors_nombre, apellido:this.Conductor.conductors_apellido,identificacion:this.Conductor.conductors_identificacion,direccion:this.Conductor.conductors_direccion,telefono:this.Conductor.conductors_telefono,ciudad:this.Conductor.ciudads_id,pais:this.Conductor.pais_id,supervisor:this.Conductor.supervisors_id,id:this.Conductor.id};                                         
             axios.put(url+this.Conductor.id, parametros)                            
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
          miCampoTexto = document.getElementById("apellido").value;
          if(miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)){
            alert('Todos los campos son obligatorios!');
            return false;
          }
          miCampoTexto = document.getElementById("identificacion").value;
          if(miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)){
            alert('Todos los campos son obligatorios!');
            return false;
          }
          miCampoTexto = document.getElementById("direccion").value;
          if(miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)){
            alert('Todos los campos son obligatorios!');
            return false;
          }
          miCampoTexto = document.getElementById("telefono").value;
          if(miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)){
            alert('Todos los campos son obligatorios!');
            return false;
          }
          miCampoTexto = document.getElementById("ciudad").value;
          if(miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)){
            alert('Todos los campos son obligatorios!');
            return false;
          }
          miCampoTexto = document.getElementById("pais").value;
          if(miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)){
            alert('Todos los campos son obligatorios!');
            return false;
          }
          miCampoTexto = document.getElementById("supervisor").value;
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
          this.Conductor.conductors_nombre="";
          this.Conductor.conductors_apellido="";
          this.Conductor.conductors_identificacion="";
          this.Conductor.conductors_direccion="";
          this.Conductor.conductors_telefono="";
          this.Conductor.ciudads_id="";
          this.Conductor.pais_id="";
          this.Conductor.supervisors_id="";
        },
        formEditar:function(id, nombre, apellido, identificacion, direccion, telefono, ciudad, pais, supervisor){
          this.Conductor.id = id;
          this.Conductor.conductors_nombre = nombre;                            
          this.Conductor.conductors_apellido = apellido;
          this.Conductor.conductors_identificacion = identificacion;
          this.Conductor.conductors_direccion = direccion;  
          this.Conductor.conductors_telefono = telefono;  
          this.Conductor.ciudads_id = ciudad; 
          this.Conductor.pais_id = pais;   
          this.Conductor.supervisors_id = supervisor;                        
          this.dialog=true;                            
          this.operacion='editar';
        },   
             
      }      
  });
  </script>

</body>
</html> 