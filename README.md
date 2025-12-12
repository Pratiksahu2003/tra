# Crypto Trading Platform

A modern Laravel-based cryptocurrency trading platform with authentication, portfolio management, and real-time trading capabilities.

## Features

- 🔐 **Authentication System** - Laravel Breeze authentication with dark mode support
- 💰 **Crypto Trading** - Buy and sell Crypto Market
- 📊 **Portfolio Management** - Track your holdings and performance
- 📈 **Dashboard** - View portfolio value, profit/loss, and recent transactions
- 🎨 **Modern UI** - Beautiful, responsive design with Tailwind CSS
- ⚡ **Axios Integration** - Seamless API calls for trading operations
- 🔔 **Sweet Alert 2** - Beautiful alerts for user feedback
- 📱 **Responsive Design** - Works on all devices

## Requirements

- PHP >= 8.2
- Composer
- Node.js & NPM
- SQLite (or MySQL/PostgreSQL)

## Installation

1. **Install PHP Dependencies**
   ```bash
   composer install
   ```

2. **Install Node Dependencies**
   ```bash
   npm install
   ```

3. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Setup**
   ```bash
   php artisan migrate
   php artisan db:seed --class=CryptoSeeder
   ```

5. **Build Assets**
   ```bash
   npm run build
   ```

6. **Start Development Server**
   ```bash
   php artisan serve
   ```

   For development with hot reload:
   ```bash
   npm run dev
   ```

## Default User

- **Email:** test@example.com
- **Password:** password

(You can register a new user or use the seeder)

## Usage

### Public Pages (No Login Required)
1. **Homepage** (`/`) - Beautiful landing page showcasing the platform
2. **Public Crypto List** (`/cryptos/public`) - Browse all Crypto Market without logging in

### Authenticated Pages (Login Required)
1. **Register/Login** - Create an account or login with the default credentials
2. **Dashboard** (`/dashboard`) - Overview of your portfolio, stats, and recent activity
3. **Browse Crypto Market** (`/cryptos`) - View all available Crypto Market
4. **Trade** (`/cryptos/{id}`) - Click on any cryptocurrency to buy or sell
5. **Portfolio** (`/portfolio`) - Check your holdings and performance
6. **Transaction History** (`/transactions`) - View all your past transactions

## Project Structure

```
app/
├── Http/Controllers/
│   ├── CryptoController.php      # Crypto listing and details
│   ├── DashboardController.php    # Dashboard data
│   ├── PortfolioController.php   # Portfolio management
│   └── TransactionController.php # Buy/sell transactions
├── Models/
│   ├── Crypto.php                # Cryptocurrency model
│   ├── Portfolio.php             # User portfolio model
│   └── Transaction.php           # Transaction model

resources/
├── views/
│   ├── cryptos/                  # Crypto listing and trading views
│   ├── portfolio/                # Portfolio views
│   ├── transactions/             # Transaction history views
│   └── dashboard.blade.php       # Main dashboard

routes/
├── web.php                       # Web routes
└── api.php                       # API routes
```

## Technologies Used

- **Laravel 12** - PHP Framework
- **Laravel Breeze** - Authentication scaffolding
- **Tailwind CSS** - Utility-first CSS framework
- **Alpine.js** - Lightweight JavaScript framework
- **Axios** - HTTP client
- **Sweet Alert 2** - Beautiful alerts
- **Vite** - Build tool

## API Endpoints

All API endpoints require authentication (`auth:sanctum` middleware):

- `GET /api/cryptos` - List all Crypto Market
- `GET /api/cryptos/{id}` - Get crypto details
- `GET /api/portfolio` - Get user portfolio
- `GET /api/transactions` - Get user transactions
- `POST /api/transactions` - Create a new transaction (buy/sell)

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
