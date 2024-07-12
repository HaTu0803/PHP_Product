<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchTable extends Migration
{
    public function up()
    {
        Schema::create('branch', function (Blueprint $table) {
            $table->increments('branch_id');
            $table->string('address', 30)->nullable();
            $table->string('name', 20);
            $table->string('city', 20)->nullable();
            $table->string('state', 10)->nullable();
            $table->string('zip_code', 12)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('branch');
    }
}