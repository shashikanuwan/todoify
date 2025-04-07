# ✅ Todoify - Simple Todo App

A clean and modular full-stack Todo application built using **Laravel**, **Vue.js**, and **Docker**.

---

## 🧩 Tech Stack

- **Backend:** Laravel 12 (PHP 8.3)
- **Frontend:** Vue 3 (SPA)
- **Database:** MySQL
- **Containerization:** Docker + Docker Compose
- **Backend Testing:** Pest
- **Backend Code Quality:** Laravel Pint (PHP-CS-Fixer)

### 🚀 Features
- Create todo tasks with `title`, `description`, and `due date`
- List only 5 latest **pending** tasks
- Mark tasks as completed
- Tasks disappear from UI after being marked completed
- User authentication system

### 🔧 Installation & Setup

1. Clone the Repository
    ```bash
    git clone git@github.com:shashikanuwan/tickety.git
    ```
    ```bash
   cd tickety
    ```
2. Run Docker Compose
    ```bash
    docker-compose up -d
    ```
    Then Visit `http://localhost:3000` to start using Todoify.

### 📝 Testing

1. Test the backend
    ```bash
    ./vendor/bin/pest
    ```
2. Test coverage (Requires XDebug 3.0+ or PCOV)
    ```bash
    ./vendor/bin/pest --coverage
    ```
3. Type coverage
    ```bash
    ./vendor/bin/pest --type-coverage
    ```
### 📜 License
This project is licensed under the MIT License.

### 📩 Contact
For any questions, reach out at [contact@shashikanuwan.me](mailto:contact@shashikanuwan.me)