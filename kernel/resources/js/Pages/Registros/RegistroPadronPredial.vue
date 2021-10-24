<template>
    <app-layout title="Padron de Predial">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <b style="padding:20px;"></b>Padron de Predial
                <span style="float:right font-size: 17px !important;"></span>
                <a :href="route('consultarcobro.index')" class="btn btn-success"
                style="margin-left:30px; float:right font-size: 14px !important;">
                <i class="bi bi-search" style="color:#FFF;"></i> Consultar Cobros
            </a>

            </h2>

        </template>
    <div class="container-fluid" >
        <div class="container" style="margin-top:25px; margin-right:30px; margin-left:30px; background-color: #FFF;
        border-radius: 20px; box-shadow:">
            <div class="row">
               <div class="container">
                   <div class="col-md-1">

                   </div>
                   <div class="col-md-8" style="margin: 0 auto;">

                            <div class="row">
                            <form class="container" @submit.prevent="submit" style="margin-top:20px; margin-bottom:20px !important; inset 0 -3em 3em rgba(0,0,0,0.1),
                        0 0  0 2px rgb(255,255,255),
                        0.3em 0.3em 1em rgba(0,0,0,0.3);">
                                <span style="margin-top:50px; margin-bottom:50px;"></span><br>
                                <div class="row" style="background-color: #efefef; padding: 25px; border-top-right-radius: 10px; border-top-left-radius:10px;">
                                    <div class="col-md-3">
                                        <b  style="margin-top: 15px; font-size: 16px;float:right;">Operaciones del Recibo</b>
                                    </div>

                                    <div class=" col-md-3">
                                        <button type="button"
                                        v-on:click="consultar();"

                                         class=" btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                         style="margin-top:7px; float:right;" >
                                         <i class="bi bi-eye"></i> Revisar Alta
                                        </button>
                                    </div>
                                    <div class="col-md-3">
                                        <button class=" btn btn-primary"
                                    style="margin-top:7px; float:right;" type="submit"
                                    text="Guardar"><i class="bi bi-sd-card"></i> Guardar</button>
                                    </div>
                                    <div class=" col-md-3"><a :href="route('nuevocobrodiverso.index')"
                                        style="margin-top: 7px; float:right;" class=" btn btn-danger"> <i class="bi bi-journal-x"></i> Cancelar</a>
                                        </div>
                                </div><br><br>
                                <b>Datos del Recibo</b><br>
                                <div class="row" >

                                    <div class="col-md-4">
                                    <center style="margin:0 auto;">
                                            <i class="bi bi-file-earmark-fill" style="font-size:80pt; color:#C0392B;"></i>
                                        </center>
                                         <label class="form-label">Número de Recibo</label>
                                        <input required id="id_ingresos" v-model="form.id_ingresos" class="form-control" type="hidden"
                                        aria-label="Ingrese información" >
                                        <input required id="recibo" v-model="form.recibo" class="form-control" type="text"
                                        aria-label="Ingrese información" >
                                    </div>

                                    <div class="col-md-4">
                                    <label class="form-label">Nombre</label>
                                        <input required id="nombre" v-model="form.nombre"
                                            @input="nombreone"
                                         class="form-control" type="text"
                                        aria-label="Ingrese información" >
                                    <label class="form-label">Domicilio</label>
                                        <input required id="domicilio"
                                        @input="domiciliotwo"
                                        v-model="form.domicilio" class="form-control" type="text">
                                    <label class="form-label">Por Concepto de:</label>
                                        <textarea id="concepto" v-model="form.concepto" class="form-control"></textarea>

                                    </div>
                                    <div class="col-md-4">

                                        <label required class="form-label">Periodo de Pago</label>
                                        <input required id="periodo"
                                        min="2000" max="2030"
                                        v-model="form.periodo" class="form-control" type="number">
                                        <label class="form-label">Selecciona la cuenta</label>
                                        <select class="form-control" id="nombrecuenta" v-model="form.nombrecuenta">
                                            <option  v-for="catalogo in arrayCatalogo"
                                            :key="catalogo.id_cuenta" :v-bind:value="catalogo.nombrecuenta">
                                                {{ catalogo.nombrecuenta }}
                                            </option>
                                        </select>

                                    </div>



                                </div><br>
                                    <b>Datos sobre la liquidación del Recibo</b><br>


                                <div class="row">
                                    <div class="col-md-3">
                                          <label class="form-label">Importe</label>
                                            <input required id="importe" v-model="form.importe" class="form-control" type="number"  step=".01">
                                    </div>


                                     <div class="col-md-3">
                                         <label class="form-label">Recargos</label>
                                            <input required id="recargos" v-model="form.recargos" class="form-control" type="number" step=".01" >

                                    </div>
                                    <div class="col-md-3">
                                            <label class="form-label">IVA</label>
                                                <input required id="iva" readonly v-model="form.iva" class="form-control" type="number" step=".01" >

                                    </div>

                                    <div class="col-md-3">
                                            <label class="form-label">Rezagos</label>
                                                <input required id="rezagos" v-model="form.rezagos" class="form-control" type="number"  step=".01">

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-3">
                                          <label class="form-label">Gastos de Ejecución</label>
                                            <input required id="ejecucion" v-model="form.ejecucion" class="form-control" type="number" step=".01">
                                    </div>
                                     <div class="col-md-3">
                                            <label class="form-label">Multas</label>
                                                <input required id="multa" v-model="form.multa" class="form-control" type="number" step=".01">

                                    </div>
                                     <div class="col-md-3">
                                            <label class="form-label">Descuento</label>
                                                <input required id="descuento" v-model="form.descuento" class="form-control" type="number" step=".01">

                                    </div>
                                     <div class="col-md-3">
