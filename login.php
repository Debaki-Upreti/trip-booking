<?php
session_start(); // Start the session to track user login
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book_db"; // Ensure this is correct

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Check if the user exists in the signup table
    $sql = "SELECT * FROM signup WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch user data
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Login successful, start session
            $_SESSION['username'] = $username;
            header("Location: home.php"); // Redirect to home.php
            exit(); // Ensure the script stops after the redirect
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateLoginForm() {
            // Get the values from the form fields
            var username = document.forms["loginForm"]["username"].value;
            var password = document.forms["loginForm"]["password"].value;

            // Check if username or password is empty
            if (username == "" || password == "") {
                alert("Please fill in both username and password before logging in.");
                return false; // Prevent form submission
            }
            return true; // Allow form submission if fields are filled
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Login to Your Account</h2>
        <form name="loginForm" action="login.php" method="post" onsubmit="return validateLoginForm()">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
    </div>
</body>
</html>


