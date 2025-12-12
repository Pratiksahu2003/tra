<?php

namespace App\Console\Commands;

use App\Models\Crypto;
use App\Services\CryptoApiService;
use Illuminate\Console\Command;

class UpdateCryptoPrices extends Command
{
    protected $signature = 'crypto:update-prices';
    protected $description = 'Update cryptocurrency prices from CoinGecko API';

    public function handle(CryptoApiService $apiService)
    {
        $this->info('Fetching cryptocurrency data from CoinGecko...');

        $apiData = $apiService->fetchCryptoData();
        
        if (!$apiData) {
            $this->error('Failed to fetch data from CoinGecko API');
            return Command::FAILURE;
        }

        $mappedData = $apiService->mapToDatabaseFormat($apiData);
        $updated = 0;

        foreach ($mappedData as $data) {
            $crypto = Crypto::updateOrCreate(
                ['symbol' => $data['symbol']],
                $data
            );
            
            if ($crypto->wasRecentlyCreated) {
                $this->info("Created: {$data['symbol']} - {$data['name']}");
            } else {
                $this->info("Updated: {$data['symbol']} - \${$data['price']}");
            }
            $updated++;
        }

        $this->info("Successfully updated {$updated} cryptocurrencies!");
        return Command::SUCCESS;
    }
}
