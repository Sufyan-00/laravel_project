# Event Management App

## Overview

This is an Event Management Application built with Laravel and Breeze. It allows users to create, manage, and participate in events seamlessly.

## Features

- User Authentication (Login, Registration, Password Reset) via Laravel Breeze
- Create, Edit, and Delete Events
- Event Listings with Pagination
- Event Participation
- User Profiles
- Admin Dashboard for Event Management

## Installation

### Prerequisites

Make sure you have the following installed on your system:

- PHP (>= 8.0)
- Composer
- Laravel
- MySQL or PostgreSQL (or any other supported database)
- Node.js and NPM

### Setup Instructions

1. **Clone the Repository**

   ```sh
   git clone https://github.com/Sufyan-00/laravel_project.git
   cd laravel_project/EventManagement
   ```

2. **Install Dependencies**

   ```sh
   composer install
   npm install && npm run dev
   ```

3. **Set Up Environment File**

   ```sh
   cp .env.example .env
   ```

   Update the `.env` file with your database credentials and other configurations.

4. **Run Migrations and Seed Database**

   ```sh
   php artisan migrate --seed
   ```

5. **Serve the Application**

   ```sh
   php artisan serve
   ```

   The app will be available at `http://127.0.0.1:8000`

## Usage

- Register/Login to access event features.
- Create new events and manage existing ones.
- View upcoming events.
- Admins can manage all events and users.

