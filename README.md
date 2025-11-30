# 🏦 BankFlow - Banking Management System

![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.1%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)
![SQLite](https://img.shields.io/badge/SQLite-3-003B57?style=for-the-badge&logo=sqlite&logoColor=white)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

**BankFlow** is a modern, secure banking management system built with Laravel. It provides a comprehensive solution for managing clients, bank accounts, and financial transactions with an intuitive interface and robust security features.

## Features

- 👥 **Client Management**: Complete CRUD operations for client information
- 💳 **Account Management**: Manage multiple bank accounts per client
- 💸 **Transaction Processing**: Secure money transfers between accounts with balance validation
- 🔒 **Security**: Built-in CSRF protection and form validation
- 🎨 **Modern UI**: Persona 3 Reload inspired design with neon accents
- 📱 **Responsive Design**: Works seamlessly on desktop and mobile devices
- ⚡ **Fast Setup**: SQLite database for quick deployment

## Prerequisites

Before installing BankFlow, ensure you have the following installed:

- **PHP >= 8.1** (with required extensions)
- **Composer** (PHP dependency manager)
- **SQLite3** (usually bundled with PHP)
- **Git** (for cloning the repository)

### Required PHP Extensions

BankFlow requires the following PHP extensions to be enabled:

- `pdo_sqlite` (for SQLite database support)
- `sqlite3` (SQLite3 extension)
- `mbstring` (for string manipulation)
- `xml` (for XML processing)
- `ctype` (for character type checking)
- `json` (for JSON processing)
- `openssl` (for encryption)
- `tokenizer` (for tokenization)
- `curl` (for HTTP requests)

## Installation Guide

### Step 1: Clone the Repository

```bash
git clone https://github.com/YOUR-USERNAME/bank-manager.git
cd bank-manager
```

### Step 2: Install PHP Dependencies

```bash
composer install
```

### Step 3: Configure PHP for SQLite3

#### Enable SQLite3 Extension in PHP.ini

**Windows:**

1. Locate your `php.ini` file:
   - Usually located in: `C:\php\php.ini` or `C:\xampp\php\php.ini`
   - Or find it using: `php --ini` command

2. Open `php.ini` in a text editor (as Administrator)

3. Find and uncomment (remove the semicolon `;`) these lines:
   ```ini
   extension=pdo_sqlite
   extension=sqlite3
   ```

4. If the extensions are not listed, add them:
   ```ini
   extension=pdo_sqlite
   extension=sqlite3
   ```

5. Save the file and restart your web server (Apache/Nginx) or PHP development server

6. **Verify the installation:**
   ```bash
   php -m | findstr sqlite
   ```
   You should see `pdo_sqlite` and `sqlite3` in the output.

**Linux (Ubuntu/Debian):**

1. Install SQLite3 PHP extensions:
   ```bash
   sudo apt-get update
   sudo apt-get install php-sqlite3 php-pdo-sqlite
   ```

2. Enable the extensions (usually enabled by default):
   ```bash
   sudo phpenmod sqlite3 pdo_sqlite
   ```

3. Restart your web server:
   ```bash
   sudo systemctl restart apache2
   # OR
   sudo systemctl restart nginx
   sudo systemctl restart php8.1-fpm
   ```

4. **Verify the installation:**
   ```bash
   php -m | grep sqlite
   ```

**macOS (using Homebrew):**

1. Install SQLite3 PHP extensions:
   ```bash
   brew install php
   ```

2. The extensions are usually enabled by default. Verify:
   ```bash
   php -m | grep sqlite
   ```

3. If not enabled, edit `php.ini`:
   ```bash
   php --ini
   # Edit the file and uncomment:
   # extension=pdo_sqlite
   # extension=sqlite3
   ```

**Alternative: Check PHP Configuration**

Create a test file `phpinfo.php`:
```php
<?php
phpinfo();
?>
```

Access it via browser and search for "sqlite" to verify extensions are loaded.

### Step 4: Create Environment File

```bash
cp .env.example .env
```

### Step 5: Generate Application Key

```bash
php artisan key:generate
```

### Step 6: Configure Database

#### Option A: Using SQLite (Recommended for Development)

1. **Create SQLite database file:**
   ```bash
   touch database/database.sqlite
   ```
   
   **Windows (PowerShell):**
   ```powershell
   New-Item -Path database\database.sqlite -ItemType File
   ```
   
   **Windows (CMD):**
   ```cmd
   type nul > database\database.sqlite
   ```

2. **Update `.env` file:**
   ```env
   DB_CONNECTION=sqlite
   DB_DATABASE=C:\path\to\your\project\database\database.sqlite
   ```
   
   **For relative path (recommended):**
   ```env
   DB_CONNECTION=sqlite
   DB_DATABASE=database/database.sqlite
   ```

#### Option B: Using MySQL/PostgreSQL

If you prefer MySQL or PostgreSQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bankflow
DB_USERNAME=root
DB_PASSWORD=your_password
```

### Step 7: Run Database Migrations

```bash
php artisan migrate
```

This will create the necessary database tables:
- `clients` (id, nom, prenom, email)
- `comptes` (id, rib, solde, client_id)


### Step 8: Start the Development Server

```bash
php artisan serve
```

The application will be available at: **http://127.0.0.1:8000**

### Step 9: Access the Application

Open your browser and navigate to:
- **Local:** http://127.0.0.1:8000
- **Network:** http://YOUR_IP_ADDRESS:8000

## Usage

### Managing Clients

1. Navigate to **Clients** from the main menu
2. Click **Add Client** to create a new client
3. Fill in the required information (Name, First Name, Email)
4. Use **Edit** or **Delete** buttons to manage existing clients

### Managing Bank Accounts

1. Navigate to **Accounts** from the main menu
2. Click **Add Account** to create a new bank account
3. Select a client and enter RIB and initial balance
4. Manage accounts using the action buttons

### Processing Transfers

1. Navigate to **Transfer** from the main menu
2. Select the source account (sender)
3. Select the destination account (receiver)
4. Enter the transfer amount
5. Click **Execute Transfer**
6. The system will validate sufficient balance before processing

## Troubleshooting

### SQLite Extension Not Found

**Error:** `SQLSTATE[HY000] [14] unable to open database file`

**Solutions:**
1. Verify SQLite3 extension is enabled (see Step 3)
2. Check file permissions on `database/database.sqlite`
3. Ensure the path in `.env` is correct
4. On Windows, ensure the path uses forward slashes or escaped backslashes

### Permission Denied

**Error:** `Permission denied` when creating database file

**Solutions:**
- **Linux/macOS:** `chmod 775 database/` and `chmod 664 database/database.sqlite`
- **Windows:** Run terminal as Administrator or check folder permissions

### Composer Issues

**Error:** `composer: command not found`

**Solutions:**
- Install Composer: https://getcomposer.org/download/
- Add Composer to your system PATH

### PHP Version Issues

**Error:** `Your requirements could not be resolved`

**Solutions:**
- Ensure PHP >= 8.1 is installed
- Check PHP version: `php -v`
- Update PHP if necessary

## Project Structure

```
bank-manager/
├── app/
│   ├── Http/Controllers/    # Application controllers
│   └── Models/              # Eloquent models
├── database/
│   ├── migrations/          # Database migrations
│   └── database.sqlite      # SQLite database file
├── public/
│   └── css/
│       └── app.css          # Application styles
├── resources/
│   └── views/               # Blade templates
├── routes/
│   └── web.php              # Application routes
└── .env                     # Environment configuration
```

## Security Notes

- Never commit `.env` file to version control
- Change `APP_KEY` in production
- Use strong passwords for database connections
- Enable HTTPS in production
- Regularly update dependencies: `composer update`

## Development

### Running Tests

```bash
php artisan test
```

### Clearing Cache

```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Database Reset

```bash
php artisan migrate:fresh
```

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

##  License

This project is open-source and available under the [MIT License](LICENSE).

## Author

**Gueddari Ilyass**
- Student in Digital Development
- École Supérieure de Technologie de Salé - 2025/2026

## Acknowledgments

- Laravel Framework
- Bootstrap 5
- AOS (Animate On Scroll)

---

**Made with ❤️ using Laravel**
