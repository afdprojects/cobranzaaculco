<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create0123PadrondecomerciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('01_23_padrondecomercios', function (Blueprint $table) {
            $table->id();
             $table->bigInteger('id_padron_comercios')->nullable();
            $table->string('registromunicipal',255)->nullable();
            $table->string('rfc',255)->nullable();
            $table->string('nombre',255)->nullable();
            $table->string('apellidopaterno',255)->nullable();
            $table->string('apellidomaterno',255)->nullable();
            $table->string('domicilio',255)->nullable();
            $table->string('poblacion',255)->nullable();
            $table->string('giro',255)->nullable();
            $table->string('razonsocial',255)->nullable();
            $table->string('domicilionegocio',255)->nullable();
            $table->string('fechainioperacion',255)->nullable();
            $table->string('superficiedeterreno',255)->nullable();
            $table->string('tipodemovimiento',255)->nullable();
            $table->string('periododepago',255)->nullable();
            $table->decimal('importe',8,2)->nullable();
            $table->string('horarioapertura',255)->nullable();
            $table->string('horariocierre',255)->nullable();
            $table->string('fecha',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('01_23_padrondecomercios');
    }
}
