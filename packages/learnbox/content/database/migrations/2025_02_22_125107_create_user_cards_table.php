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
        Schema::create('user_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_collection_id');
            $table->unsignedBigInteger('card_id');
            $table->text('front_text_1')->nullable();
            $table->text('front_text_2')->nullable();
            $table->text('front_text_3')->nullable();
            $table->text('back_text_1')->nullable();
            $table->text('back_text_2')->nullable();
            $table->text('back_text_3')->nullable();
            $table->timestamps();

            $table->foreign('user_collection_id')->on('user_collections')->references('id');
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
        Schema::table('user_cards', function (Blueprint $table) {
            $table->dropForeign(['user_collection_id']);
            $table->dropForeign(['collection_id']);
        });
        Schema::dropIfExists('user_cards');
    }
};