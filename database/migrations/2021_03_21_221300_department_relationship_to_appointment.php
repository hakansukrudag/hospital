<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DepartmentRelationshipToAppointment extends Migration
{
    public function up()
    {
        Schema::table('appointment', function (Blueprint $table) {
            $table->foreign('fk_department_id')
                  ->references('id')
                  ->on('department')
                  ->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::table('appointment', function (Blueprint $table) {
            $table->dropForeign('appointment_fk_department_id_foreign');
        });
    }
}
