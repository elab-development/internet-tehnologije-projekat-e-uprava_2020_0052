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
        Schema::create('zahtevi', function (Blueprint $table) {
            $table->id();
            $table->date('datumUsluge');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('usluga_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('usluga_id')->references('id')->on('usluge');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zahtevi');
    }
};
