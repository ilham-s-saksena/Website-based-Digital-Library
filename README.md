# Digital Library Website

Welcome to the Digital Library Website! Follow the instructions below to set up and use the application.

## Setup Instructions

1. **Configure the Database**

   First, ensure that your database configuration in the `.env` file is correct:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=digitalLibrary
   DB_USERNAME=root
   DB_PASSWORD=
   ```

2. **Prepare the Database**

   You have two options to ensure your database is properly set up:

   - **Option 1: Import SQL File**

     Import the provided SQL file into your database.

   - **Option 2: Run Migrations and Seeders**

     Run the following command in your terminal to migrate and seed the database:

     ```bash
     php artisan migrate:fresh --seed
     ```

   After executing this command, you should have the following data:
   - 3 users: 1 with an admin role and 2 with user roles.

3. **Login Credentials**

   Use the following credentials to log in:

   - **Admin:**
     - Email: `admin@gmail.com`
     - Password: `12345`

   - **User 1:**
     - Email: `user1@gmail.com`
     - Password: `12345`

   - **User 2:**
     - Email: `user2@gmail.com`
     - Password: `12345`

   **You can also try registering a new account via the 'register' menu. Please use a valid email address as email confirmation is required for registration.**

## Features

### Dashboard
- **Admin:** View total categories, all books, and total users with the role 'user'.
- **User:** View the total number of categories and books owned by the user.

### Category
- **Admin:** Full CRUD (Create, Read, Update, Delete) functionality.
- **User:** Read and Create data.

### My Book
- **Admin:** Full CRUD functionality for all books, Export to Excel for all data.
- **User:** CRUD functionality for their own books, Export to Excel for their own data.
  - **Create:** Save data and upload PDF files and cover images (jpg/png).
  - **Read:** View uploaded cover images and embed uploaded PDFs.

### Profile
- **Admin & User:** Edit profile details (name, email, password) and delete account.

## Getting Help

For any issues or questions, please contact support or refer to the documentation.

Happy exploring!