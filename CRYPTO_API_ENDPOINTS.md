# Crypto API Endpoints

## Available Endpoints

### 1. Get All Possible Crypto Coins List
**Endpoint:** `GET /api/cryptos/list/all`

Returns a list of ALL available Crypto Market from CoinGecko (thousands of coins).

**Query Parameters:**
- `search` (optional): Filter by name, symbol, or id
- `limit` (optional): Limit the number of results (default: 1000)

**Example Requests:**
```
GET /api/cryptos/list/all
GET /api/cryptos/list/all?search=bitcoin
GET /api/cryptos/list/all?search=eth&limit=50
```

**Response:**
```json
{
  "success": true,
  "total": 15000,
  "data": [
    {
      "id": "bitcoin",
      "symbol": "btc",
      "name": "Bitcoin"
    },
    {
      "id": "ethereum",
      "symbol": "eth",
      "name": "Ethereum"
    },
    ...
  ]
}
```

### 2. Get Top Crypto Market by Market Cap
**Endpoint:** `GET /api/cryptos/top`

Returns top Crypto Market sorted by market cap with full price data.

**Query Parameters:**
- `page` (optional): Page number (default: 1)
- `per_page` (optional): Results per page, max 250 (default: 250)

**Example Requests:**
```
GET /api/cryptos/top
GET /api/cryptos/top?page=1&per_page=100
GET /api/cryptos/top?page=2&per_page=50
```

**Response:**
```json
{
  "success": true,
  "page": 1,
  "per_page": 250,
  "total": 250,
  "data": [
    {
      "id": "bitcoin",
      "symbol": "BTC",
      "name": "Bitcoin",
      "current_price": 43250.50,
      "market_cap": 850000000000,
      "market_cap_rank": 1,
      "price_change_percentage_24h": 2.5,
      "total_volume": 25000000000,
      "high_24h": 44000,
      "low_24h": 42000,
      "image": "https://..."
    },
    ...
  ]
}
```

### 3. Get Paginated Cryptos (From Database)
**Endpoint:** `GET /api/cryptos`

Returns paginated list of Crypto Market stored in your database.

**Query Parameters:**
- `page` (optional): Page number (default: 1)
- `per_page` (optional): Results per page (default: 20)

**Example:**
```
GET /api/cryptos?page=1&per_page=20
```

### 4. Get Real-time Prices
**Endpoint:** `GET /api/cryptos/realtime`

Returns real-time prices for all cryptos in the database.

**Example:**
```
GET /api/cryptos/realtime
```

## Usage Examples

### Get All Bitcoin-related Coins
```javascript
axios.get('/api/cryptos/list/all?search=bitcoin')
  .then(response => {
    console.log(response.data.data); // Array of all Bitcoin-related coins
  });
```

### Get Top 100 Crypto Market
```javascript
axios.get('/api/cryptos/top?per_page=100')
  .then(response => {
    console.log(response.data.data); // Top 100 cryptos by market cap
  });
```

### Search for Specific Coin
```javascript
axios.get('/api/cryptos/list/all?search=ethereum&limit=10')
  .then(response => {
    console.log(response.data.data); // Ethereum-related coins
  });
```

## Notes

- The `/api/cryptos/list/all` endpoint fetches data directly from CoinGecko API and may take a few seconds
- The `/api/cryptos/top` endpoint also fetches live data from CoinGecko
- CoinGecko has rate limits, so use these endpoints responsibly
- The `/api/cryptos` endpoint returns data from your local database

