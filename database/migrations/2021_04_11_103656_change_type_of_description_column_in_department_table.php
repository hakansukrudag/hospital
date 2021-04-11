<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTypeOfDescriptionColumnInDepartmentTable extends Migration
{
    public function up()
    {
        Schema::table('department', function (Blueprint $table) {
            $table->text('description')->change();
        });
    }

    public function down()
    {
        Schema::table('department', function (Blueprint $table) {
            $table->binary('description')->change();
        });
    }
}
