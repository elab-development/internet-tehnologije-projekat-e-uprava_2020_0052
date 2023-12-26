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
        Schema::table('usluge', function (Blueprint $table) {
            $table->decimal('cenaUsluge', 8, 2)->after('opisUsluge')->default(0.00);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usluge', function (Blueprint $table) {
            $table->dropColumn('cenaUsluge');
        });
    }
};
