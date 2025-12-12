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
        Schema::table('cryptos', function (Blueprint $table) {
            $table->decimal('market_cap', 20, 2)->nullable()->after('volume_24h');
            $table->decimal('high_24h', 20, 8)->nullable()->after('market_cap');
            $table->decimal('low_24h', 20, 8)->nullable()->after('high_24h');
            $table->decimal('circulating_supply', 20, 2)->nullable()->after('low_24h');
            $table->decimal('total_supply', 20, 2)->nullable()->after('circulating_supply');
            $table->integer('rank')->nullable()->after('total_supply');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cryptos', function (Blueprint $table) {
            $table->dropColumn(['market_cap', 'high_24h', 'low_24h', 'circulating_supply', 'total_supply', 'rank']);
        });
    }
};
