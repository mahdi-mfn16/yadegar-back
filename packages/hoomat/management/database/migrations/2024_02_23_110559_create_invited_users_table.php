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
        Schema::create('invited_users', function (Blueprint $table) {
            $table->id();

            $table->string('email');
            $table->unsignedBigInteger('organization_id');
            $table->unsignedBigInteger('access_level_id');
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('organization_id')->on('organizations')->references('id');
            $table->foreign('access_level_id')->on('access_levels')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invited_users', function (Blueprint $table) {
            $table->dropForeign(['organization_id']);
            $table->dropForeign(['access_level_id']);
        });
        Schema::dropIfExists('invited_users');
    }
};
