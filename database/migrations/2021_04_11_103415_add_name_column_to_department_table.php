<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameColumnToDepartmentTable extends Migration
{
    public function up()
    {
        Schema::table(
            'department',
            function (Blueprint $table) {
                $table->string('name', 32)->after('id');
            }
        );
    }

    public function down()
    {
        Schema::table(
            'department',
            function (Blueprint $table) {
                $table->dropColumn('name');
            }
        );
    }
}
