<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAppointmentsTableNameToAppointment extends Migration
{
    public function up()
    {
        Schema::rename('appointments', 'appointment');
    }

    public function down()
    {
        Schema::rename('appointment', 'appointments');
    }
}
