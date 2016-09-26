<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkAssignmentDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_assignment_details', function (Blueprint $table) {
            $table->increments('id');
            $table->number('assignment_id');
            $table->number('material_id');
            $table->text('notes');
            $table->decimal(10('quantity', 5));
            $table->decimal(10('returned_quantity', 5));
            $table->decimal(10('extra_quantity', 5));
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('work_assignment_details');
    }
}
