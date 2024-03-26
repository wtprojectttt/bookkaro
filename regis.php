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
    $username = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['cpass'];

    // Validate password match
    if ($password !== $confirm_password) {
        echo "Passwords do not match";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert user data into database
    $sql = "INSERT INTO register (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful
        echo "User registered successfully";

        // Additional steps for sending one-time password to email
        // Here, you would generate a random one-time password and send it to the user's email
        // You'll need to integrate with an email service (e.g., SMTP) for this functionality

        // Close database connection
        $conn->close();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
