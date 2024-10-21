<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the JSON data from the request
$cart = json_decode(file_get_contents('php://input'), true);

if ($cart && is_array($cart)) {
    foreach ($cart as $item) {
        $item_name = $item['name'];
        $item_price = $item['price'];
        $quantity = 1; // Assuming a default quantity of 1

        // Insert cart item into the database
        $stmt = $conn->prepare("INSERT INTO cart (item_name, item_price, quantity) VALUES (?, ?, ?)");
        $stmt->bind_param("sdi", $item_name, $item_price, $quantity);
        $stmt->execute();
    }

    echo "Cart items added successfully!";
} else {
    echo "Failed to add items to the cart.";
}

$conn->close();
?>
