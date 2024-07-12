<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTypeTable extends Migration
{
    public function up()
    {
        Schema::create('product_type', function (Blueprint $table) {
            $table->string('product_type_cd', 255)->primary();
            $table->string('name', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_type');
    }
}