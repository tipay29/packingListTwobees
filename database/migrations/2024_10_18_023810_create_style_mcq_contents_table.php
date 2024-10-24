<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStyleMcqContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('style_mcq_contents', function (Blueprint $table) {
            $table->id();
            $table->string('style_size')->nullable();
            $table->double('style_weight')->nullable();
            $table->string('carton_measurement')->nullable();
            $table->string('mcq')->nullable();
            $table->unsignedInteger('style_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('style_mcq_contents');
    }
}
