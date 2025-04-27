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

**Register/Login to access event features.**

  ![image](https://github.com/user-attachments/assets/ab6d5a7b-8095-46f1-95dc-b27c1ead132d)

  ![image](https://github.com/user-attachments/assets/7286e55f-9468-4bf0-aec4-8b5e2a34437b)

**Users can view and register Events**

  ![image](https://github.com/user-attachments/assets/3359f5a8-b49a-4f37-be4b-4610d23d1a4a)

  ![image](https://github.com/user-attachments/assets/b1d6d072-0a61-42fc-9227-40d3ab6f0a73)

**Admins can manage all events and users.**

  ![image](https://github.com/user-attachments/assets/5699d3d8-758b-4851-9bbc-d3891257d6a2)

  ![image](https://github.com/user-attachments/assets/69d7a572-d336-428c-b88f-4f3414483369)

  ![image](https://github.com/user-attachments/assets/4d4ced0f-bccb-4340-8e9c-9f7d21177c64)

