<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProceduresTable extends Migration
{
    public function up()
    {
        Schema::create('procedure', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->timestamps();
        });

        Schema::table('appointment', function (Blueprint $table) {
            $table->foreign('fk_procedure_id')
                  ->references('id')
                  ->on('procedure')
                  ->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::table('appointment', function (Blueprint $table) {
            $table->dropForeign('appointment_fk_procedure_id_foreign');
        });

        Schema::dropIfExists('procedure');
    }
}
