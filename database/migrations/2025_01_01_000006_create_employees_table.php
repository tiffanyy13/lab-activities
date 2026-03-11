<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->unsignedInteger('employee_id')->autoIncrement();
            $table->string('first_name', 20)->nullable();
            $table->string('last_name', 25);
            $table->string('email', 100);
            $table->string('phone_number', 20)->nullable();
            $table->date('hire_date');
            $table->unsignedInteger('job_id');
            $table->decimal('salary', 8, 2);
            $table->unsignedInteger('manager_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->timestamps();

            $table->foreign('job_id')
                  ->references('job_id')
                  ->on('hr_jobs')
                  ->onDelete('cascade');

            $table->foreign('manager_id')
                  ->references('employee_id')
                  ->on('employees')
                  ->onDelete('set null');

            $table->foreign('department_id')
                  ->references('department_id')
                  ->on('departments')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};