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
            // Infomasi Administrasi Tim
            $table->uuid('code_uniq_tim')->unique()->required();
            $table->string('name_tim')->unique()->required();
            $table->enum('level_tim',['sma','kuliah'])->default('kuliah');
            $table->string('institusi_name_tim')->required();
            $table->string('email_tim')->unique()->required();
            $table->string('username_telegram_tim')->unique()->required();
            $table->string('no_hp_tim',100)->unique()->required();
            $table->foreignId('registrant_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('competition_id')->constrained('competitions')->onDelete('cascade');
            $table->integer('participant')->required();
            // end Infomasi Administrasi Tim

            $table->foreignId('admin_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->dateTime('email_verification_tim')->nullable();

            // Infomasi Pembayaran Tim
            $table->string('proof_of_payment_tim')->nullable();
            $table->string('bank_account_name_payment_tim')->nullable();
            $table->integer('payment_fee_payment_tim')->nullable();
            // end Infomasi Pembayaran Tim

            $table->string('status_verification_tim')->default('waiting verification administration');
            /*
            waiting verification administration ,
            acc verification administration ,
            rejected verification administration,
            waiting verification payment,
            acc verification payment,
            rejected verification payment,
            tim successful varification,
            */

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
