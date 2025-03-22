
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
    cd Saving-Wallet
    composer install
    npm install
    cp .env.example .env
    php artisan key:generate
    php artisan migrate
    php artisan storage:link
    php artisan db:seed
    composer run dev
```
    
## Running Tests
1. Set Up the Test Database:
    - Ensure you have a dedicated database for testing, such as saving-wallet-test.
    - Verify the database configuration in the .env.testing file to ensure it   points to the correct test database.

2. Run the Tests:
```bash
    php artisan test
```
#### Troubleshooting:
If you encounter errors during testing, create a Unit folder inside the tests/Feature directory. 
## Admin Panel Access
### Admin Credential
```bash
Email: admin@email.com
Password: admin@email.com
```
Admin URL:http://127.0.0.1:8000/admin/