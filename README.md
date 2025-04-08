# ✅ Todoify - Simple Todo App

A clean and modular full-stack Todo application built using **Laravel**, **Vue.js**, and **Docker**.

---

## 🧩 Tech Stack

- **Backend:** Laravel 12 (PHP ^8.2)
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

### 🔧 Docker setup in ubuntu

#### 👩‍💻 Install using the apt repository

1. Set up Docker's apt repository.
   ```
   # Add Docker's official GPG key:
      sudo apt-get update
      sudo apt-get install ca-certificates curl
      sudo install -m 0755 -d /etc/apt/keyrings
      sudo curl -fsSL https://download.docker.com/linux/ubuntu/gpg -o /etc/apt/keyrings/docker.asc
      sudo chmod a+r /etc/apt/keyrings/docker.asc

   # Add the repository to Apt sources:
      echo \
      "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.asc] https://download.docker.com/linux/ubuntu \
      $(. /etc/os-release && echo "${UBUNTU_CODENAME:-$VERSION_CODENAME}") stable" | \
      sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
      sudo apt-get update
   ```
2. Install Docker packages:
   ```
   sudo apt-get install docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
   ```

#### 👩‍💻 Install docker compose

1. To download and install the Docker Compose CLI plugin, run:
   ```
   sudo curl -L "https://github.com/docker/compose/releases/download/v2.34.0/docker-compose-linux-x86_64)-$(uname -m)" -o /usr/local/bin/docker-compose
   ```
   ```
   sudo chmod +x /usr/local/bin/docker-compose
   ```

### 🔧 Project Installation & Setup

1. Clone the Repository
    ```bash
    git clone git@github.com:shashikanuwan/todoify.git
    ```
    ```bash
   cd todoify
    ```
2. Run Docker Compose
    ```bash
    docker compose up --build
    ```
    Then Visit `http://localhost:3000` to start using Todoify.

### ⛳️ How to Use

- Login with the default user using dummy data:
  - Email: `user_1@todoify.com` 
  - Password: `password`

### 📝 Testing

1. Test the backend
    ```bash
   cd backend
    ```
   
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
### 📂 Screenshots

Screenshots of the application in different views (mobile, desktop) are located in the [Google Drive](https://drive.google.com/drive/folders/1HHcvMzhpnXUN0TMvHSN7wnENRYT4tQ-_?usp=drive_link).

### 📜 License
This project is licensed under the MIT License.

### 📩 Contact
For any questions, reach out at [contact@shashikanuwan.me](mailto:contact@shashikanuwan.me)