<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Car Shop</title>
    <link rel="stylesheet" href="style.css"
</head>
<body>

    <header>
        <h1>Welcome to Car Shop</h1>
        <nav>
            <?php if ($user_data) : ?>
                <a href="logout.php">Logout</a>
            <?php else : ?>
                <a href="login.php">Login</a>
                <a href="signup.php">Sign Up</a>
            <?php endif; ?>
            <a href="contact.php">Contact Us</a>
        </nav>
    </header>

    <main>
        <section class="featured-cars">
            <h2>Featured Cars</h2>
            <div class="car-card">
                <img src="car1.jpg" alt="Car 1">
                <h3>2022 Model XYZ</h3>
                <p>$25,000</p>
                <a href="#">View Details</a>
            </div>

            <div class="car-card">
                <img src="car2.jpg" alt="Car 2">
                <h3>2022 Model ABC</h3>
                <p>$30,000</p>
                <a href="#">View Details</a>
            </div>

            <!-- Add more featured cars as needed -->
        </section>

        <?php if (!$user_data) : ?>
            <section class="guest-section">
                <h2>Why Create an Account?</h2>
                <p>Creating an account allows you to save your favorite cars, compare prices, and receive personalized recommendations.</p>
                <a href="signup.php">Sign Up Now</a>
            </section>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 Car Shop. All rights reserved.</p>
    </footer>

</body>
</html>
