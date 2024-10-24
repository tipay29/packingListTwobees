<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchesTable extends Migration
{

    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('buy_year')->nullable();
            $table->string('buy_month')->nullable();
            $table->string('season')->nullable();
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('batches');
    }
}
