<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name'], $_POST['email'], $_POST['no'], $_POST['date'], $_POST['class'], $_POST['adult'], $_POST['child'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $no = $_POST['no'];
        $date = $_POST['date'];
        $class = $_POST['class'];
        $adult = $_POST['adult'];
        $child = $_POST['child'];

        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'restaurant');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute SQL query
        $sql = "INSERT INTO reservation (name, email, no, date, class, adult, child) VALUES ('$name', '$email', '$no', '$date', '$class', '$adult', '$child')";

        if ($conn->query($sql) === TRUE) {
            echo "<h2>New record inserted successfully</h2>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Please fill in all required fields.";
    }
} else {
    echo "No form data submitted.";
}
?>