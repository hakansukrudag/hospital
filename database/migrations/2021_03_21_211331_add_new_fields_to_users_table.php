<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('age')->nullable();
            $table->string('image_path', 32)->nullable();
            $table->string('username')->nullable();
            $table->boolean('admin')->default(0);
            $table->unsignedBigInteger('fk_contact_id')->nullable();
            $table->unsignedBigInteger('fk_medicine_id')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('age');
            $table->dropColumn('image_path');
            $table->dropColumn('username');
            $table->dropColumn('admin');
            $table->dropColumn('fk_contact_id');
            $table->dropColumn('fk_medicine_id');
        });
    }
}
