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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('logo', 64)->nullable();
            $table->string('name', 128);
            $table->string('email', 64)->nullable();
            $table->string('phone', 64)->nullable();
            $table->string('whatsapp', 64)->nullable();
            $table->string('address', 128)->nullable();
            $table->string('postal_code', 5)->nullable();
            $table->string('city', 64)->nullable();
            $table->string('state', 64)->nullable();
            $table->string('country', 64)->nullable();
            $table->text('schedule')->nullable();
            $table->string('social_facebook', 128)->nullable();
            $table->string('social_twitter', 128)->nullable();
            $table->string('social_instagram', 128)->nullable();
            $table->string('social_youtube', 128)->nullable();
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
        Schema::dropIfExists('company');
    }
};
