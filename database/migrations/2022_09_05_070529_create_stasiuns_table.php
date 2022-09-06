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
        Schema::create('stasiuns', function (Blueprint $table) {
            $table->id();
            $table->string('daop');
            $table->string('nama_stasiun');
            $table->string('kodkod');
            $table->string('kmtsta');
            $table->string('line');
            $table->string('remark');
            $table->string('rel_aktif_no_bb');
            $table->string('ring');
            $table->string('segmen');
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
        Schema::dropIfExists('stasiuns');
    }
};
