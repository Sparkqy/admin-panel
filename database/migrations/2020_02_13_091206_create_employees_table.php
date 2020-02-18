<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique()->index();
            $table->string('phone_number', 25);
            $table->string('profile_image')->nullable();
            $table->float('salary', 6, 3);
            $table->unsignedBigInteger('position_id')->nullable();
            $table->unsignedBigInteger('head_id')->nullable();
            $table->unsignedBigInteger('admin_created_id')->nullable();
            $table->unsignedBigInteger('admin_updated_id')->nullable();
            $table->date('date_of_employment');
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
        Schema::dropIfExists('employees');
    }
}
