<template>
    <app-layout title="Nuevo Cobro">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight"><span style="margin: 20px;"></span>
                Nuevo Cobro Diverso
              
            <a :href="route('exportarhoy.index')" target="_blank" class="btn btn-secondary"
                style="margin-left:30px; float:right font-size: 14px !important;">
                <i class="bi bi-file-earmark-excel-fill" style="color:#FFF;"></i>Generar XLS Corte de Caja
                
            </a>

            <a  target="_blank" :href="route('impresiondecobros.index')" class="btn btn-info"  
                style="margin-left:30px; color: #FFFFFF; float:right font-size: 14px !important;">
                <i class="bi bi-file-earmark-pdf-fill" style="color:#FFF;"></i>Generar PDF Corte de Caja
                
            </a>

            <a  target="_blank" :href="route('consultarcobro.index')" class="btn btn-info"  
                style="margin-left:30px; color: #FFFFFF; float:right !important; font-size: 16px !important;">
                <i class="bi bi-search" style="color:#FFF;"></i> Consulta por Nombre
                
            </a>

            </h2>
            
          

        </template>
<div class="" style="position: fixed; right: 0px; bottom: 0px; z-index:10000; margin-bottom: 70px; "> 

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Folios Disponibles
</button>



</div>

    <div class="alert alert-success" style="position: fixed; right: 0px; bottom: 0px; z-index:10000; padding: 10px; "> 

        <label style="font-size: 15px; ">Siguiente Folio Obligatorio <b>{{ this.$props.nuevoCode }}</b></label>

    </div>
    <form id="forfecha" name="forfecha" @submit.prevent="">
      <div class="container-fluid">

            <div class="row">

                 
                    <div class="col-md-3" ></div>
                    <div class="col-md-3" style=" padding: 20px; ; background-color: #FFFFFF; border-bottom-left-radius: 20px; "><span >Generar Diario de Cobros Diversos por Fecha</span></div>
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
                <a target="_blank" class="btn btn-secondary" :href="route('exportadordiariosfecha.show',forfecha.fechainicial+'.'+forfecha.fechafinal)" 
                                            style="margin-top:27px;" 
                                            
                                                ><i style="font-size: 19px;" class="bi bi-file-earmark-excel-fill"></i>
                                         </a>
                <a class="btn btn-info" target="_blank" :href="route('impresiondecobros.show',forfecha.fechainicial+'.'+forfecha.fechafinal)"
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
                            <form class="container" @submit.prevent="" style="margin-top:20px;
                             margin-bottom:20px !important; inset 0 -3em 3em rgba(0,0,0,0.1),
                        0 0  0 2px rgb(255,255,255),
                        0.3em 0.3em 1em rgba(0,0,0,0.3); border:1px solid #c6c6c6 !important; border-top-left-radius: 30px; border-top-right-radius: 30px; ">

                                <div class="row" >
                                    <div class="alert alert-success" style="border-top-left-radius: 30px; border-top-right-radius: 30px; " role="alert"><br>
                                      <h2 class="alert-heading" style="font-size: 19pt;"><b>MUNICIPIO DE ACULCO H AYUNTAMIENTO CONSTITUCIONAL</b></h2>
                                      <p>Ingresa todos los campos, son necesarios para tener tu control de registro mensual.</p><br>
                                      <hr>
                                      <p class="mb-0">


                                         <a 
                                            style=" margin-top: 7px;" class="btn btn-warning" 
                                                data-bs-toggle="modal" v-on:click="verRecibo()" data-bs-target="#modalRegistro"
                                        ><i class="bi bi-eye"></i>
                                        Ver Registro</a>
                                          


                                        <a :href="route('nuevocobrodiverso.index')"
                                            style=" margin-top: 7px; float: right;" class="btn btn-danger" ><i class="bi bi-clipboard-x"></i> Nuevo </a>
                                        <center style="margin-top:-45px !important;">
                                        
                                         <div v-if="this.verdadBotonSubir==true">

                                        <button class="btn btn-primary"
                                            style="margin-top:7px;" type="submit"
                                            @click="submit"
                                                text="Guardar"><i class="bi bi-cloud-upload"></i>
                                         Subir información</button>
                                       </div>

                                       <div v-if="this.verdadBotonSubir==false">   
                                        <a :href="route('imprimirrecibo.show',this.form.recibo)" 
                                        class="btn btn-success"
                                        style="margin-top:7px;"
                                        target="_blank" 
                                           ><i class="bi bi-printer"></i>
                                         Imprimir Recibo</a>
                                         <a 

                                         type="submit"
                                            @click="submit" 
                                        class="btn btn-info"
                                        style="margin-top:7px; margin-left: 10px;"
                                       
                                           ><i class="bi bi-arrow-clockwise"></i>
                                         Actualizar</a>
                                         <a  
                                        class="btn btn-danger"
                                        style="margin-top:7px; margin-left: 10px;"
                                        @click.prevent="eliminarCampos()"
                                        data-bs-toggle="modal" data-bs-target="#eliminarRegistro"
                                           ><i class="bi bi-x-lg"></i>
                                         Borrar</a>

                                       </div>

                                    </center>
                                      </p><br>
                                    </div>
                                </div>



                            <br>
                                <b style="font-size:16px;">Datos del Recibo</b><br>
                                <div class="row" >

                                    <div class="col-md-3">
                                        <div v-if="this.$props.nuevoCode == 375013">
                                    <center style="margin:0 auto;">
                                            <img src="/images/nuevo.jpg" height="180" width="180">
                                        </center>
                                         <label class="form-label"><b>Número de Recibo</b></label>
                                        <input v-on:keydown.enter.prevent="consultarRecibo(form.recibo,form.numerocuenta)" id="recibo"  v-model="form.recibo" class="form-control" type="text"
                                        aria-label="Ingrese información" >
                                        </div>
                                       <div v-if="this.$props.nuevoCode > 375013">
                                    <center style="margin:0 auto;">
                                            <img src="/images/nuevo.jpg" height="180" width="180">
                                        </center>
                                         <label class="form-label"><b>Número de Recibo</b></label>
                                        <input v-on:keydown.enter.prevent="consultarRecibo(form.recibo,form.numerocuenta)" id="recibo" v-model="form.recibo" class="form-control" type="text"
                                        aria-label="Ingrese información" >
                                        </div>
                                         <div class="row"> 
                                            <div class="col-md-12">
                                                <label class="form-label">Periodo de Pago</label>
                                                    <input v-on:keydown.enter.prevent="" id="periodo" v-model="form.periodo" class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                    <label class="form-label"><b>Nombre</b></label>
                                        <input v-on:keydown.enter.prevent="" id="nombre" v-model="form.nombre" class="form-control" type="text"
                                        aria-label="Ingrese información" >
                                    <label class="form-label"><b>Domicilio</b></label>
                                        <input v-on:keydown.enter.prevent="" id="domicilio" v-model="form.domicilio" class="form-control" type="text">
                                   
                                   <div class="form-control" style="margin-top:10px !important; ;padding-bottom: 15px !important;">
                                    <div class="row">
                                         <label class="form-label"><b>Activar RFC</b></label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <input class="form-check-input" type="checkbox"
                                             v-on:keydown.enter.prevent="" 
                                                @change="activarRFC($event)"
                                                >
                                        </div>
                                        <div class="col-md-8">
                                          <div v-if="this.enabledRFC==true">  
                                            <input v-on:keydown.enter.prevent=""  id="rfc"
                                            v-model="form.rfc"
                                            class="form-control" type="text">
                                          </div>
                                          

                                        </div>
                                           
                                    </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label"><b>Clave Catastral</b></label>
                                            <input v-on:keydown.enter.prevent=""  id="clavecat"
                                            v-model="form.clavecat"
                                            class="form-control" type="text">
                                            </div>

                                          </div> 
                                    </div>
                                    <div class="col-md-5">
                                       <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label"><b>Cuenta Recibo</b></label>
                                            <input v-on:keydown.enter.prevent=""  id="cuentaRecibo"
                                            v-model="form.cuentaRecibo"
                                            class="form-control" type="text">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleFormControlInput1" class="form-label"><b>Fecha de reg.</b></label>
                                                <input
                                                id="fecha"
                                                v-model="form.fecha"
                                                
                                                type="date"
                                                 class="form-control"
                                               
                                                   
                                                >
                                            </div>
                                          </div> 
                                        <div class="row">
                                            <div class="col-md-6">
                                               
                                                    <label class="form-label"><b>Selecciona la cuenta</b></label>
                                                    <select class="form-control" v-on:click="refreshNumeroCuenta()" id="nombrecuenta" v-model="form.nombrecuenta">
                                                        <option  v-for="catalogo in arrayCatalogo"
                                                        :key="catalogo.id_cuenta" :v-bind:value="catalogo.nombrecuenta">
                                                            {{ catalogo.nombrecuenta }}
                                                        </option>
                                                    </select>

                                                
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label"><b>Número de Cuenta</b></label>
                                                    <input  v-on:keydown.enter.prevent="consultarCuenta(form.numerocuenta)" v-on:click="borrarSelectCuentas()" id="numerocuenta" v-model="form.numerocuenta" class="form-control">

                                                    
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label"><b>Nombre Cuenta</b></label>
                                                    <input v-on:keydown.enter.prevent="" id="nombrecuenta2" 
                                                    v-model="form.nombrecuenta2" class="form-control" readonly>
                                                    
                                                    <label class="form-label"><b>Por Concepto de:</b></label>
                                                    <textarea id="concepto" rows="1" v-model="form.concepto" class="form-control" style="height: 58px;"></textarea>

                                             </div>

                                        </div>


                                    </div>



                                </div><br>
                                    <b>Datos sobre la liquidación del Recibo</b><br>


                                <div class="row">
                                    <div class="col-md-3">
                                          <label class="form-label"><b>Importe</b></label>
                                            <input v-on:keydown.enter.prevent="" id="importe" v-model="form.importe" class="form-control" step="0.01" type="number">
                                    </div>
                                     <div class="col-md-3">
                                            <label class="form-label"><b>Rezagos</b></label>
                                                <input v-on:keydown.enter.prevent="" id="rezagos" step="0.01" v-model="form.rezagos" class="form-control" type="number">

                                    </div>
                                     <div class="col-md-3">
                                            <label class="form-label"><b>IVA</b></label>
                                                <input v-on:keydown.enter.prevent="" id="iva" v-model="form.iva" class="form-control" step="0.01" type="number">

                                    </div>
                                     <div class="col-md-3">
                                         <label class="form-label"><b>Recargos</b></label>
                                            <input v-on:keydown.enter.prevent="" id="recargos" v-model="form.recargos"  data-bs-toggle="modal" step="0.01" data-bs-target="#calcularRecargos" class="form-control" type="number">

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-3">
                                          <label class="form-label"><b>Ejecución</b></label>
                                            <input v-on:keydown.enter.prevent="" id="ejecucion" v-model="form.ejecucion" class="form-control" step="0.01" type="number">
                                    </div>
                                     <div class="col-md-3">
                                            <label class="form-label"><b>Multa</b></label>
                                                <input v-on:keydown.enter.prevent="" id="multa" v-model="form.multa" class="form-control" step="0.01" type="number">

                                    </div>
                                     <div class="col-md-3">
                                            <label class="form-label"><b>Descuento</b></label>
                                                <input v-on:keydown.enter.prevent="" id="descuento" v-model="form.descuento" step="0.01" class="form-control" type="number">

                                    </div>
                                     <div class="col-md-3"><br>
                                        <b><label class="form-label"><b>Total:</b></label></b>
                                                <input id="total" step="0.01" v-model="form.total" class="form-control" type="hidden">

                                                <input id="iduser" v-model="form.iduser" class="form-control" type="hidden">

                                                <input v-on:keydown.enter.prevent="" id="valoracion" step="0.01" v-model="form.valoracion" class="form-control" type="hidden">


                                                <br><b><span style="font-size:27px;  color:blue;">$
                                                {{ this.totalone }}</span></b><br>
                                        <a class="btn btn-success"  v-on:click="calcular()" >Calcular Total</a>
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

                                </div>


