<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product sell</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
     <header>
        <div class="logo">
            <img src="logo.jpg" alt="Website Logo">
        </div>
        <nav>
            <div class="nav-controls">
                <div class="home"><a href="index.php">Home</a></div>                
                <div class="city-select">
                    <select>
                        <option value="">Select City</option>
                        <option value="mumbai">Mumbai</option>
                        <option value="delhi">Delhi</option>
                        <option value="bangalore">Bangalore</option>
                    </select>
                </div>
                <div class="search-bar">
                    <input type="text" placeholder="Search...">
                    <button type="submit">Search</button>
                </div>
            </div>
        </nav>
        <div class="auth-buttons">
            <a href="login.php" class="login">Login</a>
            <a href="signup.php" class="signup">Sign Up</a>
        </div>
        <button id="darkModeToggle">Dark Mode</button>
    </header>
<div class="page-layout">
	 <div class="sidebar">
        <h2>Categories</h2>
        <ul>
             <li><a href="electronic.php">Electronics</a></li>
                <li><a href="clothing.php">Clothing</a></li>
                <li><a href="kitchen.php">Home & Kitchen</a></li>
                <li><a href="beauty.php">Beauty</a></li>
                <li><a href="sport.php">Sports</a></li>
        </ul>
    </div>
  <div class="main-content">
        <h4>Welcome to Our Product Store</h4>
        <p>Choose a category to browse products.</p>
    </div>
     
</div>
<script src="script.js"></script>
</body>
</html>
<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    // Move the uploaded image to the target directory
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO products (name, price, image, description, category) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sdsss", $name, $price, $image, $description, $category);

        // Execute the statement
        if ($stmt->execute()) {
            echo "New product added successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Failed to upload image.";
    }
}

// Close the connection
$conn->close();
?>