<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('survey_assignments');
        Schema::create('survey_assignments', function (Blueprint $table) {
            $table->string('uuid',128);
            $table->integer('survey_id')->unsigned();
            $table->timestamp('assign_timestamp');
            $table->dateTime('due_timestamp');
            $table->enum('assign_status', ['Complete', 'Incomplete'])->default('Incomplete');
            $table->date('date_activated')->nullable();
            $table->tinyInteger('active_flag')->default(1);
            $table->primary(['uuid', 'survey_id']);

            $table->foreign('uuid')
                ->references('id')->on('clients')
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
        Schema::dropIfExists('survey_assignments');
    }
}