<br><br>




<!--Modal para aceptar la eliminación de un registro-->
<!-- Modal -->
<div class="modal fade" id="eliminarRegistro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-3" style="">
                <center style="background-color: red; border-radius: 50px; padding:19px;">
                    <i style="color: rgb(255, 255, 255); font-size:40px;" class="bi bi-x-lg"></i>
                </center>
            </div>
            <div class="col-md-9"><h3 style="font-size:21px; weight:bold;">¿Deseas Eliminar este registro?</h3>
        <p>Ten en cuenta que al hacer esto borraras los datos y la</p></div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click="cancelarEliminar()">Cancelar</button>
        <button
        type="submit"
         @click="submit"
         class="btn btn-primary" >Aceptar</button>
      </div>
    </div>
  </div>
</div>
                            </form>
                        </div>

                   </div>

               </div>
            </div>
        </div>


<!-- Modal Ver Registro-->
<div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table caption-top">
          <caption>Datos del Alta</caption>
          <thead>
            <tr>
              <th scope="col">Concepto</th>
              <th scope="col">Valor</th>
              
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Número de Recibo:</th>
              <td>{{ this.reciboone }}</td>
              
            </tr>
           <tr>
              <th scope="row">Nombre:</th>
              <td>{{ this.nombreone }}</td>
              
            </tr>
            <tr>
              <th scope="row">Domicilio:</th>
              <td>{{ this.domicilioone }}</td>
              
            </tr>
            <tr>
              <th scope="row">Concepto:</th>
              <td>{{ this.conceptoone }}</td>
              
            </tr>
            <tr>
              <th scope="row">Periodo:</th>
              <td>{{ this.periodoone }}</td>
              
            </tr>

            <tr>
              <th scope="row">Importe:</th>
              <td>{{ this.importeone }}</td>
              
            </tr>

            <tr>
              <th scope="row">Rezagos:</th>
              <td>{{ this.rezagosone }}</td>
              
            </tr>

            <tr>
              <th scope="row">IVA:</th>
              <td>{{ this.ivaone }}</td>
              
            </tr>

            <tr>
              <th scope="row">Recargos:</th>
              <td>{{ this.recargosTotales }}</td>
              
            </tr>
            <tr>
              <th scope="row">Gastos de Ejucución:</th>
              <td>{{ this.ejecucionone }}</td>
              
            </tr>

            <tr>
              <th scope="row">Multa:</th>
              <td>{{ this.multaone }}</td>
              
            </tr>
            <tr>
              <th scope="row">Descuentos:</th>
              <td>{{ this.descuentoone }}</td>
              
            </tr>
            <tr>
              <th scope="row">Total:</th>
              <td><b style="font-size:27px; color: blue;">{{ this.totalone }}</b></td>
              
            </tr>



          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
        
      </div>
    </div>
  </div>
