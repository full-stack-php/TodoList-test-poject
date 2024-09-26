<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_categories', function (Blueprint $table) {
            $table->integer('task_id')->unsigned();
            $table->integer('category_id')->unsigned();

            $table->primary(['task_id', 'category_id']);
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_categories');
    }
}
