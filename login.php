<?php
        // Database connection parameters
        $servername = "localhost"; // Change this if your database is hosted elsewhere
        $username = "root";
        $password = "system";
        $dbname = "bookkaro";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Escape user inputs for security
            $email = $conn->real_escape_string($_POST['email']);
            $password = $conn->real_escape_string($_POST['password']);

            // Hash the password before saving it to the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Prepare SQL statement to insert data into users table
            $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Close connection
        $conn->close();
    ?>