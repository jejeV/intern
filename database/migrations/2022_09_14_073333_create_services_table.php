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
            $table->foreignId('customer_id');
            $table->enum('status_node_a',['submit interkoneksi diportal apjii', 'aproved nni by partner (isp)', 'pre survey by apjii, update cable length', 'drop kabel patchcord', 'penarikan kabel patchcord by apjii', 'konfirmasi jadwal aktivasi by customer', 'penjadwalan aktivasi by ije', 'node a aktif']);
            $table->string('detail_status_node_a');
            $table->string('location_node_a');
            $table->string('rack_node_a');
            $table->string('swicth_node_a');
            $table->string('request_number_node_a');
            $table->string('label_node_a');
            $table->enum('cable_lenght_node_a',['5','10','15','20','25','30','35','40','45','50']);
            $table->enum('status_node_b',['pre survey by isp & ije', 'penarikan kabel interkoneksi stasiun', 'konfirmasi jadwal aktivasi by customer', 'penjadwalan aktivasi by ije', 'node b aktif']);
            $table->string('detail_status_node_b');
            $table->string('location_node_b');
            $table->string('rack_node_b');
            $table->string('switch_node_b');
            $table->string('request_number_node_b');
            $table->string('label_node_b');
            $table->enum('cable_lenght_node_b',['5', '10', '15', '20', '25', '30', '35', '40', '45', '50']);
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
