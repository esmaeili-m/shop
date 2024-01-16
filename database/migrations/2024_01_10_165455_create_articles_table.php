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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->unsignedBigInteger('category_id');
            $table->text('description')->nullable();
            $table->text('tags')->nullable();
            $table->text('image')->nullable();
            $table->boolean('status')->default(1);
            $table->bigInteger('order')->default(0);
            $table->integer('view')->default(0);
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
