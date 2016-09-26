<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('title');
            $table->string('category');
            $table->string('sub_category');
            $table->decimal(10('weight', 5));
            $table->decimal(10('additional_jarti', 5));
            $table->decimal(10('wages', 5));
            $table->string('image');
            $table->string('status');
            $table->number('is_ready');
            $table->decimal(10('amount', 5));
            $table->text('notes');
            $table->text('material_description');
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
        Schema::drop('products');
    }
}
