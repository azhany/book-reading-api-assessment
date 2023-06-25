# book-reading-api-assessment

This Book project demonstrates various features, including user authentication, CRUD operations on books, and book status updates. The project is set up using Docker and includes automation testing. It follows a modular structure, implements APIs, error handling, and security measures.

## Features

1. User Authentication with Laravel Passport: The project uses Laravel Passport for user authentication, allowing users to register, log in, and obtain access tokens for API authentication.

2. CRUD Books: The project includes functionality for performing CRUD (Create, Read, Update, Delete) operations on books. The books have attributes such as Title, Author, Genre, and Page Count.

3. Book Status Update: Users can update the status of their books, indicating whether they are "Reading," "Read," or "To Read." Additionally, users can enter the page number they have reached to track their reading progress. The database design considers future use cases, such as generating reports on reading progress over time.

## Technical Stack

The project utilizes the following technologies and tools:

- Laravel: A PHP web framework for building robust web applications.
- MySQL: A popular relational database management system.
- Docker: A containerization platform that simplifies application deployment.
- Laravel Passport: A Laravel package for API authentication using OAuth2.
- PHPUnit: A unit testing framework for PHP.
- Laravel Pint: A coding style guide and formatter for Laravel projects.

## Project Setup

To set up and run the project locally, follow these steps:

1. Clone the repository from GitHub:

git clone https://github.com/azhany/book-reading-api-assessment

2. Navigate to the project directory:

cd book-reading-api-assessment

3. Install the project dependencies:

composer install


4. Set up the environment variables by creating a copy of the `.env.example` file and renaming it to `.env`:

cp .env.example .env

5. Generate the application key:

php artisan key:generate


6. Update the `.env` file with your MySQL database credentials.

7. Set up the database tables by running the database migrations:

php artisan migrate


8. (Optional) Run the database seeder to populate the database with sample data:

php artisan db:seed


9. Start the Laravel development server:

php artisan serve


10. You can now access the application in your web browser at `http://localhost:8000`.

## Testing

The project includes automated tests to ensure its functionality. To run the tests, use the following command:

php artisan test


The tests cover various scenarios, including user authentication, book CRUD operations, and book status updates. They verify the expected behavior of the APIs and ensure the project functions as intended.
