<template>
    <app-layout title="Catalogo De Cuentas">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight"><span style="margin: 20px;"></span>
                Catalogo de Cuentas
            </h2>
        </template>
    <div class="container-fluid" >
        <div class="container" style="margin-top:25px; margin-right:30px; margin-left:30px; background-color: #FFF; border-radius: 20px; box-shadow:">
            <div class="row">
               <div class="container">
                   <div class="col-md-1">
                   </div>
                   <div class="col-md-10" style="margin:0 auto; margin-top: 50px; margin-bottom: 50px !important; inset 0 -3em 3em rgba(0,0,0,0.1),
             0 0  0 2px rgb(255,255,255),
             0.3em 0.3em 1em rgba(0,0,0,0.3);">
                        <div style="">
                        <div style="">
                        <a class="btn btn-primary" :href="route('catalogodecuentas.create')">
                                <i class="bi bi-plus-square-fill" style="color:#FFF; font-size:14pt;"></i>
                                 Crear Nueva</a>



                                 <a class="btn btn-secondary" style="margin-left:6px;" :href="route('catalogodecuentas.show','catalogo_cuentas')" target="_blank">
                                <i class="bi bi-printer" style="color:#FFF; font-size:14pt;"></i>
                                 Imprimir Cuentas</a>



                                 </div>
                                 <br>
                                    <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                        <th scope="col">id</th>
                                                        <th scope="col">Número de Cuenta</th>
                                                        <th scope="col">Nombre de la Cuenta</th>
                                                        <th scope="col">Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="catalogo_cuenta in catalogo_cuentas" :key="catalogo_cuenta.id_cuenta">
                                                        <th scope="row">{{ catalogo_cuenta.id_cuenta }}</th>
                                                        <td>{{ catalogo_cuenta.cuenta }}</td>
                                                        <td>{{ catalogo_cuenta.nombrecuenta }}</td>
                                                        <td>
                                                        <a class="btn btn-primary" :href="route('catalogodecuentas.edit', catalogo_cuenta.id_cuenta )" >
                                                            <i class="bi bi-pencil-square" style="color:#FFF; font-size:14pt;"></i> Editar
                                                        </a>

                                                        </td>

                                                        </tr>


                                                    </tbody>
                                                    </table>



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
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import JetNavLink from '@/Jetstream/NavLink.vue'

    export default {

        components: {
            AppLayout,
            Link,
            JetNavLink,
            },

        props: {
            catalogo_cuentas: Array,

        },
        }
</script>
