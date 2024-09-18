<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "book_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $review = mysqli_real_escape_string($conn, $_POST['review']);

    // Insert the review into the database
    $sql = "INSERT INTO reviews (author, email, review) VALUES ('$author', '$email', '$review')";
    if ($conn->query($sql) === TRUE) {
        echo "New review added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch reviews from the database
$sql = "SELECT * FROM reviews ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
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
<!--header section ends-->
<!--home section starts-->
<section class="home">

       
        <div class="slide" style="background:url(slide.3.png) no-repeat">
    <div class="content">
        <span>explore, discover, travel</span>
        <h3>travel around the world</h3>
        <a href="package.php" class="btn">discover more</a>


    </div>
        </div>
    
</section>




<!--service section starts-->
<section class="services">
    <h1 class="heading-title">our services</h1>
    <div class="box-container">
    <div class="box">
        <img src="service.1.png" alt="">
        <h3>adventure</h3>
    </div>
    <div class="box">
        <img src="service2.png" alt="">
        <h3>tour guide</h3>
    </div>
    <div class="box">
        <img src="service3.jfif" alt="">
        <h3>trekking</h3>
    </div>
    <div class="box">
        <img src="service4.png" alt="">
        <h3>camp fire</h3>
    </div>
    <div class="box">
        <img src="service5.png" alt="">
        <h3>off road</h3>
    </div>
    <div class="box">
        <img src="service6.png" alt="">
        <h3>camping</h3>
    </div>
    </div>
</section>
<!--service section ends-->
<!--home about section starts-->
<section class="home-about">
    <div class="image">
        <img src="object1.png" alt="">
    </div>
    <div class="content">
        <h3>about us</h3>
        <p>
                Welcome to our travel website! We are dedicated to providing you with the best travel experiences around the world. 
, and let's make your dream vacation a reality!
            </p>
            <a href="about.php" class="btn">spred more</a>
            </div>
</section>
<!--home package section starts-->
<section class="home-packages">
    <h1 class="heading-title">our packages</h1>
    <div class="box-container">
        <div class="box">
            <div class="image">
                <img src="package2.png" alt="">
            </div>
            <div class="content">
                <h3>adventure & tour</h3>
                <p>" Our hotel services ensure you have the best experience, with comfortable stays at top-rated hotels that match your preferences and budget. Whether you're seeking adventure,"</p>
                   <a href="book.php" class="btn">book now</a>  
                    </div>
        </div>
    <div class="box">
            <div class="image">
                <img src="package3.png" alt="">
            </div>
            <div class="content">
                <h3>adventure & tour</h3>
                <p>"Whether you're seeking adventure, relaxation, or cultural immersion, our team is here to create a seamless travel itinerary tailored just for you."</p>
                   <a href="book.php" class="btn">book now</a>  
                    </div></div>
        </div>
    </div><div class="load-more"><a href="package.php" class="btn">  load more</a></div>

</section>
    <!--home-offer section start-->
<section class="home-offer">
    <div class="content">
        <h3>upto 60% off</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed, harum porro. Voluptatibus voluptas laboriosam
             ea obcaecati praesentium beatae sit nobis.</p>
          <a href = "book.php" class="btn">book now</a>
            </div>
</section>
<!--review section starts-->
<!-- Review Section -->
<section id="review">
    <h3>Leave a review</h3>
    <form class="comment-form" action="home.php" method="POST">
        <input type="text" name="author" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email (optional)">
        <textarea name="review" placeholder="Your review..." rows="5" required></textarea>
        <button type="submit">Submit review</button>
    </form>
</section>
 <!-- Display Reviews -->
 <section id="review-section">
        <h3>Reviews</h3>
        <div class="reviews-list">
            <?php
            if ($result->num_rows > 0) {
                // Output each review
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='review'>";
                    echo "<h4>" . htmlspecialchars($row['author']) . "</h4>";
                    echo "<p>" . htmlspecialchars($row['review']) . "</p>";
                    echo "<small>Posted on " . $row['created_at'] . "</small>";
                    echo "</div><hr>";
                }
            } else {
                echo "<p>No reviews yet. Be the first to leave one!</p>";
            }
            ?>
        </div>
    </section>





<!--footer section-->
<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>quick links</h3>
            <a href="home.php"><i class="fas fa-angle-right"></i>home</a>
    <a href="about.php"><i class="fas fa-angle-right"></i>about</a>
    <a href="package.php"><i class="fas fa-angle-right"></i>package</a>
    <a href="book.php"><i class="fas fa-angle-right"></i>book</a>
        </div>
        <div class="box">
            <h3>extra links</h3>
            <a href="#"><i class="fas fa-angle-right"></i>ask questions</a>
    <a href="#"><i class="fas fa-angle-right"></i>about us</a>
    <a href="#"><i class="fas fa-angle-right"></i>privacy policy</a>
    <a href="#"><i class="fas fa-angle-right"></i>terms of uses</a>
        </div>
        <div class="box">
            <h3>quick links</h3>
            <a href="#"><i class="fas fa-phone"></i>+123-456-7890</a>
    <a href="#"><i class="fas fa-phone"></i>+111-222-333</a>
    <a href="#"><i class="fas fa-envelope"></i>upretidebaki375@gmail.com</a>
    <a href="#"><i class="fas fa-map"></i>lalitpur, Nepal</a>
        </div>
        <div class="box">
            <h3>extra links</h3>
    <a href="#"><i class="fa-brands fa-facebook"></i>facebook</a>
    <a href="#"><i class="fa-brands fa-instagram"></i>instagram</a>
    <a href="#"><i class="fa-brands fa-twitter"></i>twitter</a>
    <a href="#"><i class="fa-brands fa-linkedin"></i>linkedin</a>
        </div>
        </div>
  <div class="credit"> created by <span> miss web desiggner</span> all rights reserved</div>
</section>


<script src="trip.js"></script>
</body>
</html>