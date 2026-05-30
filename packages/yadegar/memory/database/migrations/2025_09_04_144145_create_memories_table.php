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
        Schema::create('memories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('folder_id')->nullable();
            $table->string('title')->nullable();
            $table->text('text')->nullable();
            // private: فقط خودم
            // family: خودم و خانواده
            // public: همه با نام من
            // anonymous: همه بدون نام من
            $table->string('visibility')->default('private');
            $table->string('location')->nullable();
            $table->timestamp('date')->nullable();
            $table->timestamps();

            $table->foreign('folder_id')->on('folders')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memories');
    }
};