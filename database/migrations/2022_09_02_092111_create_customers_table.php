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
            $table->date('inputdate');
            $table->string('companyname');
            $table->string('companyaddress');
            $table->string('phone');
            $table->string('npwp');
            $table->string('dealname');
            $table->string('position');
            $table->string('nohandphone');
            $table->string('emaildealname');
            $table->string('pictechnicalname');
            $table->string('position_pict');
            $table->string('phone_pict');
            $table->string('email_pict');
            $table->string('picfinacename');
            $table->string('position_picf');
            $table->string('phone_picf');
            $table->string('email_picf');
            $table->string('service');
            $table->string('project');
            $table->string('bandwidth');
            $table->string('node_a');
            $table->string('node_b');
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
