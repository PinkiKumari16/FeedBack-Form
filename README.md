# **Login Form Project**

## **Overview**

This project is a simple login form with server-side handling to store user data in a database. The form includes fields for email, name, country, and a rating. It ensures that a user cannot submit the form more than once by using cookies.

## **Features**

- **Email, Name, Country, and Rating Inputs**: Collects essential user data.
- **Country Selection**: Dynamically populates the country list and displays the corresponding flag.
- **Rating System**: Allows users to rate their website experience from 1 to 10.
- **Single Submission Prevention**: Uses cookies to prevent multiple form submissions.

## **Requirements**

- A web server (e.g., XAMPP, WAMP, MAMP).
- PHP 7.x or higher.
- MySQL database.

## **Setup Instructions**

### **Step 1: Configure Database**

1. **Create a Database**:
    - Name: `exampleDatabase`
    
2. **Create a Table**:
    ```sql
    CREATE TABLE `example` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `Email` VARCHAR(50) NOT NULL,
        `Name` VARCHAR(50) NOT NULL,
        `Country` VARCHAR(50) NOT NULL,
        `Rating` INT(10) NOT NULL,
        PRIMARY KEY (`id`)
    );
    ```

### **Step 2: Fill Configuration**

1. **Open `config.php`**.
2. **Update the database credentials**:
    ```php
    // config.php

    // Database connection configuration
    $servername = 'localhost';
    $username = 'root';
    $password = '';   // Use your database password
    $database = 'exampleDatabase';
    ```

### **Step 3: Running the Project**

1. **Start your local server** (e.g., XAMPP, WAMP, MAMP).
2. **Place the project files** in the server's root directory (e.g., `htdocs` for XAMPP).
3. **Navigate to `index.html`** in your browser:
    ```url
    http://localhost/Login%20Form/index.html
    ```

## **File Descriptions**

### **config.php**
- Stores the database configuration.
- Ensure to update the `servername`, `username`, `password`, and `database`.

### **countryList.php**
- Contains an array of countries.
- Used to populate the country dropdown in the form.

### **style.css**
- Contains CSS styles for the login form.
- Linked in `index.html`.

### **index.html**
- The main login form layout.
- Uses JavaScript to fetch the country list and update the country flag based on selection.
- Checks if the user has already submitted the form using cookies.

### **data.php**
- Handles form submissions.
- Validates email format.
- Inserts form data into the database.
- Sets a cookie to prevent multiple submissions.

## **Important Points**

1. **Database Connection**:
    Ensure your database is up and running, and the credentials in `config.php` are correct.

2. **Form Submission**:
    - The form will not be shown again to users who have already submitted it.
    - Uses cookies to track submission.

3. **Country List**:
    - The country list is fetched dynamically using JavaScript.
    - The country flag updates based on the selected country.

## **Contact**

For any issues or questions, please contact [pinkikmr2672002@gmail.com].
