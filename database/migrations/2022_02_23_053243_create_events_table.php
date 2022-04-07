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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name_event')->required()->unique();
            $table->string('slug_event')->required()->unique();
            $table->date('start_event')->required();
            $table->date('finish_event')->required();
            $table->text('description_event')->required();
            $table->string('status_event')->default('belum');
            $table->enum('active', ['draft', 'published'])->default('draft');
            $table->integer('registrant_event')->default(500);
            $table->string('thumbnail_event')->unique();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
