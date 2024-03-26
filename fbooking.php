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
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $num_passengers = $_POST['num_passengers'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $boarding_date = $_POST['boarding_date'];
    $class = $_POST['class'];
    $fare = $_POST['fare'];

    // Prepare SQL statement to insert data into users table
    $sql = "INSERT INTO booking (first_name, last_name, date_of_birth, email, contact_number, num_passengers, from_location, to_location, boarding_date, class, fare_type) 
            VALUES ('$first_name', '$last_name', '$date_of_birth', '$email', '$contact_number', '$num_passengers', '$from', '$to', '$boarding_date', '$class', '$fare')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>
