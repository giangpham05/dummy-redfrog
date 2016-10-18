<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('clients_answers');
        Schema::create('clients_answers', function (Blueprint $table) {
            $table->string('uuid',128);
            $table->integer('survey_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->mediumText('questionAnswer');

            $table->timestamp('created_at');
            $table->tinyInteger('isActive')->default(1);
            $table->date('date_deactivated')->nullable();

            $table->primary(['uuid', 'survey_id', 'question_id']);

            $table->foreign('uuid')
                ->references('id')->on('clients')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('survey_id')
                ->references('id')->on('surveys')
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
        Schema::dropIfExists('clients_answers');
    }
}
