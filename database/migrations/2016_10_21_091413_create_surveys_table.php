<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('surveys');
        Schema::create('surveys', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('strSurveyName',200);
            $table->text('strSurveyDesc');
            $table->string('slug',128)->unique();
            $table->date('date_activated')->nullable();
            $table->tinyInteger('isActive')->default(0);
            $table->tinyInteger('inheritFlag')->default(0);
            $table->timestamps();
            $table->string('hash_id',255)->default('0');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surveys');
    }
}
