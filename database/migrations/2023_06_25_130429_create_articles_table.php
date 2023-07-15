<?php

use Illuminate\Database\Eloquent\Relations\HasMany;
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
            $table->string('slug' , 250)->unique();
            $table->integer('view_count')->default(0);
            $table->string('category' , 40);
            $table->string('title' , 100)->unique();
            $table->text('content');
            $table->string('source' , 40);
            $table->string('source_link' , 250);
            $table->string('image_link' , 250);
            $table->dateTime('date');
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
