<?php

use Illuminate\Database\Eloquent\SoftDeletingScope;
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
        Schema::create('rent_equipment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade');
            $table->string('image');
            $table->string('title');
            $table->text('description');
            $table->string('slug');
            $table->string('phone');
            $table->longText('feature');
            $table->string('email');
            $table->string('price_per_day');
            $table->string('price_per_week');
            $table->string('address');
            $table->boolean('status');
            $table->boolean('is_available');
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_approved')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_equipment');
    }
};
