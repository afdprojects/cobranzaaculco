<template>
    <app-layout title="Nueva Cuenta">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Visualizar Registros
            </h2>
        </template>
    <div class="container-fluid" >
        <div class="container" style="margin-top:25px; margin-right:30px; margin-left:30px; background-color: #FFF; border-radius: 20px; box-shadow:">
            <div class="row">
               <div class="container">
                   <div class="col-md-1">
                   </div>
                   <div class="col-md-10" style="margin: 0 auto;">
                            <div class="row">
                            <form class="container" @submit.prevent="submit" style="margin-top:20px; margin-bottom:20px !important; inset 0 -3em 3em rgba(0,0,0,0.1),
                        0 0  0 2px rgb(255,255,255),
                        0.3em 0.3em 1em rgba(0,0,0,0.3);">
                                <div class="row" style="margin-top:50px; margin-bottom:50px;">

                                    <div class="col-md-4">
                                        <label class="form-label">Mes</label>
                                    <input id="mes" v-model="form.mes" class="form-control" type="number"
                                    aria-label="Ingrese información" min="1" max="12" required placeholder="1 al 12">


                                    </div>

                                    <div class="col-md-3">
                                    <label class="form-label">Periodo</label>
                                        <input id="periodo" v-model="form.periodo" class="form-control" type="number"
                                        aria-label="Ingrese información" min="2000" max="2027" required placeholder="2000 al 2027" >
                                    </div>

                                    <div class="col-md-5">
<br>
<button class="btn btn-primary" style="margin-top:7px;" type="submit" text="Guardar">Consultar</button>
                                        <a :href="route('nuevocobrodiverso.index')" style="margin-top: 7px;" class="btn btn-danger">Cancelar</a>
                                        <a :href="route('consultarcobro.show','diarios')" style="margin-top: 7px; margin-left:7px;" class="btn btn-success"><i class="bi bi-ui-checks"></i> Consultar Todo</a>
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

        props: {
            errors: Object
        },
        data(){
           return{
                form:{
                    mes:null,
                    periodo: null,
                }
           }
        },
        methods:{
            submit(){
                this.$inertia.post(route('consultarcobro.store'),this.form);
            }
        }



        }
</script>
