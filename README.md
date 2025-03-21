
# Saving Wallet

Built to help you save money, and see all your finances in one place.


## User Features

- Login and Register
- Transaction Management:
    - Add transactions by selecting from pre-defined categories or creating custom categories.
- Wallet Summary:
    - View a list of transactions.
    - See a summary of wallet balance, total income, and total expenses.

## Admin Features
- View a list of registered users with details such as name, email, phone, birthdate, total expenses, total income, wallet balance, and registration date.
## Tech Stack

**Backend**
- PHP Version: 8.3
- Laravel Version: 11
- inertia-laravel: 2.0
- MySql Database

**Frontend:** 
- Vue.js 3




## Installation

```bash
    git clone https://github.com/Rabie-s/Saving-Wallet.git
    composer install
    npm install
    npm run build
    cp .env.example .env
    php artisan key:generate
    php artisan migrate
    php artisan storage:link
    php artisan db:seed
    composer run dev
```
    
## Running Tests
```bash
    php artisan test
```
## Admin Panel Access
### Admin Credential
```bash
Email: admin@email.com
Password: admin@email.com
```
Admin URL:http://127.0.0.1:8000/admin/