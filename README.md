# Alkes Balikpapan

> Company profile, product catalog, and berita (news) website for PT Wahana Surya — a medical-equipment distributor in Balikpapan, East Kalimantan, Indonesia.

[![Laravel 12](https://img.shields.io/badge/Laravel-12-red?style=flat-square&logo=laravel&logoColor=white)](https://laravel.com)
[![Tailwind CSS v4](https://img.shields.io/badge/Tailwind-v4-38bdf8?style=flat-square&logo=tailwindcss&logoColor=white)](https://tailwindcss.com)
[![PHP 8.2](https://img.shields.io/badge/PHP-8.2-777bb4?style=flat-square&logo=php&logoColor=white)](https://www.php.net)
[![License: Proprietary](https://img.shields.io/badge/License-Proprietary-blue?style=flat-square)](LICENSE)

Alkes Balikpapan is a modern, dark-mode-first web presence for a medical-equipment
distributor. It pairs a polished public marketing site (company profile, categorized
product catalog, blog/berita, and a public inquiry form) with a protected admin
dashboard for managing content and reading inbound customer inquiries.

## Features

- **Public site (Indonesian / Bahasa Indonesia content)**
  - **Home** — hero, *tentang* (about), B2B/B2C market positioning, featured products, "mengapa memilih kami" (why choose us), latest blog posts, and contact CTA.
  - **Produk** — product catalog across 4 categories: `medis`, `disposable`, `diagnostik`, `p3k_k3`.
  - **Blog / Artikel** — news and articles (berita).
  - **Kontak** — public inquiry form that lands in the admin inbox.
- **Admin dashboard** (route `/admin`, protected by `AdminMiddleware` + `is_admin` flag)
  - CRUD for **Posts** (artikel) and **Products**.
  - **Inquiry inbox** — view, mark-as-read, and delete customer inquiries.
  - **Dashboard stats** — quick overview of content and inquiry counts.
- **Inquiry auto-notification** — email + optional WhatsApp (via Fonnte gateway), config-gated so it stays silent until configured.
- **Analytics** — Google Analytics 4 + Meta Pixel, config-driven and only rendered on the public layout when IDs are set.
- **Design system** — dark-mode-first (default dark) with a manual toggle, glassmorphism, gradients, 3D cards, scroll-reveal animations, fully responsive, WCAG AA contrast, and `prefers-reduced-motion` respected.
- **SEO** — sitemap via `spatie/laravel-sitemap`.

## Tech Stack

| Layer        | Technology |
| ------------ | ---------- |
| Framework    | Laravel 12 |
| Styling      | Tailwind CSS v4 (`@tailwindcss/vite`) |
| Interactivity| Alpine.js  |
| Auth         | Laravel Breeze |
| SEO          | spatie/laravel-sitemap |
| Frontend build | Vite |
| Language     | PHP 8.2+   |

## Screenshots

> Screenshots are not included in this repository yet. Add images under `docs/` and reference them here.

![Home](docs/home.png)
![Produk](docs/produk.png)
![Admin Dashboard](docs/admin.png)

## Requirements

- **PHP** >= 8.2
- **Composer** (dependency manager)
- **Node.js** 20+ and npm
- A database supported by Laravel (SQLite for local dev, MySQL recommended for production)

## Installation

```bash
# 1. Clone the repository
git clone <repository-url> alkes-balikpapan
cd alkes-balikpapan

# 2. Install PHP dependencies
composer install

# 3. Install frontend dependencies
npm install

# 4. Create environment file
cp .env.example .env

# 5. Generate application key
php artisan key:generate

# 6. Run database migrations and seeders
php artisan migrate --seed

# 7. Build frontend assets
npm run build

# 8. Start the development server
php artisan serve
```

The site will be available at `http://localhost:8000`.

## Configuration

Copy `.env.example` to `.env` and adjust the following keys as needed.

### Database

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=alkes_balikpapan
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Inquiry notifications (optional)

```dotenv
# WhatsApp gateway token (Fonnte). Leave empty to disable WhatsApp notifications.
WA_GATEWAY_TOKEN=
```

### Analytics (optional, public layout only)

```dotenv
# Leave empty to disable tracking until the client provides IDs.
GA_MEASUREMENT_ID=
META_PIXEL_ID=
```

### Brand / site data

Brand and contact details (company name, address, phone, WhatsApp number, social
links) live in `config/site.php`. Edit that file (or the corresponding env values it
reads) to set the site's identity and footer/contact information.

> No real credentials, tokens, or production secrets are committed to the repository.

## Testing

The project ships with a PHPUnit test suite.

```bash
php artisan test
```

All 39 tests cover core application behavior (models, routes, admin protection, inquiry flow, and config-driven rendering).

## Admin Access

- Admin routes are grouped under `/admin` and protected by `AdminMiddleware` plus the
  `is_admin` flag on the user model.
- A default administrator is created by the database seeder:
  - **Email:** `admin@alkesbalikpapan.com`
  - **Password:** set by the seeder (hashed) — change it after first login.
- Log in through the Laravel Breeze auth screen, then navigate to `/admin`.

## Project Structure

```
alkes-balikpapan/
├── app/
│   ├── Http/Controllers/      # Public + admin controllers
│   ├── Middleware/            # AdminMiddleware
│   └── Models/                # Post, Product, Inquiry, User
├── config/
│   ├── site.php               # Brand / contact data
│   ├── analytics.php          # GA + Meta Pixel IDs
│   └── services.php           # WhatsApp (Fonnte) gateway
├── database/
│   ├── migrations/            # Schema
│   └── seeders/               # Admin + demo seeders
├── public/
│   ├── uploads/               # User uploads (no storage symlink)
│   └── build/                 # Compiled assets
├── resources/
│   ├── views/                 # Blade templates (public + admin)
│   └── css|js/                # Tailwind + Alpine sources
├── routes/
│   ├── web.php                # Public routes
│   └── admin.php              # Admin routes
└── tests/                     # PHPUnit suite
```

## Deployment

The application is built for **Hostinger shared hosting**:

- Set the hosting **document root to `public/`**.
- Uploads are stored directly in `public/uploads/` (no `storage` symlink required).
- Run `npm run build` locally (or in CI) and deploy the compiled `public/build/` assets along with the application.

## License

**Proprietary — Client Project.** This codebase is owned by PT Wahana Surya and is
licensed for use by the client only. All rights reserved. Not open source.
