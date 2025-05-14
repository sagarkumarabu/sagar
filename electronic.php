<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronics - Product Store</title>
    <link rel="stylesheet" href="style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
 rel="stylesheet">
</head>
<body>
        <header>
        <div class="logo">
            <img src="logo.png" alt="Website Logo">
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
        <button id="darkModeToggle">Toggle Dark Mode</button>
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
            <h1>Electronics</h1>
            <p>Explore our wide range of electronics including phones, laptops, TVs, and more.</p>

            <div class="product-grid">
                <?php include 'felectronic.php'; ?>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
