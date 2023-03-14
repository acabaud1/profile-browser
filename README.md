## Profile Browser

Profile Browser is a simple Laravel / Vue.js application that displays star profiles and include dashboard to manage them.

It relies on Laravel Breeze which includes Inertia for Vue3 support, Tailwind for CSS and a simple authentication implementation.

## Install & setup

Clone the respository
    
    git clone git@github.com:acabaud1/profile-browser.git


Switch to the repo folder

    cd profile-browser

Install all the dependencies using composer

    composer install

Install node dependencies

    npm install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations

    php artisan migrate

Create public assets symlink (for uploaded images)

    php artisan storage:link

Start the local development server

    php artisan serve

You can now access the local server at http://localhost:8000

## Database seeds

Run seeders to populate database

    php artisan db:seed

This will create 5 new Star entries with random fake data.

## Dashboard access

First, create a new account : http://127.0.0.1:8000/register

Then you can access the dashboard at http://127.0.0.1:8000/dashboard and manage your profile and Stars.