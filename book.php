<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Update with your DB username
$password = ""; // Update with your DB password
$dbname = "book_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $guests = $_POST['guests'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];

    // Debug: Check if form fields are properly collected
    if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($location) || empty($guests) || empty($arrivals) || empty($leaving)) {
        die("Form fields cannot be empty. Please try again.");
    }

    // Insert data into database
    $sql = "insert into book_form(name, email, phone, address, location, guests, arrivals, leaving)
    values('$name', '$email', '$phone', '$address', '$location', '$guests', '$arrivals', '$leaving')";

    if ($conn->query($sql) === TRUE) {
        echo "Contact information submitted successfully!";
    } else {
        // Debug: Output SQL error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
} else {
    // Debug: If the form is not submitted, show this message
    echo "Form was not submitted. Please try again.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>book</title>
<!--swiper css link ( use swiper from cdn-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<!--font awasome cdn link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
<link rel="stylesheet" href="trip.css">
</head>
<body>
<!--header section-->
<section class="header">
    <a href="home.php" class="logo">Travel.</a>
    <nav class="navbar">
    <a href="home.php">home</a>
    <a href="about.php">about</a>
    <a href="package.php">package</a>
    <a href="book.php">book</a>
    </nav>
    <div id="menu-btn" class="fas fa-bars"></div>
    </section>
    <div class="slide" style="background:url(pkg1.png) no-repeat" >
    <h1>book now</h1>
</div>
<!--BOOKING SECTION STARTS-->
<section class="booking">
    <h1 class="heading-title">book your trip</h1>
    <form method="post" class="book_form">
    <div class="flex">
        <div class="inputBox">
            <span>name:</span>
            <input type="text" placeholder="enter your name" name="name">

        </div>
    
        <div class="inputBox">
            <span>email:</span>
            <input type="email" placeholder="enter your email" name="email">
        </div>
        <div class="inputBox">
            <span>phone:</span>
            <input type="phone" placeholder="enter your number" name="phone">
            
        </div>
        <div class="inputBox">
            <span>address:</span>
            <input type="address" placeholder="enter your address" name="address">
        </div>      <div class="inputBox">
            <span>where to:</span>
            <input type="text" placeholder="place you want to visit" name="location">
            </div>
            <div class="inputBox">
            <span>how many:</span>
            <input type="number" placeholder="number of guest" name="guests">
            
        </div>
        <div class="inputBox">
            <span>arrivals:</span>
            <input type="date" name="arrivals">
            
        </div>
        <div class="inputBox">
            <span>leaving:</span>
            <input type="date"name="leaving">
            
        </div>
       <input type="submit" value="submit" class="btn" name="sends">
    </div>
    </form>
</SECTION>
<section class="footer">
<div class="credit"> created by <span> miss web desiggner</span> all rights reserved</div>
</section><!--swiperjs link-->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="trip.js"></script>
</body>
</html>
