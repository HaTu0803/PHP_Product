<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTable extends Migration
{
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->increments('account_id');
            $table->float('avail_balance')->nullable();
            $table->date('close_date')->nullable();
            $table->date('last_activity_date')->nullable();
            $table->date('open_date');
            $table->float('pending_balance')->nullable(); 
            $table->string('status', 10)->nullable();

            $table->unsignedInteger('cust_id')->nullable();
            $table->unsignedInteger('open_branch_id');
            $table->unsignedInteger('open_emp_id');
            $table->string('product_cd', 10);

            $table->foreign('cust_id')->references('cust_id')->on('customer')->onDelete('cascade');
            $table->foreign('open_branch_id')->references('branch_id')->on('branch')->onDelete('cascade');
            $table->foreign('open_emp_id')->references('emp_id')->on('employee')->onDelete('cascade');
            $table->foreign('product_cd')->references('product_cd')->on('product')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('account');
    }
}