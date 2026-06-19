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
            if (!Schema::hasColumn('users', 'role')) {
                $table->enum('role', ['student', 'admin'])->default('student')->after('password');
            }
            if (!Schema::hasColumn('users', 'xp')) {
                $table->integer('xp')->default(0)->after('role');
            }
            if (!Schema::hasColumn('users', 'semester')) {
                $table->string('semester')->nullable()->after('xp');
            }
            if (!Schema::hasColumn('users', 'branch')) {
                $table->string('branch')->nullable()->after('semester');
            }
            if (!Schema::hasColumn('users', 'bio')) {
                $table->text('bio')->nullable()->after('branch');
            }
            if (!Schema::hasColumn('users', 'last_login_at')) {
                $table->timestamp('last_login_at')->nullable()->after('bio');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'xp', 'semester', 'branch', 'bio', 'last_login_at']);
        });
    }
};
