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
            if (!Schema::hasColumn('cryptos', 'rank')) {
                $table->unsignedInteger('rank')->nullable()->after('symbol');
            }
            if (!Schema::hasColumn('cryptos', 'market_cap')) {
                $table->decimal('market_cap', 20, 2)->nullable()->after('volume_24h');
            }
            if (!Schema::hasColumn('cryptos', 'high_24h')) {
                $table->decimal('high_24h', 20, 8)->nullable()->after('market_cap');
            }
            if (!Schema::hasColumn('cryptos', 'low_24h')) {
                $table->decimal('low_24h', 20, 8)->nullable()->after('high_24h');
            }
            if (!Schema::hasColumn('cryptos', 'circulating_supply')) {
                $table->decimal('circulating_supply', 20, 2)->nullable()->after('low_24h');
            }
            if (!Schema::hasColumn('cryptos', 'total_supply')) {
                $table->decimal('total_supply', 20, 2)->nullable()->after('circulating_supply');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cryptos', function (Blueprint $table) {
            $table->dropColumn(['rank', 'market_cap', 'high_24h', 'low_24h', 'circulating_supply', 'total_supply']);
        });
    }
};
