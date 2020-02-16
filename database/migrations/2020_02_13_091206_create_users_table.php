<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique()->index();
            $table->string('password');
            $table->string('phone_number', 25);
            $table->string('profile_image')->nullable();
            $table->float('salary', 6, 3);
            $table->unsignedInteger('position_id')->index();
            $table->unsignedInteger('boss_id')->index();
            $table->date('date_of_employment');
            $table->unsignedInteger('admin_created_id');
            $table->unsignedInteger('admin_updated_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
