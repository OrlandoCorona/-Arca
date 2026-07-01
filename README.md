# El Arca — Restaurant Web Management System

> Full-stack web application for restaurant operations: table reservations, menu browsing, user authentication, and contact management. Built with a custom PHP MVC architecture, PostgreSQL, Docker, and deployed on Render.

![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?logo=php&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-15-336791?logo=postgresql&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-Containerized-2496ED?logo=docker&logoColor=white)
![Render](https://img.shields.io/badge/Deployed-Render-46E3B7?logo=render&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green)
[![Live Demo](https://img.shields.io/badge/Live%20Demo-Render-46E3B7?logo=render&logoColor=white)](https://arca-jv4f.onrender.com)
>
> *(El plan gratuito de Render puede tardar ~30 s en despertar.)*

---

## Overview

El Arca is an operational web system for a restaurant, covering the complete customer journey: browsing the menu, making a table reservation, managing a user profile, and contacting the venue.

The backend is built on a **custom MVC router** (no framework) in PHP 8.2, with a PostgreSQL relational database that replaced an initial MySQL setup during development.

---

## Features

- **Authentication system** — register, login, logout, and full password recovery via email
- **Table reservation flow** — date and table selection with conflict prevention (unique booking per table per day)
- **Full menu catalogue** — categorised views: beers, micheladas, food, tacos, snacks, desserts, bottles, and extras
- **Protected user profile** — view and manage personal account data
- **Contact form** — messages stored directly in the database
- **Gallery** — image gallery for the venue

---

## Tech Stack

| Layer            | Technology                          |
|------------------|-------------------------------------|
| Backend          | PHP 8.2 (custom MVC, no framework)  |
| Database         | PostgreSQL 15 via PDO               |
| Frontend         | HTML5, CSS3, JavaScript             |
| Containerisation | Docker                              |
| Deployment       | Render (Web Service)                |
| Version Control  | Git / GitHub                        |

---

## Architecture

```
el-arca-restaurant-system/
├── app/
│   ├── config/              # DB connection and environment config
│   ├── controllers/         # Business logic (login, reserva, perfil…)
│   ├── database/
│   │   └── migrations/      # schema.sql · seeds.sql
│   ├── views/               # PHP templates (public + auth-protected)
│   └── routes.php           # Central router: GET views + POST actions
├── public/                  # Entry point (index.php + static assets)
├── Dockerfile               # PHP 8.2-cli · Composer · pdo_pgsql
└── composer.json
```

The central router in `routes.php` maps `?view=` query parameters to view files and `?action=` parameters to controller files. Session-protected routes validate `$_SESSION['id_usuario']` before rendering.

---

## Database Schema

7 tables designed from scratch and migrated from MySQL → PostgreSQL:

| Table              | Description                                                              |
|--------------------|--------------------------------------------------------------------------|
| `areas`            | Restaurant zones (e.g. Principal, Hamacas)                              |
| `tables`           | Seats per area with capacity rules                                       |
| `users`            | Client/admin roles with hashed passwords                                 |
| `reservations`     | Status enum (`pending / confirmed / cancelled / completed`), unique constraint per table + date |
| `products`         | Menu catalogue with categories and pricing                               |
| `config`           | JSONB key-value store for business rules (hours, caps, etc.)             |
| `contact_messages` | Contact form submissions                                                 |

---

## Getting Started

### Prerequisites

- Docker installed, **or** PHP 8.2 + Composer + PostgreSQL running locally

### Run with Docker

```bash
git clone https://github.com/OrlandoCorona/el-arca-restaurant-system.git
cd el-arca-restaurant-system

# Configure your database credentials in app/config/
# (DB_HOST, DB_NAME, DB_USER, DB_PASS)

docker build -t el-arca .
docker run -p 10000:10000 el-arca
```

Open [http://localhost:10000](http://localhost:10000)

### Database setup

```bash
psql -U your_user -d your_database -f app/database/migrations/schema.sql
psql -U your_user -d your_database -f app/database/migrations/seeds.sql
```

---

## Deployment

The application is containerised and deployed on **Render** as a Web Service.

🔗 **Live:** [https://arca-jv4f.onrender.com](https://arca-jv4f.onrender.com)
>
> *(El plan gratuito de Render puede tardar ~30 s en despertar.)*

The `Dockerfile` uses `php:8.2-cli`, installs `pdo_pgsql` via `docker-php-ext-install`, and serves the app on port `10000` using PHP's built-in server (`php -S 0.0.0.0:10000 -t public`). Composer dependencies are installed at build time with `--optimize-autoloader`.

---

## Key Technical Decisions

**Custom MVC over a framework** — Built the router, request lifecycle, and controller/view separation from scratch to demonstrate architectural understanding rather than relying on Laravel or Symfony conventions.

**MySQL → PostgreSQL migration** — Migrated to PostgreSQL for better `JSONB` support (used in the `config` table for flexible business rules) and full compatibility with Render's managed database offering.

**Docker from day one** — Containerised early to eliminate environment-specific issues and enable one-command deployment on Render without server configuration.

---

## Author

**Carlos Orlando Meneses Corona**  
Ingeniero en TIC · Data Analyst  
[LinkedIn](https://linkedin.com/in/carlos-orlando-meneses-corona-da) · [GitHub](https://github.com/OrlandoCorona)
