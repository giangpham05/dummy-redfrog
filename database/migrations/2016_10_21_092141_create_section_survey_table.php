<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('section_survey');
        Schema::create('section_survey', function (Blueprint $table) {
            $table->increments('id')->unsigned();

            $table->integer('survey_id')->unsigned();
            $table->integer('section_id')->unsigned();

            $table->timestamp('created_at');
            $table->tinyInteger('inheritFlag')->default(0);
            $table->tinyInteger('orderNo')->nullable();

            $table->foreign('section_id')
                ->references('id')->on('sections')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('survey_id')
                ->references('id')->on('surveys')
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
        Schema::dropIfExists('section_survey');
    }
}
