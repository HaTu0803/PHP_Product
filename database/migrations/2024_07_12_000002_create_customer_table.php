<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('cust_id');
            $table->string('address', 30)->nullable();
            $table->string('city', 20)->nullable();
            $table->string('cust_type_cd', 1);
            $table->string('fed_id', 12);

            $table->string('postal_code', 10)->nullable();

            $table->string('state', 20)->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
