<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product sell</title>
    <link rel="stylesheet" href="style2.css">
   
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
 rel="stylesheet">

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
        <li><a href="electronic.php"><i class="bi bi-tv"></i> Electronics</a></li>
        <li><a href="clothing.php"><i class="bi bi-person"></i>  Clothing</a></li>
        <li><a href="kitchen.php"><i class="bi bi-cup-straw"></i> Home & Kitchen</a></li>
        <li><a href="beauty.php"><i class="bi bi-heart"></i> Beauty</a></li>
        <li><a href="sport.php"><i class="bi bi-dribbble"></i> Sports</a></li>
    </ul>
</div>



  <div class="main-content">
        <h4>Welcome to Our Product Store</h4>
        <p>Choose a category to browse products.</p>
        <div class="banner-slider">
  <div class="slides">
    <div class="slide"><img src="kenya.jpg" alt="Banner 1"></div>
    <div class="slide"><img src="corru.jpg" alt="Banner 2"></div>
    <div class="slide"><img src="nepal.jpg" alt="Banner 3"></div>
  </div>
</div>
  <?php
        // ====== PHP code to show products by category ======
    include 'config.php';
        $categories = ['Electronics', 'Clothing', 'Kitchen', 'Beauty', 'Sports'];

        foreach ($categories as $category) {
            echo "<section class='category-section'>";
            echo "<h2>$category</h2>";
            echo "<div class='product-grid'>";

            $sql = "SELECT * FROM products WHERE category = '$category' LIMIT 4";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='product-card'>";
                    echo "<img src='{$row['image']}' alt='{$row['name']}'>";
                    echo "<h3>{$row['name']}</h3>";
                    echo "<p>\${$row['price']}</p>";
                     echo "<form action='buy.php' method='POST'>";
        echo "<input type='hidden' name='product_id' value='" . $row['id'] . "'>";
        echo "<button type='submit'>Buy Now</button>";
        echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "<p>No products available.</p>";
            }

            echo "</div>";
            echo "<a class='view-more' href='" . strtolower($category) . ".php'>View More</a>";
            echo "</section><hr>";
        }

        $conn->close();
        ?>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>
