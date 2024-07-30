<p align="center"><img src="public/img/ums-logo.png" width="300" alt="Logo"></p>

# About The Project

<div style="text-align: justify">
This project was part of a recruitment process that I participated in for a job application that I was interested in - basically, candidates had to create an application in Laravel that met requisites that the recruiters presented to us, and we had one week to implement everything, test and then deliver. It was my first time in a long time coming back to PHP, and the first time ever working with Laravel, and because of that I really struggled for the first few days - but after that, I started to pick up on some similarities between Laravel and other frameworks that I had worked on in the past, and then the project started to evolve much faster. Overall I really enjoyed it, I think I made some cool stuff with it and I can't wait to work with it again in the future!
</div>

# Main Features

- Both Users and Admins can login at the root page;
- Users can register at the root page;
- All authentication is done with Jetstream/Fortify;
- Password complexity in conformity with OWASP recomendations;
- Passwords hashed with Jetstream/Fortify;
- Both Admins and Users can have their accounts locked if they fail too many times to login in a certain period of time (Fortify's default is 5 times per minute but can be customized);
- After login Users are redirected to a profile page while Admins are redirected to a dashboard page;
- Regular Users cannot access dashboard, only Admins;
- Meanwhile Admins can access both the profile page and the dashboard;
- At the profile page Users and Admins can view, edit and even delete their profile;
- At the dashboard Admins can register other Admins;
- Admins can see a panel listing all Users, where they can filter results by role, date of register and a text field for name/email;
- Admins can see both Users and Admins in this panel (but not themselves);
- Admins can delete Users in this panel, but cannot delete other Admins;
- All operations fully integrated with a SQLite database.

# Setup Process
1. <a href="https://www.apachefriends.org/download.html" target="_blank">Download XAMPP to install PHP and the other Laravel dependencies</a>, if you haven't already;
2. Clone the repo with `git clone https://github.com/matheusrocha-mus/User-Management-System.git`;
3. <a href="https://nodejs.org/en/download/package-manager" target="_blank">Install NPM</a>, if you haven't already;
4. At the repo's root, enter the command `npm install`;
5. Then, follow with the command `npm run dev`;
6. <a href="https://getcomposer.org/download/" target="_blank">Install composer</a>, if you haven't already;
7. Enter the command `composer install`;
8. Rename the `.env.example` file as `.env`;
9. In the content of the `.env` file, set `DB_CONNECTION=sqlite` and comment out the rest of the DB section - this will set our DB as SQLite;
10. Enter the command `php artisan migrate`;
11. Then, follow with the command `php artisan db:seed` - this will generate some dummy users and an admin;
    - The email of the default Admin is 'admin@example.com' and it's password is '1234A&5678b';
12. Then, `php artisan key:generate`;
13. Finally, enter `php artisan serve` - if all steps were followed correctly, the application should be up and running at `http://localhost:8000`.
