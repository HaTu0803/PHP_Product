<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficerTable extends Migration
{
    public function up()
    {
        Schema::create('officer', function (Blueprint $table) {
            $table->increments('officer_id');
           
            $table->date('end_date')->nullable();
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->date('start_date');
            $table->string('title', 20);

            $table->unsignedInteger('cust_id')->nullable();
            $table->timestamps();

            $table->foreign('cust_id')->references('cust_id')->on('customer')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('officer');
    }
}