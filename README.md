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

> Not captured yet. Add images under `docs/` and embed them here once they exist —
> broken image links are worse than no screenshots.

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

All 48 tests cover core application behavior: models, routes, admin protection, the
inquiry flow (including the honeypot, rate limit, and notification-failure paths),
image upload lifecycle, and config-driven rendering.

The suite calls `withoutVite()`, so it runs on a clean checkout without building assets
first. The asset build is verified separately by CI, which fails the pipeline if
`public/build/manifest.json` is not produced.

## Admin Access

- Admin routes are grouped under `/admin` and protected by `AdminMiddleware` plus the
  `is_admin` flag on the user model.
- A default administrator is created by the database seeder:
  - **Email:** `admin@alkesbalikpapan.com`
  - **Password:** set by the seeder (hashed) — change it after first login.
- Log in at `/login`; you land on `/admin` directly.
- **Public registration is disabled.** Additional admins are created via
  `database/seeders/DatabaseSeeder.php` or `php artisan tinker`.

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
├── tests/                     # PHPUnit suite
├── .github/workflows/         # CI + production-branch publishing
├── .htaccess                  # Root guard, used only if the doc root can't be moved
└── .env.production.example    # Production env template
```

## Deployment

Deployed to **Hostinger shared hosting** via GitHub. Hostinger pulls from git but never
runs `composer install` or `npm run build`, so CI does both and publishes a ready-to-serve
tree.

### How it works

```
master (clean source)
  │
  └─► .github/workflows/deploy.yml
        ├─ composer install / npm ci / npm run build
        ├─ php artisan test          ← pipeline gate
        └─ commit vendor/ + public/build/ to the `production` branch
              │
              └─► Hostinger auto-pulls `production`
```

`production` is committed to, never force-pushed, so Hostinger's `git pull` never hits a
rewritten history. `.env` and `public/uploads/` are gitignored on `production`, so a
deploy can never overwrite server credentials or client-uploaded images.

### First-time setup

1. **Database** — hPanel → *Databases → MySQL Databases*. Create the DB and user.
2. **Git** — hPanel → *Advanced → GIT*. Repository
   `https://github.com/MRRzkS/alkes-balikpapan`, branch **`production`**, directory
   `domains/alkesbalikpapan.com/repo`.
3. **Document root** — hPanel → *Websites → Advanced → Change website's root directory* →
   point it at `…/repo/public`.
   If the plan does not allow moving the root, clone into `public_html` instead; the
   committed root `.htaccess` forces HTTPS, denies `.env` and the application
   directories, and forwards everything else into `public/`.
4. **Environment** — copy `.env.production.example` to `.env` on the server and fill in
   the database, `APP_URL`, SMTP, and `ADMIN_PASSWORD` values.
5. **Bootstrap over SSH** (once):

   ```bash
   php artisan key:generate
   php artisan migrate --force
   php artisan db:seed --force
   php artisan config:cache && php artisan route:cache && php artisan view:cache
   ```

   Without SSH, run the same commands as one-off hPanel cron jobs.
6. **PHP version** — set 8.2 or newer in hPanel. `composer.json` pins
   `config.platform.php` to 8.2.0 so the CI-built `vendor/` is safe on any 8.2+ host.
7. **Auto-deploy** — copy the webhook URL from hPanel's GIT page into GitHub →
   *Settings → Webhooks* (push event).
8. **Log in and change the admin password**, then clear `ADMIN_PASSWORD` from `.env`.

### Operational notes

- **After any `.env` edit, re-run `php artisan config:cache`.** A stale config cache is
  the most common cause of "production is ignoring my change" on shared hosting.
- Uploads are written straight to `public/uploads/` — no `storage:link` symlink needed.
- The app timezone is `Asia/Makassar` (WITA). Do not change it once inquiries exist;
  Laravel stores timestamps in the app timezone.
- There is no queue worker on shared hosting. `QUEUE_CONNECTION=sync` keeps inquiry
  notifications inline, and a failing mail host is logged rather than shown to visitors.

## License

**Proprietary — Client Project.** This codebase is owned by PT Wahana Surya and is
licensed for use by the client only. All rights reserved. Not open source.
