<template>
    <app-layout title="Nuevo Cobro">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight"><span style="margin: 20px;"></span>
                Padrón de Comercios
                


                <a :href="route('exportarpadroncomercioxls.index')" target="_blank" class="btn btn-secondary"
                style="margin-left:30px; float:right font-size: 14px !important;">
                <i class="bi bi-file-earmark-excel-fill" style="color:#FFF;"></i>Generar XLS Corte de Caja
                
            </a>

            <a  target="_blank" :href="route('impresionpadrondecomercios.index')" class="btn btn-info"  
                style="margin-left:30px; color: #FFFFFF; float:right font-size: 14px !important;">
                <i class="bi bi-file-earmark-pdf-fill" style="color:#FFF;"></i>Generar PDF Corte de Caja
                
            </a>
                <p style="float:right;">{{ this.fecha }}</p>
            </h2>
        </template>



        <form id="forfecha" name="forfecha" @submit.prevent="">
      <div class="container-fluid">

            <div class="row">

                 
                    <div class="col-md-3" ></div>
                    <div class="col-md-3" style=" padding: 20px; ; background-color: #FFFFFF; border-bottom-left-radius: 20px; "><span >Generar Padrón de Comercio por Fecha</span></div>
                    <div class="col-md-2" style="background-color: #FFFFFF;">
                       
                    
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Fecha inicial</label>
                        <input
                        id="fechainical"
                        v-model="forfecha.fechainicial"
                        type="date"
                         class="form-control"
                       
                           
                           min="2021-01-01" max="2022-12-31"
                        >
                        

                    </div>

                
                </div>
                <div class="col-md-2" style="background-color: #FFFFFF;">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Fecha final</label>
                        <input
                        id="fechafinal"
                        v-model="forfecha.fechafinal"
                        type="date"
                         class="form-control"
                        
                          
                           min="2021-01-01" max="2022-12-31"
                          >
                          <br>
                          
                    </div>
                </div>
               <div class="col-md-2" target="_blank" style="background-color: #FFFFFF;">
                <a target="_blank" class="btn btn-secondary" :href="route('exportarpadroncomercioxls.show',this.forfecha.fechainicial+'.'+this.forfecha.fechafinal)" 
                                            style="margin-top:27px;" 
                                            
                                                ><i style="font-size: 19px;" class="bi bi-file-earmark-excel-fill"></i>
                                         </a>
                <a class="btn btn-info" target="_blank" :href="route('impresionpadrondecomercios.show',forfecha.fechainicial+'.'+forfecha.fechafinal)"
                                            style="margin-top:27px; margin-left:7px;"
                                            
                                                ><i style="font-size: 19px; color: #FFFFFF;" class="bi bi-file-earmark-pdf-fill"></i>
                                         </a>

                
                </div>
                </div>
            </div>
         </form>




    <div class="container-fluid" >
        <div class="container" style="margin-top:25px; margin-right:30px; margin-left:30px; background-color: #FFF; border-radius: 20px; box-shadow:">
            <div class="row">
               <div class="container">
                   <div class="col-md-1">

                   </div>
                   <div class="col-md-8" style="margin: 0 auto;">

                            <div class="row">
                            <form class="container" @submit.prevent="submit" style="margin-top:20px; margin-bottom:20px !important; inset 0 -3em 3em rgba(0,0,0,0.1),
                        0 0  0 2px rgb(255,255,255),
                        0.3em 0.3em 1em rgba(0,0,0,0.3); border:1px solid #c6c6c6 !important; border-top-left-radius: 30px; border-top-right-radius: 30px; ">

<!--aqui empieza el div-->
<div class="row">
                        <div class="alert alert-success" style="border-top-left-radius: 30px; border-top-right-radius: 30px; " role="alert"><br>
                                      <h2 class="alert-heading" style="font-size: 19pt;">Padrón de Comercios</h2>
                                      <p>Llena los campos para hacer el cobro de este padrón de servicios.</p><br>
                                      <hr>
                                      <p class="mb-0">


                                         <a 
                                            style=" margin-top: 7px;" class="btn btn-warning" 
                                                data-bs-toggle="modal" v-on:click="" data-bs-target="#modalComercios"
                                        ><i class="bi bi-eye"></i>
                                        Ver Todos los Registros</a>
                                          


                                        <a :href="route('padrondecomercios.index')"
                                            style=" margin-top: 7px; float: right;" class="btn btn-danger" ><i class="bi bi-clipboard-x"></i> Cancelar </a>
                                        <center style="margin-top:-45px !important;">
                                        
                                        <button class="btn btn-primary"
                                            style="margin-top:7px;" type="submit"
                                                text="Guardar"><i class="bi bi-cloud-upload"></i>
                                         Subir información</button>
                                       
                                    </center>
                                      </p><br>
                                    </div>
