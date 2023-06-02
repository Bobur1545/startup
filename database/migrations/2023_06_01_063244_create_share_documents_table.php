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
        Schema::create('share_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mydocuments_id')->index();
            $table->foreign('mydocuments_id')->references('id')->on('my_documents')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('share_documents');
    }
};
