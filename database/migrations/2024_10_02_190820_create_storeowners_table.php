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
        Schema::create('storeowners', function (Blueprint $table) {
            $table->id();
            $table->string('store_name');
            $table->string('store_description');
            $table->string('store_slug')->unique();
            $table->string('status');
            $table->foreignId('user_id')->constrained(
                table: 'users',
                indexName: 'storeowners_user_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('storeowners');
    }
};
