# Bank Manager Application

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

A simple banking management system built with Laravel for managing clients and their information.

## Features

- **Client Management**: Add, edit, and manage client information
- **Simple Database**: Uses SQLite for easy setup
- **Clean Interface**: Simple and intuitive user interface
- **Validation**: Built-in form validation
- **Responsive Design**: Works on desktop and mobile devices

## Prerequisites

- PHP >= 8.1
- Composer
- SQLite (usually comes with PHP)

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/YOUR-USERNAME/bank-manager.git
   cd bank-manager
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Create environment file**
   ```bash
   cp .env.example .env
   ```

4. **Generate application key**
   ```bash
   php artisan key:generate
   ```

5. **Create SQLite database file**
   ```bash
   touch database/database.sqlite
   ```

6. **Update .env file**
   Make sure your `.env` file has these database settings:
   ```env
   DB_CONNECTION=sqlite
   DB_DATABASE=/absolute/path/to/your/project/database/database.sqlite
   ```

7. **Run migrations**
   ```bash
   php artisan migrate
   ```

8. **Start the development server**
   ```bash
   php artisan serve
   ```

9. **Access the application**
   Open your browser and go to: [http://127.0.0.1:8000](http://127.0.0.1:8000)

## Usage

1. Navigate to the clients section
2. Add new clients with their details
3. Edit or delete existing clients as needed

## License

This project is open-source and available under the [MIT License](LICENSE).
