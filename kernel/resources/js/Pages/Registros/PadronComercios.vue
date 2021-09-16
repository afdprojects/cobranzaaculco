<template>
    <app-layout title="Nuevo Cobro">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Padrón de Comercios
            </h2>
        </template>
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
                        0.3em 0.3em 1em rgba(0,0,0,0.3);">
                                <span style="margin-top:50px; margin-bottom:50px;"></span><br>
                                <b>Datos del Comercio</b><br>
                                <div class="row" >

                                    <div class="col-md-4">
                                    <center style="margin:0 auto;">
                                            <i class="bi bi-file-earmark-fill" style="font-size:80pt; color:#C0392B;"></i>
                                        </center>
                                         <label class="form-label">Registro municipal</label>
                                        <input id="recibo" v-model="form.recibo" class="form-control" type="text"
                                        aria-label="Ingrese información" >
                                    </div>

                                    <div class="col-md-4">
                                    <label class="form-label">Nombre</label>
                                        <input id="nombre" v-model="form.nombre" class="form-control" type="text"
                                        aria-label="Ingrese información" >
                                    <label class="form-label">Domicilio</label>
                                        <input id="domicilio" v-model="form.domicilio" class="form-control" type="text">
                                    <label class="form-label">Por Concepto de:</label>
                                        <textarea id="concepto" v-model="form.concepto" class="form-control"></textarea>

                                    </div>
                                    <div class="col-md-4">

                                        <label class="form-label">Periodo de Pago</label>
                                        <input id="periodo" v-model="form.periodo" class="form-control" type="text">
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
                                            <input id="importe" v-model="form.importe" class="form-control" type="decimal">
                                    </div>
                                     <div class="col-md-3">
                                            <label class="form-label">Rezagos</label>
                                                <input id="rezagos" v-model="form.rezagos" class="form-control" type="decimal">

                                    </div>
                                     <div class="col-md-3">
                                            <label class="form-label">IVA</label>
                                                <input id="iva" v-model="form.iva" class="form-control" type="decimal">

                                    </div>
                                     <div class="col-md-3">
                                         <label class="form-label">Recargos</label>
                                            <input id="recargos" v-model="form.recargos" class="form-control" type="decimal">

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-3">
                                          <label class="form-label">Ejecución</label>
                                            <input id="ejecucion" v-model="form.ejecucion" class="form-control" type="decimal">
                                    </div>
                                     <div class="col-md-3">
                                            <label class="form-label">Multa</label>
                                                <input id="multa" v-model="form.multa" class="form-control" type="decimal">

                                    </div>
                                     <div class="col-md-3">
                                            <label class="form-label">Descuento</label>
                                                <input id="descuento" v-model="form.descuento" class="form-control" type="decimal">

                                    </div>
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
                                <button class="btn btn-primary"
                                    style="margin-top:7px;" type="submit"
                                    text="Guardar">Guardar</button>

                                        <a :href="route('nuevocobrodiverso.index')"
                                        style="margin-top: 7px;" class="btn btn-danger">Cancelar</a>
                                </div>

                                </div>



                            </form>
                        </div>

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

        props: ['arrayCatalogo'],
        data(){
           return{
                form:{
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
           }
        },
        methods:{
            submit(){
                this.$inertia.post(route('nuevocobrodiverso.store'),this.form);
            }
        }



        }
</script>
