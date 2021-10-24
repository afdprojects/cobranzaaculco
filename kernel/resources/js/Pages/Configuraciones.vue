<template>
    <app-layout title="Configuraciones">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight"><span style="margin: 20px;"></span>
                Configuraciones del Recibo
            </h2>
        </template>
<div class="container-fluid">
<div class="container" style="margin-top:25px; margin-right:30px; margin-left:30px; background-color: #FFF; border-radius: 20px; box-shadow:">

        <div class="row">
<br>
                <div class="container" style="margin-top:20px; margin-bottom:20px !important; inset 0 -3em 3em rgba(0,0,0,0.1),
             0 0  0 2px rgb(255,255,255),
             0.3em 0.3em 1em rgba(0,0,0,0.3);">
             <br>
<div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-4 ">
                                <div class="card" style="width: 20rem;">
                                <img class="card-img-top" :src="arregloConfiguracion.logo" alt="Card image cap">
                                <div class="card-body">
                                    <h3 class="card-title">Nombre del Municipio:
                                        <br>
                                        <b>{{ arregloConfiguracion.nombremunicipio }}</b>
                                    </h3>
                                    <p class="card-text">La configuración del formato a imprimir puede ser cambiada en este apartado. La imagen mostrada
                                        es la de arriba, así como el nombre del municipio
                                        Si deseas puedes realizar cambios con el siguiente botón<br>
                                    </p><hr class="my-4">
                                    <a :href="route('configuraciones.edit', arregloConfiguracion.id)" class="btn btn-danger">
                                    <i  class="bi bi-box-arrow-in-up"></i>
                                        Modificar
                                    </a>

                                </div>
                                </div>
                        </div>
                        <div class="col-md-5" style="">
                            <h2 class="badge badge-secondary" style="background-color: #28a745; font-size:22pt;"><i class="bi bi-disc-fill"></i> Datos en MariaDB:</h2>
                            <br><br>
                            <span class="badge badge-primary" style="background-color: #007bff;">Información del municipio</span>
                            <p>Nombre de la imagen: <b>{{ arregloConfiguracion.logo }}</b></p>
                            <p>Nombre del municipio: <b>{{ arregloConfiguracion.nombremunicipio }}</b></p>
                            <br>
                            <span class="badge badge-primary" style="background-color: #007bff;">Metadatos</span>
                            <p>Fecha de alta: <b>{{ arregloConfiguracion.created_at }}</b></p>
                            <p>Fecha de actualización: <b>{{ arregloConfiguracion.updated_at }}</b></p>
                        <br>
                        <a :href="route('dashboard')" class="btn btn-danger">
                            <i class="bi bi-house-door-fill"></i>
                                        Regresar a Inicio
                        </a>
                        <hr class="my-4">
                        <h2 class="badge badge-secondary" style="background-color: #28a745; font-size:22pt;">
                        <i class="bi bi-clipboard-check"></i> Manual
                        </h2>
                        <br><br>
                        <ul>
                            <li>1. Debes Recortar tu imagen mientras más legible mejor, hazlo desde un editor externo: <a href="https://www.iloveimg.com/es/recortar-imagen" target="_blank" style="color:#007bff;">" Click Aquí "</a> si deseas recortarla</li>
                            <li>2. Das clic en el botón modificar en la Card a la izquierda </li>
                            <li>3. Cargas el Archivo recortado y das clic en subir </li>
                        </ul>

                        </div>

</div>
<br>
                </div>
                <br>

        </div>

</div>
<br><br>
</div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout';

    export default {
        props: {
            arregloConfiguracion: Array
        },
        components: {
            AppLayout
            }
        };
</script>
