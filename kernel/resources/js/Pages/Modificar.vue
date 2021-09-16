<template>
    <app-layout title="Modificar">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Modificar
            </h2>
        </template>
    <div class="container-fluid" >
        <div class="container" style="margin-top:25px; margin-right:30px; margin-left:30px; background-color: #FFF; border-radius: 20px; box-shadow:">
            <div class="row">
                <form class="container" @submit.prevent="submit" style="margin-top:20px; margin-bottom:20px !important; inset 0 -3em 3em rgba(0,0,0,0.1),
             0 0  0 2px rgb(255,255,255),
             0.3em 0.3em 1em rgba(0,0,0,0.3);">
                    <div class="row" style="margin-top:50px; margin-bottom:50px;">
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <label class="form-label">Cambia el nombre del municipio</label>
                        <input id="nombremunicipio" v-model="form.nombremunicipio" class="form-control" type="text"
                        aria-label="Ingrese información" >
                        </div>
                        <div class="col-md-4">

                            <label class="form-label">Selecciona el logo</label>
                            <input id="logo"  class="form-control" type="file"
                            @input="form.logo = $event.target.files[0]" >

                        </div>
                        <div class="col-md-2"><br>
                        <button class="btn btn-primary" style="margin-top:7px;" type="submit" text="Guardar">Guardar</button>
                            <a style="margin-top: 7px;" :href="route('configuraciones.index')" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>


                </form>
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
        props: ['arregloConfiguracion'],
        data(){
            return{
                form: {
                    nombremunicipio: this.$props.arregloConfiguracion.nombremunicipio,
                    logo: this.$props.arregloConfiguracion.logo,
                },
            };
        },
        methods: {
            submit(){
                //this.$inertia.put(route('configuraciones.update',
                //this.$props.arregloConfiguracion.id),
                //this.form      );
                this.$inertia.post(route('configuraciones.update', this.$props.arregloConfiguracion.id),
                    {
                        _method:'put',
                        nombremunicipio: this.form.nombremunicipio,
                        logo: this.form.logo,
                    });

            },
        },



        }
</script>
