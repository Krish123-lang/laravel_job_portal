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

> ### _Seeker_

- Home Page

![homePage](https://github.com/user-attachments/assets/c1803b75-d3c9-4056-b6fc-8235d296d17c)

- Job Seeker Login

![JobseekerLogin](https://github.com/user-attachments/assets/9f930293-507d-4653-95bb-63938a0d7199)

- Employer Login

![EmployerLogin](https://github.com/user-attachments/assets/8026e39b-c879-4912-8852-58a32d6d5ed3)

- Account Verification Email

![accountVerificationEmail](https://github.com/user-attachments/assets/8514590c-c711-478c-8b87-fbc0a9e55a3b)

- Viewing a Job

![singleJob](https://github.com/user-attachments/assets/ce06e313-7e4a-45eb-8f7f-2da9c5fa00c9)

- Uploading Resume while Applying

![uploadingResumeWhileApplying](https://github.com/user-attachments/assets/95dcdfd2-159b-4269-aa0a-a0d9155d8b70)

- Job Seeker Profile

![SeekerProfilePage](https://github.com/user-attachments/assets/8981840a-7737-4c8c-b47c-e97ae09a01c6)

- List of Applied jobs

![listOfAppliedJobs](https://github.com/user-attachments/assets/cbf2008d-07ed-48c7-a9e0-59d85c597928)

---

> ### _Employer_

- Employer Dashboard

![employerDashboard](https://github.com/user-attachments/assets/6a9cb53f-189d-4916-99c4-60f112ae8859)

- Employer Profile

![EmployerProfile](https://github.com/user-attachments/assets/35f75d1b-085e-40e2-99dd-c252503cfded)

- Create Job

![createJob](https://github.com/user-attachments/assets/d214b5fa-6bd4-4e19-9de2-1c1a71a5001c)

- View All jobs

![viewAllJobs](https://github.com/user-attachments/assets/24fd9ff7-f233-4b5d-9e28-7d2efacabcd1)

- Selecting Subscription Plan

![employerSelectingSubscriptionPlan](https://github.com/user-attachments/assets/268adc59-b6b1-4663-b339-d515fb28c39b)

- Payment through Stripe

![StripePayment](https://github.com/user-attachments/assets/2f1b7104-64f0-4532-afd9-cec739e3290b)

- Payment successful Message

![PaymentSuccessful](https://github.com/user-attachments/assets/e9e0cc23-d5ca-415c-91ba-fa010503cee4)

- List of Applicants

![ListOfApplicants](https://github.com/user-attachments/assets/ce8e2da3-a07c-4fc2-b735-bf8e48361a99)

- Viewing All Applicants

![ViewingApplicants](https://github.com/user-attachments/assets/99d195f8-0b49-4dc9-8612-53b71509e548)

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

- Import the `jobportal.sql` file in your phpadmin dashboard.

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

**<ins>Employer</ins>**

Email: poveloqyho@mailinator.com

Password: password

**<ins>Job Seeker</ins>**

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
