<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultantsTable extends Migration
{
    public function up()
    {
        Schema::create('consultant', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->timestamps();
        });

        Schema::table('department', function (Blueprint $table) {
            $table->foreign('fk_consultant_id')
                  ->references('id')
                  ->on('consultant')
                  ->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::table('department', function (Blueprint $table) {
            $table->dropForeign('department_fk_consultant_id_foreign');
        });

        Schema::dropIfExists('consultant');
    }
}
