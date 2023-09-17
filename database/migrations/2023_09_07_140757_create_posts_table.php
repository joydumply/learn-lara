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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullabel();
            $table->text('content');
            $table->unsignedBigInteger('likes')->nullabel();
            $table->boolean('is_published')->default(1);
            $table->timestamps();

            $table->softDeletes();

            /** OLD VERSION OF MIGRATION */
            // $table->unsignedBigInteger('category_id')->nullable();

            // $table->index('category_id', 'post_category_idx');

            // $table->foreign('category_id', 'post_category_fk')->on('categories')->references('id');



            
            $table->foreignId('category_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
