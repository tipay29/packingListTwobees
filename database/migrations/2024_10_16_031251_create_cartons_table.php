<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartonsTable extends Migration
{

    public function up()
    {
        Schema::create('cartons', function (Blueprint $table) {
            $table->id();
            $table->string('ctn_measurement')->nullable();
            $table->double('ctn_weight')->nullable();
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cartons');
    }
}
