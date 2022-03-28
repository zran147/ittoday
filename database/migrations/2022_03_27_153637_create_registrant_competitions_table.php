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
        Schema::create('registrant_competitions', function (Blueprint $table) {
            $table->id();
            $table->string('name_registrant_competitions')->required();
            $table->string('provinsi_registrant_competitions')->required();
            $table->string('member_card_registrant_competitions')->nullable();
            $table->string('letter_active_member_card_registrant_competitions')->nullable();
            $table->enum('verivication_registrant_competitions', ['acc', 'revision', 'wait',])->default('wait');
            $table->string('message_registrant_competitions')->nullable();
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
        Schema::dropIfExists('registrant_competitions');
    }
};
