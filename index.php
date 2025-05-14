<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product sell</title>
    <link rel="stylesheet" href="style2.css">
    <!-- Ensure you're loading the complete Font Awesome kit -->
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
    </div>
</div>
<script src="script.js"></script>
</body>
</html>