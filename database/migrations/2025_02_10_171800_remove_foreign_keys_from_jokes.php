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
        Schema::table('jokes', function (Blueprint $table) {
          
            $table->dropForeign(['author_id']); 
            $table->dropForeign(['category_id']); 
        });
    }
    
    public function down(): void
    {
        Schema::table('jokes', function (Blueprint $table) {
            
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }
    
};
