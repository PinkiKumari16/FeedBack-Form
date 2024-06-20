<?php
    // Start session
    session_start();

    //  Include the database configuration file
    require_once 'config.php';
    

/**
 * Create a database connection
 * 
 * @param string $servername
 * @param string $username
 * @param string $password
 * @param string $database
 * @return mysqli|null
*/

    function createDatabaseConnection($servername, $username, $pass, $database){
        $connection = mysqli_connect($servername, $username, $pass, $database);
        if(!$connection){
            die('Sorry we failed'.mysqli_connection_error());
        }
        return $connection;
    }

/**
 * Validate the email format
 * 
 * @param string $email
 * @return bool
 */

    function isValidEmail($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

/**
 * Insert form data into the database
 * 
 * @param mysqli $connection
 * @param string $email
 * @param string $name
 * @param string $country
 * @param int $rating
 * @return bool
*/

    function insertFormData($connection, $email, $name, $countryName, $rating){
        $insert_query = "INSERT INTO `tabelName` (`Email`, `Name`,`Country`,`Rating`) VALUES ('$email', '$name','$countryName','$rating')";
        return mysqli_query($connection, $insert_query);
    }

// Main script execution
    $connection = createDatabaseConnection($servername, $username, $password, $database);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $name = $_POST['name'];
        $countryName = $_POST['country'];
        $rating = $_POST['rating'];

        // echo "$email. $name. $countryName. $rating";

        if(!isValidEmail($email)){
            echo "<script>
                alert(`Invalid email format: ${email}.\nExample of a valid email: example[0-9]@gmail.com`); 
                window.history.back();
            </script>";
        }
        else{
            if(insertFormData($connection, $email, $name, $countryName, $rating)){
                // Set a cookie for 30 days
                setcookie('form_submitted', 'true', time() + (86400), '/');
                echo "<script>
                    alert('Response Submitted...'); 
                </script>";
            }
            else{
                echo "<script>
                    alert('Failed to submit response. Please try again.');
                </script>";
            }
        }
    }
    else{
        echo 'Form data is not set.';
    }



// Uncomment the following block to create the database and table

/*
function createDatabase($connection) {
    $sql = 'CREATE DATABASE databaseName';
    return mysqli_query($connection, $sql);
}

function createTable($connection) {
    $table_query = 'CREATE TABLE `tableName` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `Email` VARCHAR(50) NOT NULL,
        `Name` VARCHAR(50) NOT NULL,
        `Country` VARCHAR(50) NOT NULL,
        `Rating` INT(10) NOT NULL,
        PRIMARY KEY (`id`)
    )';
    return mysqli_query($connection, $table_query);
}

if (createDatabase($connection)) {
    echo "The database is created.";
} else {
    echo "The database is not created.";
}

if (createTable($connection)) {
    echo "Table is created successfully.";
} else {
    echo "Failed to create table.";
}
*/

?>

