<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->increments('emp_id');
            $table->date('end_date')->nullable();
            $table->string('First_name', 20);
            $table->string('Last_name', 20);
            $table->date('start_date');
            $table->string('title', 20)->nullable();
            $table->unsignedInteger('assigned_branch_id')->nullable();
            $table->unsignedInteger('dept_id')->nullable();
            $table->unsignedInteger('superior_emp_id')->nullable();

            $table->timestamps();
            $table->foreign('assigned_branch_id')->references('branch_id')->on('branch')->onDelete('cascade');

            $table->foreign('dept_id')->references('dept_id')->on('department')->onDelete('cascade');
            $table->foreign('superior_emp_id')->references('emp_id')->on('employee')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee');
    }
}