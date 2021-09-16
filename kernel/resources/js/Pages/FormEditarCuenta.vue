<template>
    <app-layout title="Editar Cuenta">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar Cuenta
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
                        <input id="id_cuenta" v-model="form.id_cuenta" type="hidden"
                                    aria-label="Ingrese información"  >
                                <div class="row" style="margin-top:50px; margin-bottom:50px;">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-4">
                                        <label class="form-label">Número de Cuenta</label>
                                    <input id="cuenta" v-model="form.cuenta" class="form-control" type="text"
                                    aria-label="Ingrese información" >
                                    </div>
                                    <div class="col-md-4">

                                        <label class="form-label">Nombre de la Cuenta</label>
                                        <input id="nombrecuenta" v-model="form.nombrecuenta" class="form-control" type="text">

                                    </div>
                                    <div class="col-md-3"><br>
                                    <button class="btn btn-primary" style="margin-top:7px;" type="submit" text="Guardar">Guardar</button>
                                        <a :href="route('catalogodecuentas.index')" style="margin-top: 7px;" class="btn btn-danger">Cancelar</a>
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

        props: ['arrayDB'],
        data(){

           return{
                form: {
                    id_cuenta: this.$props.arrayDB[0].id_cuenta,
                    cuenta: this.$props.arrayDB[0].cuenta,
                    nombrecuenta: this.$props.arrayDB[0].nombrecuenta,

                }
           };
        },
        methods:{
            submit(){

                this.$inertia.put(
                    route('catalogodecuentas.update',this.$props.arrayDB[0].id_cuenta),
                    this.form
                    );

            }
        }



        }
</script>
