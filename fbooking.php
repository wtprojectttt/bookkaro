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
                    // echo "<p>First Name: " . $row["first_name"] . " - Last Name: " . $row["last_name"] . " - Email: " . $row["email"] . " - Contact Number: " . $row["contact_number"] . " - Number of Passengers: " . $row["num_passengers"] . " - From: " . $row["from_location"] . " - To: " . $row["to_location"] . " - Boarding Date: " . $row["boarding_date"] . " - Class: " . $row["class"] . " - Fare Type: " . $row["fare_type"] . "</p>";
             
                    echo "<style>
                            *{
                                margin: 0;
                                padding: 0;
                            }
                            
                            body{
                                font-family: Verdana, Geneva, Tahoma, sans-serif;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);
                                min-height: 100vh;
                            }
                            
                            .ticket{
                                /* padding: 20px; */
                                width: 80%;
                                box-shadow: 0 .4rem .8rem #0005;
                                background-color: white;
                                border-radius: 10px;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                            }
                            
                            .userd{
                                border-right-style: dashed;
                                border-width: 2px;
                            
                            }                    
                        </style>";
                    
                    echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>";
                    echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'></script>";

                        echo "<div class='ticket'>";
                        echo "<h2>Flight Ticket</h2>";
                        echo "<div class='col-sm-4 p-3 userd'>";
                        echo "<p><strong>Passenger Details:</strong></p>";
                        echo "<p><strong>First Name:</strong> " . $row["first_name"] . "</p>";
                        echo "<p><strong>Last Name:</strong> " . $row["last_name"] . "</p>";
                        echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
                        echo "<p><strong>Contact Number:</strong> " . $row["contact_number"] . "</p>";
                        echo "<p><strong>Number of Passengers:</strong> " . $row["num_passengers"] . "</p>";
                        echo "</div>";
                        echo "<div class='col-sm-4 p-3 flightd'>";
                        echo "<p><strong>Flight Details:</strong></p>";
                        echo "<p><strong>From:</strong> " . $row["from_location"] . "</p>";
                        echo "<p><strong>To:</strong> " . $row["to_location"] . "</p>";
                        echo "<p><strong>Boarding Date:</strong> " . $row["boarding_date"] . "</p>";
                        echo "<p><strong>Class:</strong> " . $row["class"] . "</p>";
                        echo "<p><strong>Fare Type:</strong> " . $row["fare_type"] . "</p>";
                        echo "</div>";
                        echo "</div>";
                        

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
