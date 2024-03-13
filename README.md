# Car Dealers (Backend API)

The project is a Laravel-based web application that serves as a backend for managing a car dealership system. It includes features for managing cars, their images, body types, and makes. Additionally, it provides user authentication functionalities for login, logout, and token validation. The application follows RESTful API conventions and includes CRUD operations for managing cars and car images. It also provides endpoints for retrieving dropdown options for cars and body types.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

- PHP >= 8.1
- Composer
- MySQL

### Installing

1. Clone the repository:
 ```
https://github.com/MuhammadAhsanAli/car_dealers.git
 ```

2. Install PHP dependencies:
 ```
composer update
 ```

3. Create a copy of the `.env.example` file and name it `.env`. Set up your database credentials and database name in the `.env` file.

4. Set the image folder name in the `.env` file:
 ```
CAR_IMAGE=your_image_folder_name
 ```
 
5. Create a folder under `storage/app/public/` for storing uploaded images.

6. Set read and write permissions for the storage folder:
 ```
sudo chmod -R 777 storage
 ```

7. Generate an application key:
 ```
php artisan key:generate
 ```

8. Run database migrations:
 ```
php artisan migrate
 ```

9. Uncomment all seeder names in the `database/seeders/DatabaseSeeder.php` file.

10. Seed the database:

 ```
 php artisan db:seed
 ```

Usage
-----

### Managing Cars:

1. **Viewing Cars:**
   - Send a GET request to `/api/cars` to retrieve a list of all cars.
   - Optionally, include a `body_id` parameter to filter cars by body type.

2. **Viewing Car Details:**
   - Send a GET request to `/api/cars/{id}` to retrieve details of a specific car by its ID.

3. **Adding a New Car:**
   - Send a POST request to `/api/cars` with the required car details in the request body.

4. **Updating a Car:**
   - Send a PUT request to `/api/cars/{id}` with the updated car details in the request body.

5. **Deleting a Car:**
   - Send a DELETE request to `/api/cars/{id}` to delete a specific car by its ID.

### Managing Car Images:

1. **Uploading Images:**
   - Send a POST request to `/api/images/store` with the image file(s) attached.

2. **Deleting an Image:**
   - Send a DELETE request to `/api/images/{name}` to delete a specific image by its name.

### Managing Body Types:

1. **Viewing Body Types:**
   - Send a GET request to `/api/bodies` to retrieve a list of all body types.

### Authentication:

1. **Logging In:**
   - Send a POST request to `/api/login` with valid credentials (email and password) to obtain an access token.

2. **Validating Token:**
   - Send a POST request to `/api/is_login` with a valid access token to verify its authenticity.

3. **Logging Out:**
   - Send a POST request to `/api/logout` with a valid access token to revoke it and log out the user.

Note:
- Make sure to include the required headers and parameters.
- Ensure proper authentication and authorization for accessing protected endpoints.
- Handle responses and errors accordingly based on the API's status codes and response structures.



