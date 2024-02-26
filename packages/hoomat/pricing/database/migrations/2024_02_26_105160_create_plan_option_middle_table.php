<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_option_middle', function (Blueprint $table) {
            $table->id();
            $table->string('plan_id');
            $table->boolean('plan_option_id');
            $table->timestamps();

            $table->foreign('plan_id')->on('plans')->references('id');
            $table->foreign('plan_option_id')->on('plan_options')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plan_option_middle', function (Blueprint $table) {
            $table->dropForeign(['plan_id']);
            $table->dropForeign(['plan_option_id']);
        });
        Schema::dropIfExists('plan_option_middle');
    }
};