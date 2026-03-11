<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->unsignedInteger('department_id')->autoIncrement();
            $table->string('department_name', 30);
            $table->unsignedInteger('location_id')->nullable();
            $table->timestamps();

            $table->foreign('location_id')
                  ->references('location_id')
                  ->on('locations')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};