# 🏛️ Librariant
A library management system integrated with a bit of social networking.

# ⚙️ Installation
1. Make sure you have <a href="https://www.php.net/" target="_blank">PHP</a> and <a href="https://getcomposer.org/" target="_blank">Composer</a> installed on your system.
2. Install a web server (e.g., Apache or Nginx) and a database server (e.g., MySQL) if not already installed.
3. Clone the project: `git clone https://github.com/MarcoVitoC/librariant.git`
4. Go to the folder application using `cd <project_directory>` command on your cmd or terminal.
5. Install PHP dependencies using Composer: `composer install`
6. Copy `.env.example` file to `.env` on the root folder.
7. Generate a new application key: `php artisan key:generate`
8. Run the database migrations to create the necessary tables: `php artisan migrate`
9. Run the database seeding to create default project data: `php artisan db:seed`
10. Create a Symbolic Link for Storage: `php artisan storage:link`
11. Start the local development server: `php artisan serve`

# 📋 Requirements
### Guest role:
    1. Login and register
    2. Search book
### User role:
    1. Search book with pagination
    2. Loan and return book
    3. Request loan renewal
    4. Bookmark
    5. Rate and make feedback/review
    6. Comment on review
    7. Holds and reservations
    8. Like and comment review
    9. Loan limit
    10. Penalty for late return
### Admin role:
    1. Search and book CRUD
    2. Search and FAQ CRUD
    3. Confirm book returns
    4. Confirm renewal requests
