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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('salesname');
            $table->string('companyname');
            $table->string('node_a');
            $table->string('node_b');
            $table->string('product');
            $table->string('ring');
            $table->string('bandwidth'); 
            $table->string('pair'); 
            $table->string('km'); 
            $table->string('so'); 
            $table->string('cid'); 
            $table->string('sid'); 
            $table->string('net_active'); 
            $table->date('active_date')->nullable(); 
            $table->string('hh_access'); 
            $table->string('backbone'); 
            $table->string('update_node_a'); 
            $table->string('update_node_b'); 
            $table->string('port_node_a'); 
            $table->string('port_node_b'); 
            $table->string('status')->default('tidak aktif');
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
        Schema::dropIfExists('customers');
    }
};
