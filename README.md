# 🏛️ Librariant
A library management system integrated with a bit of social networking. This project was undertaken to cultivate a deeper understanding of full-stack development using Laravel. By actively engaging with Laravel's features and capabilities, I aimed to enhance my proficiency in both backend and frontend development while building a functional application that showcases my grasp of modern web development practices.

## ⚙️ Installation
### Prerequisites:
- Make sure you have <a href="https://www.php.net/" target="_blank">PHP</a> and <a href="https://getcomposer.org/" target="_blank">Composer</a> installed on your system.
- Install a web server (e.g., Apache or Nginx) and a database server (e.g., MySQL) if not already installed.
### How to run the project locally:
```bash
$ git clone https://github.com/MarcoVitoC/librariant.git
$ cd <project_directory>
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ php artisan storage:link
$ php artisan migrate
$ php artisan db:seed
$ php artisan serve
```
### Default users to use:
- User role:<br>
  email: user@gmail.com<br>
  password: users
- Admin role:<br>
  email: librariant@gmail.com<br>
  password: librariant
### Note:
All email addresses used within this project are for testing purposes only. To fully implement and test the "Forgot Password" feature, it's recommended to set up your own <a href="https://mailtrap.io/" target="_blank">Mailtrap</a> account.
### How to set up Mailtrap:
- Go to <a href="https://mailtrap.io/" target="_blank">Mailtrap</a> and sign up for a new account if you don't already have one.
- Create a new mailbox within Mailtrap.
- In the SMTP Settings, change the integrations to Laravel 9+ since this project uses Laravel 10, and configure your mail configuration by setting the values below it in the .env file in your project root directory.

## 📋 Requirements
### Guest role:
- Login and register
- Forgot password
- Search book with pagination
### User role:
- Search book with pagination
- Loan and return book
- View loan history
- Request loan renewal
- Bookmark
- Rate and make feedback/review
- Like and comment review
- Holds and reservations
- Loan limit
- Penalty for late return
- Notification
### Admin role:
- CRUD and search book
- CRUD and search FAQ
- Book returns confirmation
- Renewal requests confirmation
