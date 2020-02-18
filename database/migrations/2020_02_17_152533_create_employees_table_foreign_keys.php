<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTableForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('employees', function (Blueprint $table) {
            $table->foreign('position_id')
                ->references('id')
                ->on('positions')
                ->onDelete('set null');
            $table->foreign('head_id')
                ->references('id')
                ->on('employees')
                ->onDelete('set null');
            $table->foreign('admin_created_id')
                ->references('id')
                ->on('administrators')
                ->onDelete('set null');
            $table->foreign('admin_updated_id')
                ->references('id')
                ->on('administrators')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign('positions_id');
            $table->dropForeign('head_id');
            $table->dropForeign('admin_created_id');
            $table->dropForeign('admin_updated_id');
        });
    }
}
