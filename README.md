# Resort Management System
<p align="center">
  <img src="public/image/logo3.jpg" alt="Sunset Vista Resort Logo" width="450">
</p>
A modern and user-friendly **Resort Management System** built using the Laravel framework. This project allows users to explore resort services, view rooms, make bookings, and manage reservations through an admin panel.

## ✨ Features

### User Features

* Browse resort rooms and services
* View detailed room information
* Online room booking
* Select check-in and check-out dates
* Choose number of adults and children
* Automatic booking summary
* Contact and inquiry section
* User-friendly and responsive interface
* View booking details
* Booking confirmation

### Admin Features

* Admin dashboard
* Manage resort services
* View and manage bookings
* Update booking status
* Manage room-related information
* Secure admin panel interface

## 🛠️ Technologies Used

* **Laravel**
* **PHP**
* **MySQL**
* **HTML5**
* **CSS3**
* **JavaScript**
* **Bootstrap**
* **Blade Templates**
* **Git & GitHub**
* **XAMPP**

## 📂 Project Structure

```text
resort-management-system/
├── app/
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
│   └── views/
├── routes/
│   └── web.php
├── storage/
├── .env.example
├── artisan
├── composer.json
└── README.md
```

## ⚙️ Installation

### 1. Clone the Repository

```bash
git clone <your-repository-url>
cd <project-folder>
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Create Environment File

```bash
cp .env.example .env
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Configure Database

Open the `.env` file and update the database configuration:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=resort-db
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Run Migrations

```bash
php artisan migrate
```

### 7. Start the Application

```bash
php artisan serve
```

Now open:

```text
http://127.0.0.1:8000
```

## 📸 Screenshots

You can add screenshots of the following pages here:

* Home Page
* Rooms Page
* Services Page
* Booking Page
* Booking Summary
* Admin Dashboard
* Admin Booking Management

## 🚀 Future Improvements

* Online payment integration
* Email booking notifications
* Real-time booking updates
* Room availability calendar
* Customer reviews and ratings
* Advanced admin analytics
* Multiple payment gateways

## 👨‍💻 Development Team

This project was developed as a team project.

**Contributors:**

* Aryan Aswal & Vivek Badoni

## 📄 License

This project is developed for educational and learning purposes.

---

⭐ **If you like this project, don't forget to give it a star on GitHub!**
