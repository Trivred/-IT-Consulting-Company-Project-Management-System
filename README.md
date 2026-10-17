IT Consulting Company Project Management System

Description

The IT Consulting Company Project Management System is a web-based application designed to help an IT consulting company organize and monitor its projects. It provides a dashboard for viewing project information and sections for managing projects, tasks, team members, and resources.

The application is built with PHP and MySQL and uses Bootstrap for its interface. It is intended as an academic project demonstrating database-driven web development and basic project management functionality.

Features

Dashboard with summary counts for projects, tasks, people, and resources.

Project listing with details such as planned and actual start dates, budgets, and project managers.

Task listing and filtering by project.

Project overview pages with related tasks.

Task detail pages with associated resources.

People directory containing contact information.

Resource listing and quantities.

MySQL database integration.

Technologies Used

PHP

MySQL / MariaDB

HTML5

CSS3

JavaScript

Bootstrap

XAMPP (local development environment)

Requirements

XAMPP or another local PHP/MySQL environment

PHP with the mysqli extension

A web browser

Installation and Setup

Download or clone this repository.

Copy the project folder into your XAMPP htdocs directory. For example:
C:\xampp\htdocs\project_management

Start Apache and MySQL from the XAMPP Control Panel.

Open phpMyAdmin at http://localhost/phpmyadmin.

Create a database named it_project, or import the included SQL file directly.

Select the it_project database and choose Import.

Import it_project.sql from the project folder.

Check the database settings in includes/db.php:

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "it_project";

Update these values if your local MySQL configuration is different.

Open the application in your browser:
http://localhost/project_management/

Database

The project includes it_project.sql, a SQL dump that creates and populates the database tables used by the application. Import this file before opening the website. If the database has a different name, update db_name in includes/db.php to match it.

Project Structure

project_management/
├── index.php
├── project.php
├── task.php
├── resource.php
├── people.php
├── view_project.php
├── view_task.php
├── functions.php
├── includes/
│   ├── db.php
│   ├── admin_header.php
│   ├── admin_navigation.php
│   └── admin_footer.php
├── css/
├── js/
└── it_project.sql

Notes

This project is configured for local development. Review database credentials and security settings before deploying it to a public server.

Importing the SQL file is necessary to create the database tables and sample records.
