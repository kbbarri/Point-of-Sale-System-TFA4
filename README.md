# IT0049 TFA4 - Sessions and Authentication

## POS System

A CodeIgniter 4 POS application implementing user authentication,
sessions, password hashing, protected routes, and logout.

## Features

- User login
- Password hashing using password_hash()
- Password verification using password_verify()
- CodeIgniter session authentication
- Authentication Filter
- Protected Customer Accounts
- Protected User Accounts
- User logout

## Installation

1. Clone the repository.
2. Run:

   composer install

3. Create a MySQL database named:

   pos_db

4. Import:

   pos_db.sql

5. Configure the database connection in `.env`.

6. Start the application:

   php spark serve

7. Open:

   http://localhost:8080/login

## Test Account

Username: admin
Password: admin123

## Hosted Application

[PUT YOUR HOSTED LINK HERE]
