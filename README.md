# Task Manager Application

## Overview:

This is a simple Laravel-based Task Manager application that enables users to create, view, edit, and delete tasks and filter tasks by title or status using a search feature. The main goal of the project is to demonstrate backend logic integration, form validation, and frontend development with Laravel and Bootstrap 4. The application has an intuitive UI with features to manage tasks efficiently.

## Approach:

* MVC Structure: Followed Laravel's Model-View-Controller (MVC) pattern to separate concerns, keep code maintainable, and promote scalability.
* CRUD Functionality: Implemented basic CRUD operations (Create, Read, Update, Delete) for task management with Eloquent ORM, enabling smooth database interactions.

* Bootstrap 4 for UI: Used Bootstrap 4 components for consistent and responsive styling. Applied styles to distinguish task statuses and added modals for user interactions.
* Validation: Applied form validation for task creation and editing to ensure required fields are provided.
* Pagination & Search: Implemented pagination for a better viewing experience on long lists, and included a search bar to filter tasks by title or status.

## Assumptions:

* Task Requirements: The task title is required, while the description is optional. The task status can be either "Completed" or "Pending".
* Database: Assumed MySQL as the primary database. Please adjust configurations if using a different database.
* Local Setup: Assumed the application will run locally with PHP, MySQL, and Composer installed.

## Setup Instructions:

1. Clone Repository

        git clone https://github.com/bhargavi1poyekar/Bloom_Task_Manager
        cd TaskManagerApp

2. Install Dependencies

        composer install
        npm install
        npm run dev

3. Configure Environment

    * Duplicate .env.example file and rename it with .env
    * Update .env with your database credentials. 

            DB_CONNECTION=mysql
            DB_HOST=127.0.0.1
            DB_PORT=3306
            DB_DATABASE=task_manager
            DB_USERNAME=your_db_username
            DB_PASSWORD=your_db_password

4. Generate Application Key

        php artisan key:generate

5. Run Database Migration

        php artisan migrate

6. Start Application

        php artisan serve

7. Access Application

    Open a browser and go to http://127.0.0.1:8000/tasks to access the Task Manager application

## Bonus Feature Implementation:

1. Implemented Pagination for displaying the Tasks. 
2. Implemented Search Bar that filter tasks by title or status.





