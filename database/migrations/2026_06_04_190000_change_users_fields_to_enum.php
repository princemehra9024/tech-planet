<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', [
                'student', 
                'admin', 
                'president', 
                'secretary', 
                'treasurer', 
                'media_manager'
            ])->default('student')->change();
            
            $table->enum('course', ['MCA', 'IMCA'])->nullable()->change();
            
            $table->enum('semester', [
                '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'Graduated'
            ])->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('student')->change();
            $table->string('course')->nullable()->change();
            $table->string('semester')->nullable()->change();
        });
    }
};
