<template>
    <app-layout title="Consultar todo">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Registros existentes en la tabla {{ this.nombreTabla }}
            </h2>
        </template>
    <div class="container-fluid" >
        <div class="container" style="margin-top:25px; margin-right:30px; margin-left:30px; background-color: #FFF; border-radius: 20px; box-shadow:">
            <div class="row">
               <div class="container">

                   <div class="col-md-12" style="margin: 0 auto;">
                            <div class="row">

                                <div class="col-md-1"></div>
                                    <div class="col-md-10">

                                        <div style="">
                                    <br><br><br>
                                        <a class="btn btn-primary" :href="route('nuevocobrodiverso.index')">
                                            <i class="bi bi-plus-square-fill" style="color:#FFF; font-size:14pt;"></i>
                                            Crear Nuevo Cobro</a>
                                            <a class="btn btn-secondary" :href="route('impresiondecobros.show',this.nombreTabla)" target="_blank">
                                            <i class="bi bi-eye" style=" margin-left: 5px;color:#FFF; font-size:14pt;"  ></i>
                                            Revisar Tabla {{ this.nombreTabla }}</a>

                                            <a class="btn btn-success" :href="route('exportarcobrosxls.show',this.nombreTabla)" target="_blank">



                                            <i class="bi bi-file-earmark-excel" style=" margin-left: 5px;color:#FFF; font-size:14pt;"  ></i>
                                            Descargar Excel {{ this.nombreTabla }}</a>


                                            <a class="btn btn-danger" :href="route('consultarcobro.index')" style="float:right; right:0px;">

                                            <i class="bi bi-reply-fill" style="color:#FFF; font-size:14pt; "></i>
                                            Regresar a Filtro</a>
                                            </div>
                                            <br>



                                                    <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                        <th scope="col">id</th>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col">Domicilio</th>
                                                        <th scope="col">Nombre de la Cuenta</th>
                                                        <th scope="col">Fecha de pago</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="ArraySolo in arrayTodo" :key="ArraySolo.id_ingresos">
                                                        <th scope="row">{{ ArraySolo.id_ingresos }}</th>
                                                        <td>{{ ArraySolo.nombre }}</td>
                                                        <td>{{ ArraySolo.domicilio }}</td>
                                                        <td>{{ ArraySolo.nombrecuenta }}</td>
                                                        <td>{{ ArraySolo.fecha }}</td>
                                                        </tr>


                                                    </tbody>
                                                    </table>



<br><br><br><br>
                        </div>
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
            errors: Object,
            arrayTodo: Array,
            nombreTabla: String,
        },
        
        



        }
</script>