</div>
<!--Aqui termina el div del estilo-->


                                <span style="margin-top:50px; margin-bottom:50px;"></span><br>
                                <b>Datos del Comercio</b><br>
                                <div class="row" >

                                    <div class="col-md-4">
                                    <center style="">
                                            <i class="bi bi-file-earmark-fill" style="font-size:40pt; color:#C0392B;"></i>
                                        </center>
                                         <label class="form-label">Registro municipal</label>
                                        <input required id="registromunicipal" v-model="form.registromunicipal" class="form-control" type="text"
                                        aria-label="Ingrese información" >
                                        <label class="form-label">Registro Federal Contribuyente</label>
                                        <input required id="rfc" v-model="form.rfc" class="form-control" type="text"
                                        aria-label="Ingrese información" >
                                    </div>

                                    <div class="col-md-4">
                                    
                                    <label class="form-label">Nombre</label>
                                        <input required id="nombre" v-model="form.nombre" class="form-control" type="text">
                                    <label class="form-label">Apellido Paterno:</label>
                                        <input required id="apellidopaterno" v-model="form.apellidopaterno" class="form-control" type="text">
                                        <label class="form-label">Apellido Materno</label>
                                        <input required id="apellidomaterno" v-model="form.apellidomaterno" class="form-control" type="text">
                                    </div>
                                    <div class="col-md-4">

                                        
                                        <label class="form-label">Domicilio Particular</label>
                                        <input required class="form-control" type="text" id="domicilio" v-model="form.domicilio">
                                        <label class="form-label">Población</label>
                                        <input required class="form-control" type="text" id="poblacion" v-model="form.poblacion">
                                        
                                        <label class="form-label">Giro</label>
                                        <input required class="form-control" type="text" id="giro" v-model="form.giro">
                                    </div>



                                </div><br>
                                    <b></b><br>


                                <div class="row">
                                    <div class="col-md-4">
                                    
                                         <label class="form-label">Razón social</label>
                                        <input id="razonsocial" v-model="form.razonsocial" class="form-control" type="text"
                                        aria-label="Ingrese información" >
                                        <label class="form-label">Domicilio del Negocio</label>
                                        <input required id="domicilionegocio" v-model="form.domicilionegocio" class="form-control" type="text"
                                        aria-label="Ingrese información" >
                                        <label class="form-label">fecha de inicio de operación</label>
                                        <input required id="fechainioperacion" v-model="form.fechainioperacion" class="form-control" type="text">
                                    </div>

                                    <div class="col-md-4">
                                    
                                    
                                    <label class="form-label">Superficie de terreno:</label>
                                        <input required id="superficiedeterreno" v-model="form.superficiedeterreno" class="form-control" type="text">
                                        <label class="form-label">Tipo de Movimiento</label>
                                        <input required id="tipodemovimiento" v-model="form.tipodemovimiento" class="form-control" type="text">
                                        <label class="form-label">Periodo de Pago</label>
                                        <input required class="form-control" type="text" id="periododepago" v-model="form.periododepago">
                                    </div>
                                    <div class="col-md-4">

                                        
                                        
                                        <label class="form-label">Importe</label>
                                        <input required class="form-control" type="number" step="0.01" id="importe" v-model="form.importe">
                                        
                                        <label class="form-label">Horario de Apertura</label>
                                        <input required class="form-control" type="text" id="horarioapertura" v-model="form.horarioapertura">
                                        <label class="form-label">Horario de Cierre</label>
                                                <input required id="horariocierre" v-model="form.horariocierre" class="form-control" type="text">
                                    </div>
                                </div>


                                <div class="row">
                                   
                                     <div class="col-md-3">
                                            

                                    </div>
                                    
                                     
                                </div>

                                    <div class="row">
                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-4"></div>

                                    </div>

                                <div class="row">
                                <div class="col-md-9"></div>
                                <div class="col-md-3">
                                
                                </div>
