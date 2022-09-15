<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('status_nodea');
            $table->string('detail_status_nodea');
            $table->string('location_nodea');
            $table->string('rack_nodea');
            $table->string('swicth_nodea');
            $table->string('request_number_nodea');
            $table->string('label_nodea');
            $table->string('cable_lenght_nodea');
            $table->string('status_nodeb');
            $table->string('detail_status_nodeb');
            $table->string('location_nodeb');
            $table->string('rack_nodeb');
            $table->string('switch_nodeb');
            $table->string('request_number_nodeb');
            $table->string('label_nodeb');
            $table->string('cable_lenght_nodeb');
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
        Schema::dropIfExists('services');
    }
};