<label class="form-label"></label>
                                                <input required id="total" v-model="form.total" class="form-control" type="hidden" step=".01">

                                    </div>
                                </div>

                                    <div class="row">
                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-4"></div>

                                    </div>

                                <div class="row">
                                <div class="col-md-10"></div>
                                <div class="col-md-2">



                                </div>

                                </div>



                            </form>
                        </div>

                   </div>

               </div>
            </div>
        </div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><b>Datos para subir</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

            <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Variables</th>
      <th scope="col">Datos</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Nombre</th>
      <td>{{ nombreone }}</td>

    </tr>
    <tr>
      <th scope="row">Domicilio</th>
      <td>{{ domicilioone }}</td>

    </tr>
    <tr>
      <th scope="row">No. de Recibo</th>
      <td>{{ reciboone }}</td>

    </tr>
    <tr>
      <th scope="row">Concepto</th>
      <td>{{ conceptoone }}</td>

    </tr>


    <tr>
      <th scope="row">Periodo</th>
      <td>{{  periodoone }}</td>

    </tr>
<tr>
      <th scope="row">Fecha</th>
      <td>{{ fecha }}</td>

    </tr>

    <tr>
      <th scope="row"><b>Importe</b></th>
      <td style="font-size:18px; float:right;"><b>{{  importeone }}</b></td>

    </tr>

    <tr>
      <th scope="row">Rezagos</th>
      <td><span style="font-size:18px; float:right;">{{ rezagosone }}</span></td>

    </tr>
    <tr>
      <th scope="row">IVA: </th>
      <td><span style="font-size:18px; float:right;">{{ ivaone }}</span></td>

    </tr>
    <tr>
      <th scope="row">Recargos</th>
      <td><span style="font-size:18px; float:right;">{{ recargosone }}</span></td>

    </tr>

<tr>
      <th scope="row">Gastos de Ejecución</th>
      <td><span style="font-size:18px; float:right;">{{ ejecucionone }}</span></td>

    </tr>



<tr>
      <th scope="row">Multas</th>
      <td><span style="font-size:18px; float:right;">{{ multaone }}</span></td>

    </tr>


    <tr>
      <th scope="row">Descuento</th>
      <td><span style="font-size:18px; float:right;">{{ descuentoone }}</span></td>

    </tr>


  </tbody>
</table>
            <p class="alert alert-primary" style="font-size:30px; float:right;">Total: <i class="bi bi-currency-dollar"></i> {{ total }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>




    </div>




</app-layout>
</template>
<script>

    import AppLayout from '@/Layouts/AppLayout';



    export default {

        components: {
            AppLayout
            },

        props:['arrayCatalogo','recibo',]

        ,
        data(){
           return{
                form:{
                    id_ingresos: this.$props.recibo.id_ingresos,
                    nombre: null,
                    domicilio: null,
                    recibo: null,
                    concepto: null,

                    periodo: null,
                    importe: null,
                    rezagos: null,
                    iva: null,
                    recargos: null,
                    ejecucion: null,
                    multa: null,
                    descuento: null,


                }
            ,
            nombreone:'',
            domicilioone:'',
            reciboone:'',
            conceptoone:'',
            periodoone:'',
            importeone:'',
            rezagosone:'',
            ivaone:'',
            recargosone:'',
            ejecucionone:'',
            multaone:'',
            descuentoone:'',
            total:'',
            fecha: ''
           }
        },
        methods:{
            submit(){
                this.$inertia.post(route('nuevocobrodiverso.store'),this.form);
            },
            consultar(){
                this.nombreone = this.form.nombre;
                this.domicilioone = this.form.domicilio;
                this.reciboone = this.form.id_ingresos;
                this.conceptoone = this.form.concepto;
                this.periodoone = this.form.periodo;
                this.importeone = this.form.importe;
                this.rezagosone = this.form.rezagos;
                this.ivaone = this.form.iva = parseFloat(this.form.importe)*0.16;
                this.recargosone = this.form.recargos;
                this.ejecucionone = this.form.ejecucion;
                this.multaone = this.form.multa;
                this.descuentoone = this.form.descuento;
                this.total = parseFloat(this.form.importe)+parseFloat(this.form.rezagos)+parseFloat(this.form.iva)+
                parseFloat(this.form.recargos)+parseFloat(this.form.ejecucion)+parseFloat(this.form.multa)-
                parseFloat(this.form.descuento);
                this.form.total=this.total;
                var dump= new Date();
                this.fecha=dump.toDateString();
                console.log(this.fecha);
            }

        }



        }





</script>
