<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               <span style="margin: 20px;"></span> Home
            </h2>
        </template>

        
           <div class="container-fluid max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-top: 25px !important; border-radius: 20px; background-color:rgba(255,255,255,0) !important;">
               <div class="row " style="margin-top: 25px !important;">
                   <div class="col-md-2"></div>
                   <div class="col-md-8">
                       <div class="container">
                        <div class="">
                <div class=""><br><br><br><br>
                    <div class="jumbotron" style="padding: 40px !important; background-color:rgba(250, 250, 251,0.8); border-radius:20px;">
                  <h1 class="display-4">¡Bienvenido a SDCA {{ this.$page.props.user.name+" "+this.$page.props.user.lastname }}!</h1>
                  <p class="lead">Iniciemos ahora mismo.

                        
                  </p>
                  <hr class="my-4">
                  <p>SDCA Powered BY AFD Todos los Derechos Reservados.</p>
                  <p class="lead">
                  </p>
                </div>
                <br><br><br><br>
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
    }
</script>
