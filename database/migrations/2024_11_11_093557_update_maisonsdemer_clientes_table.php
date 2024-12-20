<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMaisonsdemerClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('maisonsdemer_clientes', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('maisonsdemer_clientes', function (Blueprint $table) {
            $table->integer('id')->change(); // Revertir el cambio de auto-incremento si es necesario
        });
    }
}
