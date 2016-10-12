<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('options');
        Schema::create('options', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('questionOption',100);
            $table->tinyInteger('question_types_id');
            $table->tinyInteger('inheritFlag');
            $table->foreign('question_types_id')
                ->references('id')->on('question_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
    }
}
