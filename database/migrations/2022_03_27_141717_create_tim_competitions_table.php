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
        Schema::create('tim_competitions', function (Blueprint $table) {
            $table->id();
            $table->uuid('code_uniq_tim');
            $table->string('name_tim')->unique()->required();
            $table->enum('level_tim',['sma','kuliah'])->default('kuliah');
            $table->string('institusi_name_tim')->required();
            $table->string('email_tim')->unique()->required();
            $table->string('username_telegram_tim')->unique()->required();
            $table->integer('no_hp_tim')->unique()->required();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('verivication_tim',['acc','revision', 'wait',])->default('wait');
            $table->dateTime('email_verivication_tim')->nullable();
            $table->enum('payment_tim',['acc', 'reject', 'wait'])->default('wait');
            $table->string('proof_of_payment_tim')->nullable();
            $table->foreignId('competition_id')->constrained('competitions')->onDelete('cascade');
            $table->string('link_competition_results')->nullable();
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
        Schema::dropIfExists('tim_competitions');
    }
};
