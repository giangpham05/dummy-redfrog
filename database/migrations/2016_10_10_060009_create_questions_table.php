<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('questions');
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->text('strQuestionTitle');

            $table->tinyInteger('question_types_id');

            $table->tinyInteger('intAgeLower');
            $table->tinyInteger('intAgeUpper');
            $table->timestamp('created_at');

            $table->tinyInteger('inheritFlag')->default(0);
            $table->tinyInteger('orderNo')->default(null);

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
        Schema::dropIfExists('questions');
    }
}
