# Pokémon App

A Laravel-based web application for managing Pokémon decks and browsing Pokémon with filtering capabilities.

## Features

- **Browse Pokémon**: View all Pokémon with pagination
- **Filter by Type**: Filter Pokémon by their type (type1 or type2)
- **Search**: Search for Pokémon by name
- **Deck Management**: Create, rename, and delete Pokémon decks
- **Add/Remove Pokémon**: Add Pokémon to decks with quantity tracking
- **Pokémon Details**: View detailed information about each Pokémon

## Requirements

- PHP 8.0+
- Composer
- Node.js & npm
- Laravel 9+
- MySQL or compatible database

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/ines-aoufi/pokemon-app.git
   cd pokemon-app
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install Node dependencies:**
   ```bash
   npm install
   ```

4. **Copy environment file:**
   ```bash
   cp .env.example .env
   ```

5. **Generate application key:**
   ```bash
   php artisan key:generate
   ```

6. **Configure your database** in `.env` and run migrations:
   ```bash
   php artisan migrate
   ```

## Running the Application

Start the Laravel development server:
```bash
php artisan serve
```

In another terminal, compile frontend assets:
```bash
npm run dev
```

Visit the application at: **http://127.0.0.1:8000**

## Project Structure

- `app/Http/Controllers/` - Application controllers
- `app/Models/` - Eloquent models (Pokemon, Deck, User)
- `resources/views/` - Blade templates
- `routes/web.php` - Web routes
- `database/migrations/` - Database migrations
- `tests/Feature/` - Feature tests

## Technologies Used

- **Laravel** - PHP Web Framework
- **Blade** - Laravel templating engine
- **Eloquent ORM** - Database abstraction
- **Vite** - Frontend build tool
- **SQLite/MySQL** - Database

## Testing

Run all tests:
```bash
php artisan test
```

### Test Suite

The application includes the following tests:

- **DeckPrivacyTest** - Verifies users can only see their own decks
- **PokemonFilterTest** - Ensures filtering Pokémon by type works correctly
- **PokemonSearchTest** - Tests searching for Pokémon by name functionality

### Pokémon
- `GET /pokemons` - Browse all Pokémon with pagination
- `GET /pokemon/{id}` - View Pokémon details
- `GET /search` - Search Pokémon by name

### Decks
- `GET /decks` - List all user decks
- `POST /decks` - Create a new deck
- `GET /decks/{id}` - View deck details
- `POST /decks/{id}/add-pokemon` - Add Pokémon to deck
- `DELETE /decks/{id}/pokemon/{pokemon}` - Remove Pokémon from deck
