<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->string('product_cd', 10)->primary();
            $table->date('date_offered')->nullable();
            $table->date('date_retired')->nullable();
            $table->string('name', 50);
            $table->string('product_type_cd', 255)->nullable();

            // $table->float('type_id')->nullable();

            $table->timestamps();

            $table->foreign('product_type_cd')->references('product_type_cd')->on('product_type')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product');
    }
}