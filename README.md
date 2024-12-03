# KenteFashion Implementation Guide

Thank you for choosing **KenteFashion**, an e-commerce platform designed to showcase the beauty and cultural significance of Kente cloth. This guide will walk you through the steps required to set up and run the project on your local environment.

---

## Prerequisites

Before starting, ensure you have:

- A local server environment (e.g., XAMPP or WAMP) installed.
- A modern web browser (e.g., Google Chrome or Mozilla Firefox).
- Basic knowledge of navigating a local server and phpMyAdmin.

---

## Steps to Implement

### 1. Download and Extract the Project

- Download the project files and extract them into a designated folder on your computer.

### 2. Set Up Your Local Server

- Open your local server application and start both **Apache** and **MySQL** services.

### 3. Move Project Files

- Copy the extracted project folder into the `htdocs` directory of your local server installation.

### 4. Configure the Database

1. Open your web browser and go to [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
2. Create a new database and name it as per the project instructions (check the project folder for details).
3. Import the database:
   - Go to the **Import** tab in phpMyAdmin.
   - Choose the `.sql` file from the project folder’s `DATABASE FILE` directory.
   - Click **Go** to upload and apply the database.

### 5. Update Configuration Settings

- Open the project’s configuration file (usually named something like `db_config.php`) and ensure the database credentials match your local server setup.
- Check the paths and URLs to ensure they point to `http://localhost/[PROJECT_FOLDER_NAME]/`.

### 6. Launch the Project

- Open your browser and navigate to: http://localhost/[PROJECT_FOLDER_NAME]/

- - Use the provided credentials to log in to the admin panel or explore the customer-side functionality.

---

## Project Credentials

Check the `LOGIN DETAILS & PROJECT INFO.txt` file in the project folder for admin and customer login details.

---

## Support

For further assistance, feel free to contact us at **support@kentefashion.com**.

---

