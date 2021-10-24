<template>
    <app-layout title="Consultar todo">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               <span style="margin: 20px;"></span> Registros existentes en tu base de datos
               {{ this.nombreTabla }}
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
                                        <a class="btn btn-primary" :href="route('padrondecomercios.index')">
                                            <i class="bi bi-plus-square-fill" style="color:#FFF; font-size:14pt;"></i>
                                            Padrón de Comercios</a>
                                            <a class="btn btn-secondary" :href="route('impresionpadrondecomercios.show',this.nombreTabla)" target="_blank">
                                            <i class="bi bi-eye" style="color:#FFF; font-size:14pt;"  ></i>
                                            Ver Todo</a>


                                            <a class="btn btn-success" :href="route('exportarpadroncomercioxls.show',this.nombreTabla)" target="_blank"><i style="color:#FFF; font-size:14pt;" class="bi bi-file-earmark-excel"></i>Exportar a Excel</a>

                                            <a class="btn btn-danger" :href="route('consultarpadroncomercio.index')" style="float:right; right:0px;">
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
                                                        <th scope="col">RFC</th>
                                                        <th scope="col">Giro</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="ArraySolo in arrayTodo" :key="ArraySolo.id_padron_comercios">
                                                        <th scope="row">{{ ArraySolo.id_padron_comercios }}</th>
                                                        <td>{{ ArraySolo.nombre+" "+ArraySolo.apellidopaterno+" "+ArraySolo.apellidomaterno }}</td>
                                                        <td>{{ ArraySolo.domicilio }}</td>
                                                        <td>{{ ArraySolo.rfc }}</td>
                                                        <td>{{ ArraySolo.giro }}</td>
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
