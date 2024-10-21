<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name'], $_POST['email'], $_POST['no'], $_POST['rating'], $_POST['feedback'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $no = $_POST['no'];
        $rating = $_POST['rating'];
        $feedback = $_POST['feedback'];

        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'restaurant');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute SQL query
        $sql = "INSERT INTO feedback (name, email, no, rating, feedback) VALUES ('$name', '$email', '$no', '$rating', '$feedback')";

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