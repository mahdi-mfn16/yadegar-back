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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collection_id');
            $table->text('front_text_1')->nullable();
            $table->text('front_text_2')->nullable();
            $table->text('front_text_3')->nullable();
            $table->text('back_text_1')->nullable();
            $table->text('back_text_2')->nullable();
            $table->text('back_text_3')->nullable();
            $table->timestamps();

            $table->foreign('collection_id')->on('collections')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->dropForeign(['collection_id']);
        });
        Schema::dropIfExists('cards');
    }
};