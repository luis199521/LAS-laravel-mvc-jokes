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
        Schema::create('jokes', function (Blueprint $table) {
            $table->id();
            $table->text('joke');
            $table->unsignedBigInteger('category_id')->default(1);
            $table->string('tags')->nullable()->default(null);
            $table->unsignedBigInteger('author_id')->default(1);
            $table->timestamps();
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jokes');
    }
};
