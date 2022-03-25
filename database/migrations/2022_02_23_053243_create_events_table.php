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
            $table->string('name_event')->unique();
            $table->string('slug_event')->unique();
            $table->date('start_event');
            $table->date('finish_event');
            $table->text('description_event');
            $table->string('status_event')->default('belum');
            $table->enum('active', ['draft', 'published'])->default('draft');
            $table->integer('registrant_event')->default(500);
            $table->string('thumbnail_event')->unique();
            $table->string('category_event')->nullable();
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
