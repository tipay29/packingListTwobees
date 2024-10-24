<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackingListsTable extends Migration
{

    public function up()
    {
        Schema::create('packing_lists', function (Blueprint $table) {
            $table->id();
            $table->string('pl_md')->nullable();
            $table->string('pl_brand')->nullable();
            $table->string('pl_factory_po')->nullable();
            $table->string('pl_po')->nullable();
            $table->string('pl_style_code')->nullable();
            $table->string('pl_color_code')->nullable();
            $table->string('pl_style_desc')->nullable();
            $table->string('pl_color_desc')->nullable();
            $table->date('pl_crd')->nullable();
            $table->string('pl_ship_mode')->nullable();
            $table->string('pl_destination')->nullable();
            $table->string('pl_customer_warehouse')->nullable();
            $table->integer('pl_total_qty')->default(0);
            $table->double('pl_total_nw')->default(0.00);
            $table->double('pl_total_gw')->default(0.00);
            $table->integer('pl_total_carton')->default(0);
            $table->double('pl_total_cbm')->default(0.00);
            $table->integer('pl_no_of_sizes')->nullable();
            $table->string('pl_name_of_sizes')->nullable();
            $table->string('pl_name_of_size_codes');
            $table->string('pl_quantities');
            $table->string('pl_status');
            $table->string('pl_mcq_basis');
            $table->unsignedInteger('batch_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('packing_lists');
    }
}
