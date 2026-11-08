# NGO Management Website

A database-driven website for managing an NGO's programs, students, donors and enrollments.

## Features
- User registration, login and logout
- Student enrollment in NGO programs
- Donation form and donor records
- Data stored in a PostgreSQL database (4 tables)

## Database Tables
| Table | Purpose |
|-------|---------|
| student | Student details |
| ngo | NGO programs |
| donor | Donor details |
| enrollment | Links students to programs |

## Tech Stack
HTML, CSS, PHP, PostgreSQL, XAMPP

## Setup
1. Install XAMPP and PostgreSQL (with pgAdmin 4)
2. Create a database named `ngodb` and create the 4 tables above
3. Enable the `pgsql` extension in `php.ini`
4. Update the credentials in `db.php`
5. Copy the project folder to `htdocs`, start Apache, and open `localhost/ngo-management-website`

## My Role
Team leader and sole developer. Handled design, testing and debugging; AI-assisted for coding.
