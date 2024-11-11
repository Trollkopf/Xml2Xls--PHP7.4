<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCollationOnMaionsdemerClientesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Cambiar el collation de la tabla a utf8mb4_unicode_ci
        DB::statement('ALTER TABLE maisonsdemer_clientes CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Revertir el collation de la tabla a utf8mb3_general_ci si es necesario
        DB::statement('ALTER TABLE maisonsdemer_clientes CONVERT TO CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci');
    }
}
