<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con, true);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $message = mysqli_real_escape_string($con, $_POST["message"]);

    // Get user information if logged in
    $userid = isset($user_data['user_id']) ? $user_data['user_id'] : null;
    $username = isset($user_data['user_name']) ? $user_data['user_name'] : null;

    // Insert the form data into the database
    $query = "INSERT INTO contact_messages (userid, username, name, email, message, date) VALUES ('$userid', '$username', '$name', '$email', '$message', NOW())";
    mysqli_query($con, $query);
    // You might want to add error handling for the database insert operation

    // Display a success message or redirect the user
    $success_message = "Your message has been submitted successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <h1>Contact Us</h1>
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
        <?php if (isset($success_message)) : ?>
            <p class="success-message"><?php echo $success_message; ?></p>
        <?php else : ?>
            <section class="contact-form">
                <h2>Send us a Message</h2>
                <form method="post" action="contact.php">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="message">Message:</label>
                    <textarea id="message" name="message" required></textarea>

                    <button type="submit">Submit</button>
                </form>
            </section>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 Car Shop. All rights reserved.</p>
    </footer>

</body>
</html>
