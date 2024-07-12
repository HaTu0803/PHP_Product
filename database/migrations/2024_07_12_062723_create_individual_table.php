<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndividualTable extends Migration
{
    public function up()
    {
        Schema::create('individual', function (Blueprint $table) {
      
            $table->date('birth_date')->nullable();
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->unsignedInteger('cust_id');
            $table->timestamps();

            $table->foreign('cust_id')->references('cust_id')->on('customer')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('individual');
    }
}