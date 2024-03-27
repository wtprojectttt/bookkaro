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

            // Prepare SQL statement
            $sql = "SELECT * FROM booking WHERE first_name=? AND email=?";
            $stmt = $conn->prepare($sql);

            // Bind parameters
            $stmt->bind_param("ss", $first_name, $email);

            // Execute query
            $stmt->execute();

            // Get result
            $result = $stmt->get_result();

            // Check if there are any rows in the result
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<p>First Name: " . $row["first_name"] . " - Last Name: " . $row["last_name"] . " - Email: " . $row["email"] . " - Contact Number: " . $row["contact_number"] . " - Number of Passengers: " . $row["num_passengers"] . " - From: " . $row["from_location"] . " - To: " . $row["to_location"] . " - Boarding Date: " . $row["boarding_date"] . " - Class: " . $row["class"] . " - Fare Type: " . $row["fare_type"] . "</p>";
                }
            } else {
                echo "0 results";
            }

            // Close statement and database connection
            $stmt->close();
            $conn->close();


    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
    }

}
?>
