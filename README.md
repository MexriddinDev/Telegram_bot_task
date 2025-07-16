# 🤖 Laravel Telegram Attendance & Group Management System

This is a Laravel-based Telegram-integrated application for managing student groups, tracking attendance, and handling user login via Telegram ID. It features a user dashboard, detailed group analytics, and debt tracking.

---

## 🚀 Features

- 🔐 Telegram ID-based authentication using [defstudio/telegraph](https://github.com/defstudio/telegraph)
- 👥 Manage groups and students
- ✅ Track attendance per group per day
- 💰 Manage student debts
- 📊 Clean dashboard UI
- 🧩 Separated service layer for business logic

---

## 📦 Built With

- [Laravel](https://laravel.com) 12
- [defstudio/telegraph](https://github.com/defstudio/telegraph) – Telegram Bot integration
- Eloquent ORM
- Blade templating engine

---

## ⚙️ Installation

```bash
git clone https://github.com/your-username/your-project.git
cd your-project
composer install
cp .env.example .env
php artisan key:generate
