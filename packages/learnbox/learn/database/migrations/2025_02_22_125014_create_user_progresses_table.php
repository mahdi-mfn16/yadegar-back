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
        Schema::create('user_progresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('box_id');
            $table->unsignedBigInteger('card_id');
            $table->timestamp('next_review_date');
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('box_id')->on('boxes')->references('id');
            $table->foreign('card_id')->on('cards')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_progresses', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['box_id']);
            $table->dropForeign(['card_id']);
        });
        Schema::dropIfExists('user_progresses');
    }
};