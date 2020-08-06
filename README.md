# uCraft Task. 
The purpose of this project is to satisfy the ucraft assignment. 

## Task Details
- User should register and login to the system: you need to implement user registration and login flow.
- There should be 2 ways of registration: via email & via google or facebook.
- To be able to log in the user has to verify his/her account from the email he/she gets.
- When logged in for the first time user should be able to add his wallet in order to continue (think at it of UX perspective)
- Wallets should have name and type (examples: credit card, cash), note that user can add as many wallets as wanted.
- After adding wallets user should be able to add records.
- Records can be of Credit or Debit types. User should chose the wallet of which to remove or to add a specific amount.
- Don't forget to show total balance, and the balance of each wallet and update it in a separate Reporting section.
- Write appropriate unit tests.

## Technologies
The following language / technologies has been used in this project. 
- Html 
- Bootstrap
- Laravel
- Php Unit Test

## Installation
To install this project, you need to have **Composer** and **git** install in your local machine.

### How to Install?
- Open your terminal and run the following command. 
`git@github.com:tisuchi/ucraft.git`.

It will download the codebase to `ucraft` folder. 
- Now, `cd ucraft` and run `composer install`.
- Next, type `cp .env.example .env` in the terminal
- Then run `php artisan key:generate` command in terminal.

Now, set up your **database** credentials into `.env` file. 

Once done, finally run the following command for database seeder.
`php artisan db:seed` 

### How to run?
Once you have done everything succcessfully, and run `php artisan serve`, the application should bootup now. 

## Testing. 
If you want to run the Unit Test, then just run the following command. 
`vendor/bin/phpunit` on the project root directory.

If you have any question, feel free to knock me tisuchi@gmail.com 

Enjoy.  
