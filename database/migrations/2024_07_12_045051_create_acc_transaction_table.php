<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccTransactionTable extends Migration
{
    public function up()
    {
        Schema::create('acc_transaction', function (Blueprint $table) {
            $table->bigIncrements('txn_id');
            $table->float('amount');
            $table->dateTime('funds_avail_date');
            $table->dateTime('txn_date');
            $table->string('txn_type_cd', 10)->nullable();
            $table->unsignedInteger('account_id')->nullable();
            $table->unsignedInteger('execution_branch_id')->nullable();
            $table->unsignedInteger('teller_emp_id')->nullable();

            $table->foreign('account_id')->references('account_id')->on('account')->onDelete('cascade');
            $table->foreign('execution_branch_id')->references('branch_id')->on('branch')->onDelete('cascade');
            $table->foreign('teller_emp_id')->references('emp_id')->on('employee')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('acc_transaction');
    }
}