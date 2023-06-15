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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->integer('category_1')->default(0);
            $table->integer('category_2')->default(0);
            $table->integer('category_3')->default(0);
            $table->integer('category_4')->default(0);
            $table->integer('category_all')->default(0);

            $table->unsignedBigInteger('competition_id')->index();
            $table->foreign('competition_id')->references('id')->on('add_competitions')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