</div>


<!-- Fin Modal calcularRecargos-->



<!-- Modal Ver Registro-->
<div class="modal fade" id="calcularRecargos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Calcular los Recargos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table caption-top">
          <caption>Porcentajes de cobro</caption>
          <thead>
            <tr>
              <th scope="col">Periodo</th>
              <th scope="col">Selección</th>
              
            </tr>
          </thead>
          <tbody>
            <tr  v-for="recargos in arrayRecargos" :key="recargos.id">
              <th scope="row">{{ recargos.periodo }} || {{ recargos.mes }} || %
                    {{ recargos.porciento }}</th>
              <td>
                  <input class="form-check-input clear" type="checkbox" :id='recargos.id'
                  v-model="check" :value="recargos.id" @change="checado(check,$event)"
                  >
                  <label class="form-check-label" for="flexCheckDefault"> 
                  </label>
              </td>
              
            </tr>
           <tr>
                  <th class="row">
                      <span>Total en Recargos</span>
                  </th>
                  <td>
                      <span style="float: right; font-size: 30px; color:red;">{{ this.recargosTotales }}</span>
                  </td>
              </tr>

            <p hidden="true" >{{ check }}</p>
            
            


          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" id="limpiar" class="btn btn-warning" v-on:click="clearRecargos(check)" style="display:none;">Eliminar Recargos</button>
        <button type="button" class="btn btn-success" data-bs-dismiss="modal" v-on:click="recargarInput()">Aplicar Recargos</button>
        
      </div>
    </div>
  </div>
