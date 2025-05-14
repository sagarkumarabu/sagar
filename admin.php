<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<header>
        <div class="logo">
            <img src="logo.png" alt="Website Logo">
        </div>
        <nav>
            <div class="nav-controls">
                <div class="home"><a href="index.php">Home</a></div>
               
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
<h2>Add New Product</h2>
<form action="insert.php" method="POST" enctype="multipart/form-data">
    <label for="name">Product Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="price">Price:</label>
    <input type="number" id="price" name="price" step="0.01" required><br><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea><br><br>

    <label for="category">Category:</label>
    <select id="category" name="category" required>
        <option value="Beauty">Beauty</option>
        <option value="Electronics">Electronics</option>
        <option value="Clothing">Clothing</option>
        <option value="Kitchen">Home & Kitchen</option>
        <option value="Sports">Sports</option>
    </select><br><br>

    <label for="image">Product Image:</label>
    <input type="file" id="image" name="image" accept="image/*" required><br><br>

    <button type="submit">Add Product</button>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
</body>
</html>
<?php
include 'config.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table border='1'>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Description</th> <!-- New column for Description -->
            <th>Actions</th>
        </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr id='product_" . $row['id'] . "'>
            <td contenteditable='true' class='editable' data-column='name'>" . htmlspecialchars($row['name']) . "</td>
            <td contenteditable='true' class='editable' data-column='price'>" . htmlspecialchars($row['price']) . "</td>
            <td contenteditable='true' class='editable' data-column='category'>" . htmlspecialchars($row['category']) . "</td>
 <td contenteditable='true' class='editable' data-column='description'>"
  . htmlspecialchars($row['description']) . "</td> <!-- Display Description -->
            <td>
                <button class='editBtn' data-id='" . $row['id'] . "'>Save</button>
                <a href='delete.php?id=" . $row['id'] . "'>Delete</a>


            </td>
        </tr>";
}

echo "</table>";

} else {
    echo "No products found.";
}

$conn->close();
?>

