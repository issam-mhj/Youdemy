<div align="center">

<h3 align="center">Youdemy</h3>

  <p align="center">
    An online course platform revolutionizing learning with interactive and personalized experiences for students and teachers.
    <br />
     <a href="https://github.com/issam-mhj/youdemy">github.com/issam-mhj/youdemy</a>
  </p>
</div>

## Table of Contents

<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#key-features">Key Features</a></li>
      </ul>
    </li>
    <li><a href="#architecture">Architecture</a></li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>

## About The Project

Youdemy is an online course platform designed to provide an interactive and personalized learning experience for both students and teachers. It offers a range of courses across various categories, enabling students to learn at their own pace. The platform also provides administrative tools for managing users, courses, and categories.

### Key Features

- **User Roles:** Supports multiple user roles including Visitor, Student, Teacher, and Admin, each with specific permissions and access levels.
- **Course Management:** Allows teachers to create, modify, and manage courses, including adding content in the form of videos and documents. Admins can oversee and delete courses.
- **Enrollment System:** Students can enroll in courses, with teacher approval required in some cases.
- **Category and Tag Management:** Admins can manage course categories and tags to organize and improve course discoverability.
- **Admin Dashboard:** Provides an overview of key statistics such as total users, courses, pending teacher approvals, and category distribution.
- **Teacher Dashboard:** Offers insights into course performance, student enrollment, and recent activity.
- **Search Functionality:** Students can search for courses based on keywords in the title, description, or category.
- **Tailwind CSS:** Utilizes Tailwind CSS for a responsive and modern user interface.

## Architecture

The Youdemy platform follows a Model-View-Controller (MVC) architecture.

- **Frontend:** Implemented using PHP views and Tailwind CSS for styling.
- **Backend:** Consists of PHP controllers and models that handle user authentication, course management, and data retrieval from the database.
- **Database:** Uses MySQL to store user information, course details, enrollment data, categories, and tags.

Key technologies used:

- PHP
- MySQL
- Tailwind CSS
- PDO for database interactions
- MVC framework (custom-built)
- JavaScript

## Getting Started

### Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Composer (for dependency management)
- Node.js and npm (for Tailwind CSS)

### Installation

1.  **Clone the repository:**
    ```sh
    git clone https://github.com/issam-mhj/youdemy.git
    cd youdemy
    ```

2.  **Create the database:**
    ```sh
    mysql -u root -p < script.sql
    ```
    *Note: You may need to adjust the username and password based on your MySQL configuration.*

3.  **Configure the database connection:**
    Edit the `config/database.php` file to match your MySQL credentials:
    ```php
    <?php

    class Db
    {

        protected $conn;

        public function __construct()
        {
            try {
                $this->conn = new PDO("mysql:host=localhost;dbname=youdemy", "root", "");
                // set the PDO error mode to exception
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }
    ```

4.  **Install Tailwind CSS dependencies:**
    ```sh
    npm install -D tailwindcss
    npx tailwindcss init -p
    ```

5.  **Configure Tailwind CSS:**
    Update the `tailwind.config.js` file to include the paths to your PHP files:
    ```javascript
    /** @type {import('tailwindcss').Config} */
    module.exports = {
      content: [
        "./views/**/*.php",
        "./views/*.php",
        "./public/*.php"],
      theme: {
        extend: {},
      },
      plugins: [],
    }
    ```

6.  **Build the CSS:**
    ```sh
    npm run build
    ```
    or for development:
     ```sh
    npm run dev
