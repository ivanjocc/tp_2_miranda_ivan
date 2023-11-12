# Project README

## Project Overview

This project is a simple PHP application with a MySQL database that allows users to create forms and store the form data in a database. The project consists of multiple PHP files and a basic CSS stylesheet for styling.

## Setup Instructions

### 1. Database Setup

- Create a MySQL database with the name `[tp2_ecom1]`.
- Create a table named `[information]` with the following attributes:
  - `street` (VARCHAR, max length 50)
  - `street_nb` (INT)
  - `type` (VARCHAR, max length 20)
  - `city` (VARCHAR)
  - `zipcode` (INT, 6 digits)

### 2. Project Configuration

- Update the database connection details in the PHP files (`process_forms.php` and others) with your MySQL server details.


## File Structure

- `index.php`: Home page with a form and header image.
- `show_forms.php`: Page for displaying multiple forms based on user input.
- `process_forms.php`: Processes form submissions and inserts data into the database.
- `create_forms.php`: Initial form for inputting the number of forms to create.
- `styles.css`: CSS stylesheet for styling.

## Running the Application

- Ensure a local PHP server is set up.
- Open the project in a web browser, typically at `http://localhost/your_project_folder`.

## Additional Notes

- Server-side validation is implemented in `process_forms.php`.
- Styling is applied using the `styles.css` file.

Feel free to customize and extend the project according to your needs!
