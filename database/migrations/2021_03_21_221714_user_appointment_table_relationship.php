<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserAppointmentTableRelationship extends Migration
{
    public function up()
    {
        Schema::table('appointment', function (Blueprint $table) {
            $table->foreign('fk_user_id')
                  ->references('id')
                  ->on('users')
                  ->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::table('appointment', function (Blueprint $table) {
            $table->dropForeign('appointment_fk_user_id_foreign');
        });
    }
}
