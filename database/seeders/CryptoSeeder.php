<?php

namespace Database\Seeders;

use App\Models\Crypto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CryptoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cryptos = [
            ['symbol' => 'BTC', 'name' => 'Bitcoin', 'price' => 43250.50, 'change_24h' => 2.45, 'volume_24h' => 28500000000],
            ['symbol' => 'ETH', 'name' => 'Ethereum', 'price' => 2650.75, 'change_24h' => -1.23, 'volume_24h' => 15200000000],
            ['symbol' => 'BNB', 'name' => 'Binance Coin', 'price' => 315.20, 'change_24h' => 0.85, 'volume_24h' => 1850000000],
            ['symbol' => 'SOL', 'name' => 'Solana', 'price' => 98.45, 'change_24h' => 5.67, 'volume_24h' => 2100000000],
            ['symbol' => 'ADA', 'name' => 'Cardano', 'price' => 0.52, 'change_24h' => -2.15, 'volume_24h' => 450000000],
            ['symbol' => 'XRP', 'name' => 'Ripple', 'price' => 0.62, 'change_24h' => 1.89, 'volume_24h' => 1200000000],
            ['symbol' => 'DOT', 'name' => 'Polkadot', 'price' => 7.25, 'change_24h' => 3.42, 'volume_24h' => 320000000],
            ['symbol' => 'DOGE', 'name' => 'Dogecoin', 'price' => 0.085, 'change_24h' => -0.95, 'volume_24h' => 580000000],
            ['symbol' => 'MATIC', 'name' => 'Polygon', 'price' => 0.92, 'change_24h' => 4.12, 'volume_24h' => 380000000],
            ['symbol' => 'AVAX', 'name' => 'Avalanche', 'price' => 36.80, 'change_24h' => 2.78, 'volume_24h' => 420000000],
            ['symbol' => 'LINK', 'name' => 'Chainlink', 'price' => 14.25, 'change_24h' => -1.45, 'volume_24h' => 280000000],
            ['symbol' => 'UNI', 'name' => 'Uniswap', 'price' => 6.50, 'change_24h' => 1.23, 'volume_24h' => 195000000],
            ['symbol' => 'LTC', 'name' => 'Litecoin', 'price' => 72.30, 'change_24h' => -0.67, 'volume_24h' => 450000000],
            ['symbol' => 'ATOM', 'name' => 'Cosmos', 'price' => 9.85, 'change_24h' => 2.34, 'volume_24h' => 180000000],
            ['symbol' => 'ETC', 'name' => 'Ethereum Classic', 'price' => 23.45, 'change_24h' => -1.89, 'volume_24h' => 220000000],
        ];

        foreach ($cryptos as $crypto) {
            Crypto::create($crypto);
        }
    }
}
