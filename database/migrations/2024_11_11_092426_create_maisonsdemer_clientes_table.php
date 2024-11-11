<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaisonsdemerClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maisonsdemer_clientes', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->tinyInteger('activo')->default(0)->comment('checkbox');
            $table->tinyInteger('directo')->default(0)->comment('checkbox');
            $table->integer('telesales_id')->nullable();
            $table->integer('admin_id')->nullable();
            $table->integer('fuente_id')->nullable();
            $table->integer('estatus_id')->nullable();
            $table->string('nombre')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('telefono_alt')->nullable();
            $table->string('movil')->nullable();
            $table->string('direccion')->nullable();
            $table->string('localidad')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('pais')->nullable();
            $table->integer('nacionalidad_id')->nullable();
            $table->string('idioma')->nullable()->comment('options:es,en,nl,ru,fr,it,ro,no,se,fi,pl,de');
            $table->text('notas')->nullable();
            $table->text('criterios_json')->nullable()->comment('noedit');
            $table->text('frecuencia_json')->nullable()->comment('noedit');
            $table->text('contenido_json')->nullable()->comment('noedit');
            $table->date('fecha_creado')->nullable();
            $table->date('fecha_modificado')->nullable();
            $table->integer('clientes_tipo_id')->nullable();
            $table->string('fuente')->nullable();
            $table->text('visitadas_json')->nullable()->comment('noedit');
            $table->string('tipo')->nullable();
            $table->integer('pais_id')->nullable();
            
            $table->engine = 'MyISAM';
            $table->charset = 'utf8mb3';
            $table->collation = 'utf8mb3_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maisonsdemer_clientes');
    }
}
