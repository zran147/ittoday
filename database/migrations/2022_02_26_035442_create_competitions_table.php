<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('name_competition')->required()->unique();
            $table->string('slug_competition')->required()->unique();
            $table->date('start_registrasi_competition')->required();
            $table->date('finish_registrasi_competition')->required();
            $table->string('link_twibon_competition')->required();
            $table->enum('active', ['draft', 'published'])->default('draft');
            $table->string('rule_book_competition')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('competitions');
    }
};
