<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('sections');
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('strSectionTitle',255)->nullable();

            $table->text('strSectionDesc');

            $table->tinyInteger('isActive')->default(0);

            $table->timestamp('created_at');

            $table->tinyInteger('inheritFlag')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
