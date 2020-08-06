# uCraft Task. 
The purpose of this project is to satisfy the ucraft assignment. 

#### Technologies
The following language and technologies has been used in this project. 
- Html 
- Bootstrap
- Laravel
- Php Unit Test

## Installation
To install this project, you need to have **Composer** and **git** install in your local machine.

#### How to Install?
- Open your terminal and run the following command. 
`git@github.com:tisuchi/ucraft.git`.

It will download the codebase to `ucraft` folder. 
- Now, `cd ucraft` and run `composer install`.
- Next, type `cp .env.example .env` in the terminal
- Then run `php artisan key:generate` command in terminal.

Now, set up your **database** credentials into `.env` file. 

Once done, finally run the following command for database seeder.
`php artisan db:seed` 

#### How to run?
Once you have done everything succcessfully, and run `php artisan serve`, the application should bootup now. 

## Testing. 
If you want to run the Unit Test, then just run the following command. 
`vendor/bin/phpunit` on the project root directory.

If you have any question, feel free to knock me tisuchi@gmail.com 

Enjoy.  
