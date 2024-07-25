<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root"; // Replace with your database username
    $password = ""; // Replace with your database password
    $dbname = "indian_restaurant";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $order_details = $_POST['order'];

    $sql = "INSERT INTO orders (name, email, phone, order_details) VALUES ('$name', '$email', '$phone', '$order_details')";

    if ($conn->query($sql) === TRUE) {
        echo "New order placed successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Now - Indian Restaurant</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Order Now</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="order.php">Order Now</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="order-form">
            <h2>Place Your Order</h2>
            <form action="order.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" required>
                <label for="order">Order:</label>
                <textarea id="order" name="order" required></textarea>
                <button type="submit" class="btn">Submit Order</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Indian Restaurant. All rights reserved.</p>
    </footer>
</body>
</html>