</div>


<!-- Fin Modal Ver Registro-->

       <!-- Modal para ver folios disponibles -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Folios Disponibles</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul>
         <li  v-for="pago in arrayPagos"
        :key="pago.id_ingresos" :v-bind:value="pago.recibo">
            <span v-if='pago.nombre=="PRUEBA" || pago.nombre=="" || pago.nombre=="prueba" || pago.nombre==null'>Número de Recibo <b>{{ pago.recibo }}</b> -> Con fecha de creación: <b>{{ pago.fecha }}</b> - generó o realizó Actualización: <b>{{ pago.iduser }}</b></span>
        </li>
            
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>



    </div>
}
}




</app-layout>
</template>
<script>
    import AppLayout from '@/Layouts/AppLayout';



    export default {

        components: {
            AppLayout
            },

        props: ['arrayCatalogo','arrayRecargos','arrayPagos','nuevoCode','totalPagos','esSubir','NuevoCodeEdit','arregloDate'],
        
        data(){
           return{
            forfecha:{
                fechainicial:null,
                fechafinal:null,
            },
                form:{

                    fecha:this.$props.arregloDate,
                    nombre: null,
                    rfc:null,
                    clavecat:null,
                    domicilio: null,
                    recibo: this.$props.nuevoCode,
                    concepto: null,
                    periodo: null,
                    importe: 0,
                    rezagos: 0,
                    iva: 0,
                    recargos: 0,
                    ejecucion: 0,
                    multa: 0,
                    descuento: 0,
                    total:0,
                    numerocuenta:null,
                    nombrecuenta2:null,
                    valoracion:true,
                    nuevoCodeEdit:this.$props.NuevoCodeEdit,
                    clavecat:null,
                    cuentaRecibo:null,
                    iduser: this.$page.props.user.id,



                },

                fecha:{
                    fechainicial:null,
                    fechafinal:null,
                },

                    nombreone: null,
                    domicilioone: null,
                    reciboone: null,
                    conceptoone: null,
                    periodoone: null,
                    importeone: null,
                    rezagosone: null,
                    ivaone: null,
                    recargosone: null,
                    ejecucionone: null,
                    multaone: null,
                    descuentoone: null,
                    totalone:0,
                    recargosTotales:0,
                    check:[],
                    porcentajeAplicado:0,
                    index:0,
                    disabled:true,
                    elemento:null,
                    verdadBotonSubir: this.$props.esSubir,
                    nuevoCodeEdit: this.$props.NuevoCodeEdit,
                    enabledRFC: false,

                    
           }
        },



        methods:{
            borrarSelectCuentas(){
                this.form.nombrecuenta = "";
            }
            ,
            submit(){
                if(this.verdadBotonSubir==true){
                    this.form.recibo = this.$props.nuevoCode;
                    
                }if(this.verdadBotonSubir==false){
                    this.form.recibo=this.form.recibo;
                }
                
                
                this.verdadBotonSubir = false;
                this.$inertia.post(route('nuevocobrodiverso.store'),this.form);
                
                

            },
            calcular(){
                this.totalone = parseFloat(this.form.importe)+
                parseFloat(this.form.rezagos)+
                parseFloat(this.form.iva)+
                parseFloat(this.form.recargos)+
                parseFloat(this.form.ejecucion)+
                parseFloat(this.form.multa)-
                parseFloat(this.form.descuento)
                ;
                this.form.total=this.totalone;


                


            },
            verRecibo(){
                this.nombreone=this.form.nombre;
                this.domicilioone = this.form.domicilio;
                this.reciboone = this.form.recibo;
                this.conceptoone =this.form.concepto;
                this.periodoone = this.form.periodo;
                    this.importeone= this.form.importe;
                    this.rezagosone= this.form.rezagos;
                    this.ivaone = this.form.iva;
                    this.recargosone= this.form.recargos;
                    this.ejecucionone= this.form.ejecucion;
                    this.multaone= this.form.multa;
                    this.descuentoone= this.form.descuento;
                    
                    this.totalone = parseFloat(this.form.importe)+
                parseFloat(this.form.rezagos)+
                parseFloat(this.form.iva)+
                parseFloat(this.form.recargos)+
                parseFloat(this.form.ejecucion)+
                parseFloat(this.form.multa)-
                parseFloat(this.form.descuento)
                ;


                this.form.total=this.totalone;
            },

            checado(check,event){
                //formula para sacar el porcentaje a aplicar a la sumatoria
                //this.$props.arrayRecargos[this.check[check.length-1]-1].porciento

                //aplicada:
                /*var porcentajeAplicado=this.$props.arrayRecargos[this.check[check.length-1]-1].porciento;
                var index = (this.check[check.length-1]-1)+1+"";
                var elemento = document.getElementById(index);
                elemento.className += " clear-fixed";
                this.recargosTotales= this.recargosTotales+((porcentajeAplicado*this.form.importe)/100);

                elemento.disabled=true;
               console.log(elemento);*/

               
               
               
               
                
               if(event.target.checked==true){
                    this.index = (check[check.length-1]-1)+1+"";
                    this.elemento = document.getElementById(this.index);
                    this.porcentajeAplicado=this.$props.arrayRecargos[check[check.length-1]-1].porciento;
                    
                    this.recargosTotales= this.recargosTotales+((this.porcentajeAplicado*this.form.importe)/100);
                    
                    
                    
               }if(event.target.checked==false){
                var errorsClear = document.getElementById("limpiar");
                  errorsClear.style.display='block';

                    
               }



            },
            clearRecargos(check){

                    this.index = null;
                    this.elemento = null;
                    this.porcentajeAplicado=null;
                    



                    this.recargosTotales= 0;
               

            },
            
            consultarRecibo(recibo,cuenta){

                    

            
                        
                        
                        var index;
                        var reciboObtenido=this.$props.nuevoCode;
                        if(recibo>=this.$props.nuevoCode){

                                            this.form.nombre = "";
                                            this.form.domicilio = "";                                            this.form.periodo = "";
                                            this.form.concepto = "";
                                            this.form.nombrecuenta = "";
                                            this.form.importe = 0;
                                            this.form.rezagos = 0;
                                            this.form.iva = 0;
                                            this.form.recargos = 0;
                                            this.form.ejecucion = 0;
                                            this.form.multa = 0;
                                            this.form.descuento = 0; 
                                            this.form.total = 0; 
                                            this.form.cuenta="";
                                            this.form.nombrecuenta2="";
                                            this.form.fecha="";
                                            this.form.cuentaRecibo="";
                                            this.form.clavecat="";
                                            this.form.rfc="";
                                            this.totalone = 0;

                                           
                                            this.nuevoCodeEdit = this.form.recibo;
                                            this.form.nuevoCodeEdit = this.nuevoCodeEdit;

                                            this.verdadBotonSubir = true;
                                            this.form.valoracion = true;
                                         

                                        
                        }
                            else{
                                    for(var i = 0 ; i < this.$props.arrayPagos.length ; i++){

                                        index = this.$props.arrayPagos[i].recibo;
                                        if(index==recibo){
                                            this.form.recibo = this.$props.arrayPagos[i].recibo;
                                            this.form.nombre = this.$props.arrayPagos[i].nombre;
                                            this.form.domicilio = this.$props.arrayPagos[i].domicilio;
                                            this.form.periodo = this.$props.arrayPagos[i].periodo;
                                            this.form.concepto = this.$props.arrayPagos[i].concepto;
                                            this.form.nombrecuenta = this.$props.arrayPagos[i].nombrecuenta;
                                            this.form.rfc = this.$props.arrayPagos[i].rfc;
                                            this.form.cuentaRecibo = this.$props.arrayPagos[i].cuentaRecibo;
                                            this.form.fecha = this.$props.arrayPagos[i].fecha;
                                            this.form.clavecat = this.$props.arrayPagos[i].clavecat;
                                            this.form.importe = this.$props.arrayPagos[i].importe;
                                            this.form.rezagos = this.$props.arrayPagos[i].rezagos;
                                            this.form.iva = this.$props.arrayPagos[i].iva;
                                            this.form.recargos = this.$props.arrayPagos[i].recargos;
                                            this.form.ejecucion = this.$props.arrayPagos[i].gastosejec;
                                            this.form.multa = this.$props.arrayPagos[i].multas;
                                            this.form.descuento = this.$props.arrayPagos[i].descuentos; 
                                            this.form.total = this.$props.arrayPagos[i].total; 
                                            this.form.numerocuenta="";
                                            this.form.nombrecuenta2;
                                            this.totalone = this.form.total;

                                        }

                                    }

                                       this.verdadBotonSubir = false;
                                       this.form.valoracion = false;
                                          
                                }
            },
            
            recargarInput(){
                this.form.recargos = this.recargosTotales;
            },
            consultarCuenta(cuenta){
                if(cuenta!=null){
                        
                        var indexCatalogo;
                        for(var i = 0 ; i < this.$props.arrayCatalogo.length ; i++){

                            indexCatalogo = this.$props.arrayCatalogo[i].cuenta;
                            if(indexCatalogo==cuenta){
                                this.form.nombrecuenta2 = this.$props.arrayCatalogo[i].nombrecuenta;
                            }

                        }
                    }if(cuenta==null||cuenta==""){

                        this.form.nombrecuenta2="";
                        
                    }
                
               
                
            },

            eliminarCampos(){
                                            this.form.nombre = "";
                                            this.form.domicilio = "";                                            
                                            //this.form.periodo = "";
                                            this.form.concepto = "";
                                            
                                            this.form.importe = 0;
                                            this.form.rezagos = 0;
                                            this.form.iva = 0;
                                            this.form.recargos = 0;
                                            this.form.ejecucion = 0;
                                            this.form.multa = 0;
                                            this.form.descuento = 0; 
                                            this.form.total = 0; 
                                            this.form.cuenta="";
                                            this.form.nombrecuenta2="";
                                             
                                            this.totalone = 0;

                                           
                                            
                                            this.verdadBotonSubir = false;
                                            this.form.valoracion = false;
            },
            cancelarEliminar(recibo){
                 var index;
                var reciboObtenido=this.form.recibo;
                 for(var i = 0 ; i < this.$props.arrayPagos.length ; i++){

                                        index = this.$props.arrayPagos[i].recibo;
                                        if(index==reciboObtenido){
                                            this.form.recibo = this.$props.arrayPagos[i].recibo;
                                            this.form.nombre = this.$props.arrayPagos[i].nombre;
                                            this.form.domicilio = this.$props.arrayPagos[i].domicilio;
                                            //this.form.periodo = this.$props.arrayPagos[i].periodo;
                                            this.form.concepto = this.$props.arrayPagos[i].concepto;
                                            this.form.nombrecuenta = this.$props.arrayPagos[i].nombrecuenta;
                                            this.form.importe = this.$props.arrayPagos[i].importe;
                                            this.form.rezagos = this.$props.arrayPagos[i].rezagos;
                                            this.form.iva = this.$props.arrayPagos[i].iva;
                                            this.form.recargos = this.$props.arrayPagos[i].recargos;
                                            this.form.ejecucion = this.$props.arrayPagos[i].gastosejec;
                                            this.form.multa = this.$props.arrayPagos[i].multas;
                                            this.form.descuento = this.$props.arrayPagos[i].descuentos; 
                                            this.form.total = this.$props.arrayPagos[i].total; 
                                            this.form.numerocuenta="";
                                            this.form.nombrecuenta2;
                                            this.totalone = this.form.total;

                                        }

                                    }

                                       this.verdadBotonSubir = false;
                                       this.form.valoracion = false;

                                       console.log(reciboObtenido);

            },
            queryCalendar(){
                this.$inertia.post(route('exportadordiariosfecha.store'),this.forfecha);
            },
            activarRFC(event){


                if(event.target.checked==true){
                    this.enabledRFC=true;
                }else{
                    this.enabledRFC=false;
                }

            },
            refreshNumeroCuenta(){
                this.form.numerocuenta="";
                this.form.nombrecuenta2="";
            },
            

            
            
        },


        }

</script>
