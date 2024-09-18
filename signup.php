<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book_db"; // Ensure correct database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "Passwords do not match.";
        exit();
    }

    // Enforce 8-character password length
    if (strlen($password) < 8) {
        echo "Password must be at least 8 characters long.";
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into signup table
    $sql = "INSERT INTO signup (username, email, phone, password) VALUES ('$username', '$email', '$phone', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location: login.php"); // Redirect to login page after successful signup
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateSignupForm() {
            // Get form field values
            var password = document.forms["signupForm"]["password"].value;
            var confirmPassword = document.forms["signupForm"]["confirm_password"].value;

            // Check if password is at least 8 characters long
            if (password.length < 8) {
                alert("Password must be at least 8 characters long.");
                return false; // Prevent form submission
            }

            // Check if passwords match
            if (password !== confirmPassword) {
                alert("Passwords do not match. Please re-enter.");
                return false; // Prevent form submission
            }

            return true; // Allow form submission if validation passes
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Create an Account</h2>
        <form name="signupForm" action="signup.php" method="post" onsubmit="return validateSignupForm()">
            <input type="text" name="username" placeholder="username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="phone" placeholder="Phone Number" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Log in here</a></p>
    </div>
</body>
</html>
