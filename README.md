<img width="1904" height="905" alt="image" src="https://github.com/user-attachments/assets/ce30d3e7-9644-48e1-b9d5-efbef665784b" />
# 🌍 Travel Guide Application  
A complete travel destination discovery platform built using **Laravel**, designed to help users explore cities, attractions, and travel guides.

---

# 🏷️ Badges

![Laravel](https://img.shields.io/badge/Laravel-11.x-red)
![PHP](https://img.shields.io/badge/PHP-8.2-blue)
![MySQL](https://img.shields.io/badge/MySQL-Database-yellow)
![License](https://img.shields.io/badge/License-MIT-green)
![Status](https://img.shields.io/badge/Status-Active-success)
![Contributions](https://img.shields.io/badge/Contributions-Welcome-brightgreen)

---
---

# 🚀 About the Project

This Travel Guide Application helps users explore destinations, learn about popular attractions, view galleries, and read travel guides.  
It is optimized for **speed**, **SEO**, and **content management**.

Built with **Laravel**, using modular architecture, dynamic UI with **Alpine.js**, and clean layouts.

---

# ✨ Key Features

### 🎯 User-side
- Browse destinations and attractions  
- View galleries (images/videos)  
- Dynamic search with filters  
- Read travel guides & articles  
- Mobile-friendly UI  
- Optional API support for mobile apps  

### 🎛️ Admin-side
- Manage destinations  
- Manage categories & regions  
- Manage attractions  
- Upload images & media  
- SEO fields for every page  
- Modular admin panel structure  
- Role & permission support (optional)  

---

# 🧪 Tech Stack

| Technology | Purpose |
|-----------|----------|
| **Laravel** | Backend framework |
| **MySQL** | Database |
| **Blade Templates / Alpine.js** | Views |
| **TailwindCSS / Bootstrap** | UI |
| **Composer** | PHP dependencies |
| **NPM + Vite** | Frontend assets |
| **Laravel Modules** | Modular architecture |
| **Git + GitHub** | Version control |

---


# 📂 Project & Modules Structure

app/
bootstrap/
config/
database/
modules/
├── Destinations/
│ ├── Http/
│ ├── Models/
│ ├── Resources/views/
│ ├── Routes/web.php
├── Attractions/
├── Guides/
public/
resources/
routes/
storage/
tests/
vendor/

2️⃣ Install Dependencies
composer install
npm install && npm run build

3️⃣ Environment Setup
cp .env.example .env
php artisan key:generate

4️⃣ Configure .env

Database

App URL

Storage link

Mail config


5️⃣ Migrate Database
php artisan migrate --seed


6️⃣ Run Application
php artisan serve


🚀 Deployment Guide
Shared Hosting

Upload project

Run composer install

Create /public_html symlink to /public

VPS / Ubuntu / NGINX

Install PHP 8.2, MySQL, Composer

Clone repo

Configure NGINX server block

Set permissions:

chmod -R 775 storage bootstrap/cache

Laravel Forge

Connect GitHub

Auto-deploy enabled

Queue worker (if used)


📅 Roadmap

iOS/Android App API

User profiles & Wishlist

Review & Rating system

Booking API integration

Multi-language support

Offline mobile sync

Blog comment system


🧾 Changelog
v1.0.0 — Initial Release

Laravel setup

Modules structure

Destinations + Attractions

Admin panel base

Image upload system


🤝 Contribution Guidelines
1. Fork the repository
2. Create a feature branch
git checkout -b feature/your-feature

3. Commit your changes
git commit -m "Added new feature"

4. Push
git push origin feature/your-feature

5. Submit Pull Request
   

🧑‍💻 Developer

Developed by Prashant Dongare

Email: prashantd.tech@gmail.com


📄 License

This project is licensed under the MIT License.