<br><br>
                                </div>



                            </form>
                        </div>

                   </div>

               </div>
            </div>
        </div>

<!--modal para seleccionar comercio-->
<div class="modal fade" id="modalComercios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-xxl-down">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            
            <table class="table caption-top">
          <caption>Porcentajes de cobro</caption>
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              
              
              <th scope="col">Domicilio</th>
              <th scope="col">Razon social</th>
              <th scope="col">Giro</th>
              <th scope="col">Selección</th>
              
            </tr>
          </thead>
          <tbody>
            <tr  v-for="comercio in arrayDBTableComercios" :key="comercio.id_padron_comercios">
              <th scope="row">{{ comercio.nombre+" "+comercio.apellidopaterno+" "+comercio.apellidomaterno }}</th>
              
              
              <td>{{ comercio.domicilio }}</td>
              <td>{{ comercio.razonsocial }}</td>
              <td>{{ comercio.giro }}</td>

              <td>
                  <input class="form-check-input required" type="checkbox" :id='comercio.id_padron_comercios' @change="checado(check,$event)"
                  v-model="check" :value="comercio.id_padron_comercios">
                  <label class="form-check-label" for="flexCheckDefault"> 
                  </label>
              </td>
              
            </tr>
           

            <p hidden="true">{{ check }}</p>
            
            


          </tbody>
        </table>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<!-- fin del modal para seleccionar comercio-->








    </div>




</app-layout>
</template>
<script>
    import AppLayout from '@/Layouts/AppLayout';



    export default {

        components: {
            AppLayout
            },

        props: ['arrayCatalogo','date','arrayDBTableComercios'],
        data(){
           return{

            forfecha:{
                fechainicial:null,
                fechafinal:null,
            },
                form:{
                    registromunicipal:null,
                    rfc:null,
                    nombre:null,
                    apellidopaterno:null,
                    apellidomaterno:null,
                    domicilio:null,
                    poblacion:null,
                    giro:null,
                    razonsocial:null,
                    domicilionegocio:null,
                    fechainioperacion:null,
                    superficiedeterreno:null,
                    tipodemovimiento:null,
                    periododepago:null,
                    importe:null,
                    horarioapertura:null,
                    horariocierre:null,
                },
                
                fecha:this.$props.date,
                check:[],
           }
        },
        methods:{
            submit(){
                this.$inertia.post(route('padrondecomercios.store'),this.form);
            },

            checado(check,event){
                if(event.target.checked==true){
                    /*this.index = (check[check.length-1]-1)+1+"";
                    this.elemento = document.getElementById(this.index);
                    this.porcentajeAplicado=this.$props.arrayRecargos[check[check.length-1]-1].porciento;
                    
                    this.recargosTotales= this.recargosTotales+((this.porcentajeAplicado*this.form.importe)/100);
                    
                    */
                    this.form.nombre = this.$props.arrayDBTableComercios[check[check.length-1]-1].nombre;

                    this.form.apellidopaterno = this.$props.arrayDBTableComercios[check[check.length-1]-1].apellidopaterno;

                    this.form.apellidomaterno = this.$props.arrayDBTableComercios[check[check.length-1]-1].apellidomaterno;

                    this.form.rfc = this.$props.arrayDBTableComercios[check[check.length-1]-1].rfc;

                    this.form.domicilio = this.$props.arrayDBTableComercios[check[check.length-1]-1].domicilio;

                    this.form.poblacion = this.$props.arrayDBTableComercios[check[check.length-1]-1].poblacion;

                    this.form.giro = this.$props.arrayDBTableComercios[check[check.length-1]-1].giro;

                    this.form.razonsocial = this.$props.arrayDBTableComercios[check[check.length-1]-1].razonsocial;

                    this.form.superficiedeterreno = this.$props.arrayDBTableComercios[check[check.length-1]-1].superficiedeterreno;

                    this.form.domicilionegocio = this.$props.arrayDBTableComercios[check[check.length-1]-1].domicilionegocio;

                    this.form.horarioapertura = this.$props.arrayDBTableComercios[check[check.length-1]-1].horarioapertura;

                    this.form.horariocierre = this.$props.arrayDBTableComercios[check[check.length-1]-1].horariocierre;

               }if(event.target.checked==false){
                var errorsClear = document.getElementById("limpiar");
                  errorsClear.style.display='block';

                    
               }
            }



        }



        }
</script>
