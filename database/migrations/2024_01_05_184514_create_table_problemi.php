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
        Schema::create('problemi', function (Blueprint $table) {
            $table->id();
            $table->string('nazivProblema');
            $table->text('opisProblema');
            $table->unsignedBigInteger('user_id');
            $table->date('datumPrijave');
            $table->enum('status', ['NOVO', 'PRIHVACENO', 'ZAVRSENO'])->default('NOVO');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('problemi');
    }
};
