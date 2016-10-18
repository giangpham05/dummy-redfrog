<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('question_section');
        Schema::create('question_section', function (Blueprint $table) {
            $table->integer('section_id')->unsigned();
            $table->integer('question_id')->unsigned();

            $table->tinyInteger('inheritFlag')->default(0);
            $table->tinyInteger('orderNo')->nullable();

            $table->primary(['section_id', 'question_id']);
            $table->foreign('section_id')
                ->references('id')->on('sections')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('question_id')
                ->references('id')->on('questions')
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
        Schema::dropIfExists('question_section');
    }
}
