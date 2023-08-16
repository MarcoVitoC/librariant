# 🏛️ Librariant
A library management system integrated with a bit of social networking.

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

## 📋 Requirements
### Guest role:
- Login and register
- Search book with pagination
### User role:
- Search book with pagination
- Loan and return book
- Request loan renewal
- Bookmark
- Rate and make feedback/review
- Like and comment review
- Holds and reservations
- Loan limit
- Penalty for late return
### Admin role:
- CRUD and search book
- CRUD and search FAQ
- Book returns confirmation
- Renewal requests confirmation
