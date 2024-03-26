<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish MySQL database connection
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

    // Retrieve form data
    $username_or_email = $_POST['username_or_email'];
    $password = $_POST['password'];

    // Prepare SQL statement to retrieve user data from the database
    $sql = "SELECT * FROM register WHERE username = '$username_or_email' OR email = '$username_or_email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User found, verify password
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            // Password is correct, login successful
            echo "Login successful";
            // You can perform additional actions here, such as setting session variables for the user
        } else {
            // Incorrect password
            echo "Incorrect password";
        }
    } else {
        // User not found
        echo "User not found";
    }

    // Close database connection
    $conn->close();
}
?>
