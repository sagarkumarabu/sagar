<?php
session_start();
include 'config.php'; 
// $_SESSION['username'] = $username;  // Ensure username is stored
// // header("Location: dashboard.php");
// exit;// Database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            header("Location: dashboard.php"); // Redirect after login
            exit;
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
            <li><a href="electronic.html">Electronics</a></li>
            <li><a href="clothing.html">Clothing</a></li>
            <li><a href="kitchen.html">Home & Kitchen</a></li>
            <li><a href="beauty.html">Beauty</a></li>
            <li><a href="sport.html">Sports</a></li>
        </ul>
    </div>
  <div class="main-content">
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Login</button>
        <a href="admin.php">admin</a>

    </form></div>
</body>
</html>