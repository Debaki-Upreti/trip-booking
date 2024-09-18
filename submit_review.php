<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'book_db');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);

    // Insert new post into the database
    $sql = "INSERT INTO posts (author, email, review) VALUES ('$username', '$email', $review)";
    if ($conn->query($sql) === TRUE) {
        echo "New post created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?> 