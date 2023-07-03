# Showboat Assignment Project

This project is a small form entry application developed as part of the Showboat recruitment process. It allows users to fill out a form with various fields and stores the form entries in a password-protected admin dashboard.

## Technologies Used

-   Laravel (PHP framework)
-   Bootstrap (Front-end framework)
-   MySQL (Database)

## Installation

1. Clone the repository to your local machine:

```
git clone https://github.com/Awes-Khan/ShowBoat-Project.git
```

2. Navigate to the project directory:

```
cd ShowBoat-Project
```

3. Install the dependencies using Composer:

```
composer install
npm install
```

4. Create a copy of the `.env.example` file and rename it to `.env`. Update the necessary configuration values such as database credentials.

5. Generate a new application key:

```
php artisan key:generate
```

6. Run the database migrations to create the necessary tables:

```
php artisan migrate
```

7. (Optional) Run the database seeder to populate the admin user:

```
php artisan db:seed
```

## Usage

1. Start the local development server:

```
php artisan serve
```

and

```
npm run dev
```

2. Access the application in your web browser:

```
http://localhost:8000
```

3. Fill out the form on the homepage with the required details and submit it.

4. To access the admin dashboard, go to the following URL:

```
http://localhost:8000/admin/login
```

Use the admin credentials:  
Username: awes@example.com  
Password: Awes@2023

5. In the admin dashboard, you can view all the form entries submitted by users. You can also update or delete the entries.

## Credits

This project was developed by [Your Name] for the Showboat IT Team recruitment process.

## License

This project is open-source and available under the [MIT License](LICENSE).
