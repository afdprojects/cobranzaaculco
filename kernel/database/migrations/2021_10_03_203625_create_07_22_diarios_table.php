<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create0722DiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('07_22_diarios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ingresos');
            $table->string('cuenta',255)->nullable();//recien obtenida del catalo de cuentas-> es el numero de c
            $table->string('recibo',255)->nullable();
            $table->date('fecha')->nullable();
            $table->text('nombre')->nullable();
            $table->string('rfc')->nullable();
            $table->string('clavecat')->nullable();
            $table->text('domicilio')->nullable();
            $table->string('concepto',255)->nullable();
            $table->string('periodo',255)->nullable();
            $table->string('nombrecuenta',255)->nullable();//Traida desde Catalodo de cuentas-> es el nombre
            $table->decimal('importe',8,2)->nullable();
            $table->decimal('recargos',8,2)->nullable();
            $table->decimal('iva',8,2)->nullable();
            $table->decimal('rezagos',8,2)->nullable();
            $table->decimal('gastosejec',8,2)->nullable();
            $table->decimal('multas',8,2)->nullable();
            $table->decimal('descuentos',8,2)->nullable();
            $table->decimal('total',8,2)->nullable();
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
        Schema::dropIfExists('07_22_diarios');
    }
}
