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
        Schema::create('websites', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('domain');
            $table->unsignedBigInteger('organization_id');
            $table->unsignedBigInteger('industry_id');
            $table->unsignedBigInteger('plan_id')->nullable();
            $table->timestamp('plan_expired_at')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('organization_id')->on('organizations')->references('id');
            $table->foreign('industry_id')->on('industries')->references('id');
            $table->foreign('plan_id')->on('plans')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('websites', function (Blueprint $table) {
            $table->dropForeign(['organization_id']);
            $table->dropForeign(['industry_id']);
            $table->dropForeign(['plan_id']);
        });
        Schema::dropIfExists('websites');
    }
};
