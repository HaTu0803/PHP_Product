<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessTable extends Migration
{
    public function up()
    {
        Schema::create('business', function (Blueprint $table) {
            $table->date('incorp_date')->nullable();
            $table->string('name', 255);
            $table->string('state_id', 10);
            $table->unsignedInteger('cust_id');
            $table->timestamps();

            $table->foreign('cust_id')->references('cust_id')->on('customer')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('business');
    }
}