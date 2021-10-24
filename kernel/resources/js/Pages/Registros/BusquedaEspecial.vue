<template>
    <app-layout title="Nueva Cuenta">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Realizar La busqueda por
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
                            <form target="_blank" class="container" @submit.prevent="submit" style="margin-top:20px; margin-bottom:20px !important; inset 0 -3em 3em rgba(0,0,0,0.1),
                        0 0  0 2px rgb(255,255,255),
                        0.3em 0.3em 1em rgba(0,0,0,0.3);">
                                <div class="row" style="margin-top:50px; margin-bottom:50px;">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-6">
                                        <label class="form-label">Consultar por Nombre</label>
                                    <input id="mes" v-model="form.nombre" class="form-control" type="text"
                                    aria-label="Ingrese información" min="1" max="12" required placeholder="Ej. Ramiro">


                                    </div>

                                    

                                    <div class="col-md-5">
<br>
                <button class="btn btn-primary" 
                style="margin-top:7px;" 
                type="submit" text="Guardar"><i class="bi bi-search"></i> Consultar</button>
                                       
                                        
                                    </div>


                                </div>


                            </form>
                        </div>

                   </div>
               </div>
            </div>



            <br>

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
