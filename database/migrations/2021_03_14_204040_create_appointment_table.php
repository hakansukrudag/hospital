<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTable extends Migration
{
    public function up()
    {
        Schema::create(
            'appointments',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->datetime('date_time')->nullable();
                $table->unsignedBigInteger('fk_department_id')->nullable();
                $table->unsignedBigInteger('fk_user_id')->nullable();
                $table->unsignedBigInteger('fk_procedure_id')->nullable();
                $table->timestamps();
            }
        );
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
