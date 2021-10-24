<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               <span style="margin: 20px;"></span> Home
            </h2>
        </template>

        
           <div class="container-fluid max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-top:25px !important;">
               <div class="row bg-white overflow-hidden shadow-xl sm:rounded-lg">
                   <div class="col-md-2"></div>
                   <div class="col-md-8">
                       <div class="container">
                        <div class="">
                <div class=""><br>
                    <div class="jumbotron" style="padding: 40px !important; background-color:rgb(250, 250, 251);">
                  <h1 class="display-4">Respalda tu Información, El tipo de Exportación será CSV así nuestra aplicación puede tener un registro de todo lo que haz subido mensualmente, en un formato de archivos universal</h1>
                  <p class="lead">This is the beta Testing Powered BY AFD Integral Solutions.</p>
                  <hr class="my-4">
                  <p>SDCA Todos los Derechos Reservados.</p>
                  <p class="lead">
                  </p>
                </div>
                <br>
                <form name="forfecha1" @submit.prevent="">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-2"> 

                            <div class="form-group">
                                    <label for="exampleFormControlInput1" class="form-label">Fecha inicial</label>
                                    <input
                                    id="fechainical1"
                                    v-model="forfecha.fechainicial1"
                                    type="date"
                                     class="form-control"
                                   
                                       
                                       min="2021-01-01" max="2022-12-31"
                                    >
                                    

                                </div>
                            </div>
                            <div class="col-md-2">
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
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Welcome from '@/Jetstream/Welcome.vue'

    export default {
        components: {
            AppLayout,
            Welcome,
        },
        data(){
            return{
                forfecha1:{
                    fechainicial1:null,
                    fechafinal2:null,
                },
            }
        },
    }
</script>