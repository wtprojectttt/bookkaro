<?php
// Step 1: Establish a connection to the MySQL database
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Change this to your MySQL username
$password = "system"; // Change this to your MySQL password
$dbname = "bookkaro"; // Change this to the name of your MySQL database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST['first_name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // Step 3: Insert form data into the database
    $sql = "INSERT INTO contact(first_name, email, message) VALUES ('$first_name', '$email', '$message')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('We will reach out to you soon!!!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
