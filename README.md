# Laravel Job Portal

A full-featured Job Portal built using **Laravel 11**. This platform allows **employers to post jobs**, and **job seekers to apply**—featuring multi-authentication (employer, user), secure registration, dynamic dashboards, job applications, and more. Ideal for showcasing modern Laravel best practices in building real-world, production-ready applications.

---

## Features

- Multi-authentication (Employer | Job Seeker)
- Role-based Dashboards
- Job Posting & Applications
- Job Search & Filters
- Secure Registration & Login (Laravel Breeze)
- Database Migrations & Seeders
- Admin/Employer Panel: User Management, Job Oversight
- Laravel Validation, Authorization, and Middleware

---

## Tech Stack

| Layer        | Technology         |
|--------------|--------------------|
| Backend      | Laravel 11         |
| Frontend     | Blade Templates, Bootstrap |
| Authentication | Laravel Breeze    |
| Database     | MySQL / MariaDB    |
| Versioning   | Git & GitHub       |

---

## Screenshots



---

## Project Structure (Simplified)

```bash
├── app/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
│   └── views/
├── routes/
│   └── web.php
├── .env.example
└── README.md
```

---

# Installation

> Import the `jobportal.sql` file in your phpadmin dashboard.

1. Clone the repo
`git clone https://github.com/Krish123-lang/laravel_job_portal.git`

2. Navigate to project folder
`cd laravel_job_portal`

3. Install dependencies
`composer install && composer update`

4. Create a .env file
`cp .env.example .env`

5. Generate app key
`php artisan key:generate`

6. Configure your .env file (DB, mail, etc.)

7. Run migrations and seeders (optional)
`php artisan migrate --seed`

8. Serve the app
`php artisan serve`

9. Run npm
`npm run dev`

---

# Testing Credentials

** Employer **
Email: poveloqyho@mailinator.com
Password: password

** Job Seeker **
Email: dufylila@mailinator.com
Password: password

---

# Contributing
Pull requests are welcome! For major changes, please open an issue first to discuss what you would like to change.

---

# Author
**Krishna**

[Github](https://github.com/Krish123-lang/) | Laravel Developer | Passionate about Full Stack Development

---

![Made with Laravel](https://img.shields.io/badge/Made%20with-Laravel-red?style=flat&logo=laravel)
![Open in Visual Studio Code](https://img.shields.io/badge/VSCode-Ready-blue?style=flat&logo=visualstudiocode)
![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen?style=flat&logo=github)

---
