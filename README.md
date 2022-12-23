
# User Task Statistics Demo

This is a simple web app DEMO that includes Dashboard for admins who can create tasks and assign them to normal users, and a background job that update number of tasks assigned to each user.



## Prerequisites

- PHP 8.1
- Composer 2.3.5
- MySQL 5.7


## Installation
 
 1- Install dependencies using composer.

 2- Create .env file and change database name, user and pasword, also change UEUE_CONNECTION to database.

 3- Run "php artisan key:generate" to create application key.

 4- Run "php artisan config:cach".

 5- Create database using command "php artisan database:create".

 6- "Run php artisan migrate".

 7- Run application seeders using command "php artisan db:seed".

 8- Run "php artisan serve".



## Hint

- After creating any task and assign it to user, a job is dispatched and messages are saved in database queue called "update_user_task_statistics".
- To consume these messages, please run "php artisan queue:work --queue=update_user_task_statistics" to calculate number of tasks assigned to each user.